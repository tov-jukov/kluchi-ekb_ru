<?php
/**
 * Шаблонный тег: подключает JS-файлы. Тег нужно добавить перед `</body>`.
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2017 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
{
	$path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}

echo '
<!--[if lt IE 9]><script src="//yandex.st/jquery/1.10.2/jquery.min.js"></script><![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="//yandex.st/jquery/2.0.3/jquery.min.js" charset="UTF-8"><</script><!--<![endif]-->

<script type="text/javascript" src="//yandex.st/jquery/form/3.14/jquery.form.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="//yandex.st/jquery-ui/1.10.3/jquery-ui.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="'.BASE_PATH.Custom::path('js/timepicker.js').'" charset="UTF-8"></script>';
$lang = '';
foreach($this->diafan->_languages->all AS $l)
{
	if($l["id"] == _LANG)
	{
		$lang = $l["shortname"];
	}
}
echo '<script type="text/javascript">
	jQuery(function(e){
	e.datepicker.setDefaults(e.datepicker.regional["'.$lang.'"]);
	e.timepicker.setDefaults(e.timepicker.regional["'.$lang.'"]);
	});
</script>
<script type="text/javascript" src="'.BASE_PATH.Custom::path('js/jquery.scrollTo.min.js').'" charset="UTF-8"></script>
<script type="text/javascript" src="'.BASE_PATH.Custom::path('js/jquery.maskedinput.js').'" charset="UTF-8"></script>
<script type="text/javascript"  src="'.BASE_PATH.Custom::path('js/jquery.touchSwipe.min.js').'" charset="UTF-8"></script>
<script src="'.BASE_PATH.File::compress('js/extsrc.js', 'js').'"></script>';

echo '<script type="text/javascript" src="'.BASE_PATH.File::compress(Custom::path('js/site.js'), 'js').'" charset="UTF-8"></script>';

if ($this->diafan->_users->useradmin)
{
	echo '<script type="text/javascript" src="//yandex.st/jquery/cookie/1.0/jquery.cookie.min.js" charset="UTF-8"></script>
	<script type="text/javascript">
		var useradmin_path = "'.BASE_PATH.ADMIN_FOLDER.'/";
		var base_path = "'.BASE_PATH.'";
		var useradmin_is_toggle = ';
		if($this->diafan->_users->config)
		{
			$cfg = unserialize($this->diafan->_users->config);
			if(! empty($cfg["useradmin_is_toggle"]))
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
		else
		{
			echo '0';
		}
		echo '
		var useradmin_hash = "'.$this->diafan->_users->get_hash().'";
	</script>
	<script type="text/javascript" asyncsrc="'.BASE_PATH.File::compress(Custom::path('modules/useradmin/js/useradmin.js'), 'js').'" charset="UTF-8"></script>';
}

if (! IS_MOBILE && ($this->diafan->configmodules('use_animation') || $this->diafan->configmodules('use_animation', 'site') || $this->diafan->_users->useradmin == 1))
{
	echo '
	<script asyncsrc="'.BASE_PATH.File::compress(Custom::path('js/jquery.prettyPhoto.js'), 'js').'" type="text/javascript" charset="UTF-8"></script>';
}

echo $this->diafan->_site->js;

$js_view = array();
foreach($this->diafan->_site->js_view as $path)
{
	if(in_array($path, $js_view))
		continue;

	$js_view[] = $path;

	$paths = array();
	if (substr($path, 0, 4) != 'http')
	{
		if(Custom::path($path))
		{
			echo '
		<script type="text/javascript" asyncsrc="'.BASE_PATH.File::compress(Custom::path($path), 'js').'"></script>';
		}
	}
	else
	{
		echo '
		<script type="text/javascript" src="'.$path.'"></script>';
	}
}