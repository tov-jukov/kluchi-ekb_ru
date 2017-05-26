<?php
/**
 * Менеджер модулей - Счётчик в админке
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
 * Modulemanager_admin_count
 */
class Modulemanager_admin_count extends Diafan {
	/**
	 * Возвращает количество доступных обновлений в менеджере модулей
	 * @return integer
	 */
	public function count() {
		if ($lastTimeCached = $this->diafan->_cache->get("lastTimeCached", "modulemanager")) {
			$now = new DateTime();
			$diffInSeconds = $now->getTimestamp() - $lastTimeCached->getTimestamp();
			if ($diffInSeconds > 3600) {
				//1 час = 3600 сек
				$this->diafan->_cache->delete("", "modulemanager");
			}
		}

		if (!$lastTimeCached = $this->diafan->_cache->get("lastTimeCached", "modulemanager")) {
			$lastTimeCached = new DateTime();
			$this->diafan->_cache->save($lastTimeCached, "lastTimeCached", "modulemanager");
		}

		if (!$counter = $this->diafan->_cache->get("counter", "modulemanager")) {
			$counter = 0;
			$installedModules = DB::query_fetch_key_value("SELECT name, sha FROM {modulemanager}", "name", "sha");
			$moduleManagerData = $this->diafan->_modulemanager->getModuleManagerData();
			foreach (json_decode($moduleManagerData, true) as $module) {
				if (isset($installedModules[$module["name"]]) && $installedModules[$module["name"]] !== $module["sha"]) {
					$counter++;
				}
			}
			$this->diafan->_cache->save($counter, "counter", "modulemanager");
		}

		return $counter;
	}
}