<?php
/**
 * Менеджер модулей
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

class Modulemanager_install extends Install {
	/**
	 * @var string название
	 */
	public $title = "Менеджер модулей";

	/**
	 * @var array таблицы в базе данных
	 */
	public $tables = array(
		array(
			"name" => "modulemanager",
			"comment" => "Модули от onmaster.ru",
			"fields" => array(
				array(
					"name" => "id",
					"type" => "SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT",
					"comment" => "идентификатор",
				),
				array(
					"name" => "name",
					"type" => "VARCHAR(100) NOT NULL DEFAULT ''",
					"comment" => "название",
				),
				array(
					"name" => "sha",
					"type" => "VARCHAR(100) NOT NULL DEFAULT ''",
					"comment" => "хэш",
				),
			),
			"keys" => array(
				"PRIMARY KEY (id)",
			),
		),
	);

	/**
	 * @var array записи в таблице {modules}
	 */
	public $modules = array(
		array(
			"name" => "modulemanager",
			"admin" => true,
			"site" => false,
		),
	);

	/**
	 * @var array меню административной части
	 */
	public $admin = array(
		array(
			"name" => "Менеджер модулей",
			"rewrite" => "modulemanager",
			"group_id" => "3",
			"sort" => 0,
			"act" => true,
			"children" => array(
				array(
					"name" => "Настройки",
					"rewrite" => "modulemanager/config",
				),
			),
		),
	);
}