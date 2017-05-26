<?php
/**
 * Менеджер модулей - Обновление БД модуля
 *
 * @package    DIAFAN.CMS
 * @author     ООО "Онлайн Софт"
 * @version    6.0
 * @copyright  Copyright (c) 2016 ООО "Онлайн Софт" (http://onmaster.ru)
 */

if (!defined('DIAFAN')) {
	$path = __FILE__;
	$i = 0;
	while (!file_exists($path . '/includes/404.php')) {
		if ($i == 10) {
			exit;
		}

		$i++;
		$path = dirname($path);
	}
	include $path . '/includes/404.php';
}

class ModuleManagerInstallDecorator {

	protected $_instance;

	public function __construct(Install $instance) {
		$this->_instance = $instance;
	}

	public function __call($method, $args) {
		return call_user_func_array(array($this->_instance, $method), $args);
	}

	public function __get($key) {
		return $this->_instance->$key;
	}

	public function __set($key, $val) {
		return $this->_instance->$key = $val;
	}

	/**
	 * Обновляет таблицы
	 *
	 * @param array $array таблицы
	 * @return void
	 */
	public function upgradeTables() {
		$result = '';
		foreach ($this->tables as $row) {
			$tableExist = DB::query_result("SELECT COUNT(*) FROM " . DB_PREFIX . $row["name"]);
			if (!$tableExist) {
				$this->tables(array($row));
			} else {
				if (!empty($row["fields"])) {
					$this->upgradeFields(DB_PREFIX . $row["name"], $row["fields"]);
				}
				if (!empty($row["keys"])) {
					$this->upgradeKeys(DB_PREFIX . $row["name"], $row["keys"]);
				}
			}
		}
		return $result;
	}

	/**
	 * Обновляет столбцы в указанной таблице
	 *
	 * @param string $tableName название таблицы
	 * @param array $fields столбцы
	 * @return void
	 */
	public function upgradeFields($tableName, $fields) {
		$existingFields = DB::query_fetch_all("SELECT * FROM `" . $tableName . "` LIMIT 1");
		foreach ($fields as $field) {
			if (!array_key_exists($field["name"], $existingFields)) {
				$comment = (!empty($field["comment"]) ? " COMMENT '" . str_replace("'", "\\'", $field["comment"]) . "'" : '');
				DB::query("ALTER TABLE `" . $tableName . "` ADD `" . $field["name"] . "` " . $field["type"] . $comment);
			}
		}
	}

	/**
	 * Обновляет индексы в указанной таблице
	 *
	 * @param string $tableName название таблицы
	 * @param array $keys индексы
	 * @return void
	 */
	public function upgradeKeys($tableName, $keys) {
		foreach ($keys as $key) {
			DB::query("ALTER TABLE `" . $tableName . "` ADD " . $key);
		}
	}

	/**
	 * Обновляет записи о модуле в таблице {modules}
	 *
	 * @return void
	 */
	public function upgradeModules() {
		if (!empty($this->_instance->modules)) {
			$module = $this->is_core ? 'core' : $this->module;
			foreach ($this->modules as $row) {
				if (empty($row["title"])) {
					$row["title"] = $this->title;
				}
				DB::query("DELETE FROM {modules} WHERE name = '%h'", $row["name"]);
				DB::query("INSERT INTO {modules} (name, module_name, title, admin, site, site_page) VALUES ('%h', '%h', '%h', '%d', '%d', '%d')",
					$row["name"],
					$module,
					$row["title"],
					(!empty($row["admin"]) ? 1 : 0),
					(!empty($row["site"]) ? 1 : 0),
					(!empty($row["site_page"]) ? 1 : 0)
				);
			}
		}
	}

	/**
	 * Обновляет записи о модуле в таблице {admin}
	 *
	 * @return void
	 */
	public function upgradeAdmin() {
		if (!empty($this->_instance->admin)) {
			foreach ($this->admin as $row) {
				$admin[] = $row["rewrite"];
				if (!empty($row["children"])) {
					foreach ($row["children"] as $r) {
						$admin[] = $r["rewrite"];
					}
				}
			}
			$admin_ids = DB::query_result("SELECT GROUP_CONCAT(id SEPARATOR ',') FROM {admin} WHERE rewrite IN ('" . implode("','", $admin) . "')");
			DB::query("DELETE FROM {admin} WHERE id IN (" . $admin_ids . ")");
			DB::query("DELETE FROM {admin_parents} WHERE element_id IN (" . $admin_ids . ")");
			DB::query("DELETE FROM {users_role_perm} WHERE rewrite IN ('" . implode("','", $admin) . "')");
			$this->admin($this->admin);
		}
	}

}