<?php
/**
 * Менеджер модулей - Подключение модуля
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

/**
 * Modulemanager_inc
 */
class Modulemanager_inc extends Diafan {
	/**
	 * Возвращает список установленных модулей
	 *
	 * @return array
	 */
	public function getModuleList() {
		return DB::query_fetch_all("SELECT name, sha FROM {modulemanager}");
	}

	/**
	 * Возвращает список доступных модулей на сервере
	 *
	 * @return array
	 */
	public function getModuleManagerData() {
		if ($mmCurl = curl_init()) {
			curl_setopt($mmCurl, CURLOPT_URL, "https://mm.onsoft24.ru/list");
			curl_setopt($mmCurl, CURLOPT_RETURNTRANSFER, 1);
			$moduleManagerData = curl_exec($mmCurl);
			curl_close($mmCurl);
		} else {
			throw new Exception('На сервере не установлен cURL.');
		}
		return $moduleManagerData;
	}

	/**
	 * Устанавливает/обновляет выбранный модуль
	 *
	 * @param string $name название модуля
	 * @param string $sha хэш модуля
	 * @param boolean $isUpgrade true если обновление модуля
	 * @return array
	 */
	public function installModule($name, $sha, $isUpgrade) {
		$name_sha = $name . '_' . $sha;
		$result['error'] = false;

		if (!$this->diafan->_users->roles('edit', 'modulemanager')) {
			$result['error'] = true;
			$result['status'] = 'У вас нет прав на установку и обновление модулей! Обратитесь к администратору за помощью.';
			return $result;
		}

		$moduleId = DB::query_result("SELECT id FROM {custom} WHERE name='%s' LIMIT 1", $name_sha);
		if ($moduleId) {
			$result['error'] = true;
			$result['status'] = 'Модуль ' . $name . ' уже установлен.';
			return $result;
		}

		if (!file_exists(ABSOLUTE_PATH . 'custom/' . $name_sha . '.zip')) {
			File::copy_file('https://mm.onsoft24.ru/dist/' . $name . '/' . $sha . '.zip', 'custom/' . $name_sha . '.zip');
		}

		if (!class_exists('ZipArchive')) {
			throw new Exception('На сервере не установлено расширение для распаковки ZIP-архивов.');
		}

		$zip = new ZipArchive;
		if ($zip->open(ABSOLUTE_PATH . 'custom/' . $name_sha . '.zip') === true) {
			$zip->extractTo(ABSOLUTE_PATH . 'custom/' . $name_sha);
			$zip->close();
			File::delete_file('custom/' . $name_sha . '.zip');

			DB::query("INSERT INTO {custom} (name, created, text) VALUES ('%s', %d, '%s')", $name_sha, time(), 'Модуль ' . $name . ' от onmaster.ru');
			if (defined('CUSTOM')) {
				$activeThemes = explode(',', CUSTOM);
				if (in_array($name_sha, $activeThemes) === false) {
					array_push($activeThemes, $name_sha);
					$this->updateConfig($activeThemes);
				}
			}
		} else {
			throw new Exception('Ошибка при распаковке ZIP-архива модуля.');
		}

		if ($isUpgrade === true) {
			$oldModuleSha = DB::query_result("SELECT sha FROM {modulemanager} WHERE name='%s'", $name);
			if (file_exists($path . 'custom/' . $name_sha . '/modules/' . $name . '/' . $name . '.install.php') && file_exists(__DIR__ . '/modulemanager.upgrade.php')) {
				Custom::inc("includes/install.php");
				require __DIR__ . '/modulemanager.upgrade.php';
				require $path . 'custom/' . $name_sha . '/modules/' . $name . '/' . $name . '.install.php';
				$moduleInstallName = Ucfirst($name) . '_install';
				$this->upgrade = new ModuleManagerInstallDecorator(new $moduleInstallName($this->diafan));
				$this->upgrade->module = $name;
				$this->upgrade->upgradeTables();
				$this->upgrade->upgradeModules();
				$this->upgrade->upgradeAdmin();
			}
			if (!empty($oldModuleSha)) {
				DB::query("UPDATE {modulemanager} SET sha = '%s' WHERE name='%s'", $sha, $name);
				$this->removeModule($name, $oldModuleSha, false);
			} else {
				DB::query("INSERT INTO {modulemanager} (name, sha) VALUES ('%s', '%s')", $name, $sha);
				$this->execShell();
			}
			$result['status'] = 'Модуль ' . $name . ' успешно обновлён.';
		} else {
			DB::query("INSERT INTO {modulemanager} (name, sha) VALUES ('%s', '%s')", $name, $sha);
			if (file_exists($path . 'custom/' . $name_sha . '/modules/' . $name . '/' . $name . '.install.php')) {
				Custom::inc("includes/install.php");
				require $path . 'custom/' . $name_sha . '/modules/' . $name . '/' . $name . '.install.php';
				$moduleInstallName = Ucfirst($name) . '_install';
				foreach ($this->diafan->_languages->all as $l) {
					$langs[] = $l["id"];
				}
				$this->install = new $moduleInstallName($this->diafan);
				$this->install->langs = $langs;
				$this->install->module = $name;
				$this->install->install_modules = array($name);
				$this->install->tables();
				$this->install->start(false);
			}
			DB::free_result($tableExist);
			if ($this->diafan->configmodules('autorun', 'modulemanager') === true) {
				$this->execShell();
			}
			$this->diafan->_cache->delete("", "modulemanager");
			$result['status'] = 'Модуль ' . $name . ' успешно установлен.';
		}

		return $result;
	}

