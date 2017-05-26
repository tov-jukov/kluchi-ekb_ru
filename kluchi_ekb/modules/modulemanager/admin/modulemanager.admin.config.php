<?php
/**
 * Менеджер модулей - Настройки
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

class Modulemanager_admin_config extends Frame_admin {
	/**
	 * @var array поля в базе данных для редактирования
	 */
	public $variables = array(
		'config' => array(
			'shell' => array(
				'type' => 'text',
				'name' => 'Путь к shell-скрипту (необязательно)',
				'help' => 'Shell-скрипт, который можно будет запускать по кнопке из менеджера модулей',
			),
			'autorun' => array(
				'type' => 'checkbox',
				'name' => 'Запускать автоматически',
				'help' => 'Запускать автоматически после любых изменений, сделанных менеджером модулей',
				'default' => true,
			),
		),
	);

	/**
	 * @var array настройки модуля
	 */
	public $config = array(
		'config', // файл настроек модуля
	);
}