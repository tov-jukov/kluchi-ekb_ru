<?php
/**
 * Менеджер модулей - Страница в админке
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
 * Modulemanager_admin
 */
class Modulemanager_admin extends Frame_admin {

	/**
	 * @var array настройки модуля
	 */
	public $config = array();

	/**
	 * Выводит контент модуля
	 *
	 * @return void
	 */
	public function show() {
		if (!empty($_GET["action"])) {
			switch ($_GET["action"]) {
			case "install":
				$this->installModule($_GET["name"], $_GET["sha"]);
				break;
			case "upgrade":
				$this->upgradeModule($_GET["name"], $_GET["sha"]);
				break;
			case "remove":
				$this->removeModule($_GET["name"], $_GET["sha"]);
				break;
			case "execshell":
				$this->execShell();
				break;
			}
		}
		$modules = $this->diafan->_modulemanager->getModuleList();
		$moduleManagerData = $this->diafan->_modulemanager->getModuleManagerData();
		$installedModules = DB::query_fetch_key_value("SELECT name, sha FROM {modulemanager}", "name", "sha");
		$pathToShell = $this->diafan->configmodules('shell', 'modulemanager');
		echo '<script asyncsrc="' . BASE_PATH . 'js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>';
		echo '<script>window.MODULEMANAGER = {';
		foreach ($installedModules as $name => $sha) {
			echo "'" . $name . "':'" . $sha . "',";
		}
		echo '};
    window.MODULEMANAGERDATA = ' . $moduleManagerData . ';
    </script>';
		echo '<link rel="stylesheet" href="' . BASE_PATH . File::compress(Custom::path('css/prettyPhoto.css'), 'css')
			. '" type="text/css" media="screen"' . ' title="prettyPhoto main stylesheet" charset="utf-8" />';
		echo '<style>
      .list_modulemanager a.btn {
        color: #ffffff;
      }
      .list_modulemanager .item__unit {
        visibility: visible;
      }
      .list_modulemanager .btn-remove {
        background-color: #ff4a0b;
      }
      .list_modulemanager .btn-remove:hover {
        background-color: #ff551a;
      }
      .list_modulemanager .btn-update {
        background-color: #527E12;
      }
      .list_modulemanager .btn-update:hover {
        background-color: #76b21a;
      }
      .list_modulemanager .btn-unavailable {
        background-color: #696969;
      }
      .list_modulemanager .btn-unavailable:hover {
        background-color: #808080;
      }
      .list_modulemanager .item__folder {
        width: 120px;
        text-align: left;
      }
      .list_modulemanager .item__folder a {
        margin: 0 10px;
        font-size: 20px;
      }
      .icon-changelog i {
        color: #6EB606;
      }
      .icon-installGuide i {
        color: #1B9ADA;
      }
      .icon-youtube i {
        color: #AE0A0A;
      }
      .btn-execshell {
        margin-bottom: 30px;
      }
    </style>
    <ul class="list list_modulemanager list_catalog do_auto_width">
    </ul>';
		echo '<div class="head-box modulemanager-loading"><span class="head-box__unit">Загрузка списка модулей <img src="' . BASE_PATH . 'adm/img/loading.gif"></span></div>';
		if (!empty($pathToShell) && file_exists($pathToShell)) {
			echo '<a href="?action=execshell" class="btn btn-execshell">Выполнить shell-скрипт</a>';
		}
		echo '<div>Хостинг, модули и многое другое для эффективных сайтов на Diafan.CMS:<br><a href="https://hd.onsoft24.ru/?utm_source=diafan&utm_medium=link&utm_term=modulemanager&utm_content=customer-site&utm_campaign=module">Комплексное решение для сайтов на Diafan.CMS. Лицензия в подарок!</a></div>';
		echo '</p>';
	}

	/**
	 * Установка модуля
	 *
	 * @return void
	 */
	public function installModule($name, $sha) {
		if (IS_DEMO) {
			throw new Exception('В демонстрационном режиме эта функция не доступна.');
		}
		$result = $this->diafan->_modulemanager->installModule($name, $sha, false);
		if ($result['error'] === true) {
			echo '<div class="error">';
		} else {
			echo '<div class="ok">';
		}
		echo $result["status"];
		echo '</div>';
	}

	/**
	 * Обновление модуля
	 *
	 * @return void
	 */
	public function upgradeModule($name, $sha) {
		if (IS_DEMO) {
			throw new Exception('В демонстрационном режиме эта функция не доступна.');
		}
		$result = $this->diafan->_modulemanager->installModule($name, $sha, true);
		if ($result['error'] === true) {
			echo '<div class="error">';
		} else {
			echo '<div class="ok">';
		}
		echo $result["status"];
		echo '</div>';
		if ($name == 'modulemanager') {
			$this->diafan->redirect(URL);
		}
	}

	/**
	 * Удаление модуля
	 *
	 * @return void
	 */
	public function removeModule($name, $sha) {
		if (IS_DEMO) {
			throw new Exception('В демонстрационном режиме эта функция не доступна.');
		}
		$result = $this->diafan->_modulemanager->removeModule($name, $sha, true);
		if ($result['error'] === true) {
			echo '<div class="error">';
		} else {
			echo '<div class="ok">';
		}
		echo $result["status"];
		echo '</div>';
	}

	/**
	 * Выполнение shell-скрипта
	 *
	 * @return void
	 */
	public function execShell() {
		if (IS_DEMO) {
			throw new Exception('В демонстрационном режиме эта функция не доступна.');
		}
		$this->diafan->_modulemanager->execShell();
		echo '<div class="ok">';
		echo 'Shell-скрипт выполнен';
		echo '</div>';
	}
}