	/**
	 * Удаляет модуль
	 *
	 * @param string $name название модуля
	 * @param string $sha хэш модуля
	 * @param boolean $fullRemove удалять полностью, вместе с деинсталяцией модуля
	 * @return array
	 */
	public function removeModule($name, $sha, $fullRemove) {
		$name_sha = $name . '_' . $sha;
		$result['error'] = false;

		if ($fullRemove === true && !$this->diafan->_users->roles('del', 'modulemanager')) {
			$result['status'] = 'У вас нет прав на удаление модулей! Обратитесь к администратору за помощью.';
			$result['error'] = true;
			return $result;
		}

		if ($fullRemove === true && file_exists($path . 'custom/' . $name_sha . '/modules/' . $name . '/' . $name . '.install.php')) {
			Custom::inc("includes/install.php");
			include $path . 'custom/' . $name_sha . '/modules/' . $name . '/' . $name . '.install.php';
			$moduleInstallName = Ucfirst($name) . '_install';
			foreach ($this->diafan->_languages->all as $l) {
				$langs[] = $l["id"];
			}
			$this->install = new $moduleInstallName($this->diafan);
			$this->install->langs = $langs;
			$this->install->module = $name;
			$this->install->uninstall();
		}

		File::delete_dir('custom/' . $name_sha);
		DB::query("DELETE FROM {custom} WHERE name='%s'", $name_sha);
		DB::query("DELETE FROM {modulemanager} WHERE name='%s' AND sha='%s'", $name, $sha);
		if (defined('CUSTOM')) {
			$activeThemes = explode(',', CUSTOM);
			$this->updateConfig(array_diff($activeThemes, array($name_sha)));
		}
		if ($this->diafan->configmodules('autorun', 'modulemanager') === true) {
			$this->execShell();
		}
		$this->diafan->_cache->delete("", "modulemanager");

		$result['status'] = 'Модуль ' . $name . '  успешно удалён.';
		return $result;
	}

	/**
	 * Обновляет список активных тем в /config.php
	 *
	 * @param array $themes список активных тем
	 * @return void
	 */
	private function updateConfig($themes) {
		$modules = $this->getModuleList();
		$onmasterThemes = array();
		foreach ($modules as $module) {
			array_push($onmasterThemes, $module["name"] . '_' . $module["sha"]);
		}
		$otherThemes = array_diff($themes, $onmasterThemes);
		Custom::inc('includes/config.php');
		$config = new Config();
		$config->save(array('CUSTOM' => join(',', array_merge($otherThemes, $onmasterThemes))), $this->diafan->_languages->all);
	}

	/**
	 * Выполняет sh-файл по указанному в настройках модуля пути
	 *
	 * @return void
	 */
	public function execShell() {
		$pathToShell = $this->diafan->configmodules('shell', 'modulemanager');
		if (!empty($pathToShell) && file_exists($pathToShell)) {
			exec('sh ' . $pathToShell);
		}
	}
}