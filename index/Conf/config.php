<?php
$config	=	require './config.inc.php';
$admin_config = array(
	//重写
	'URL_MODEL'=>2,
);
return array_merge($config,$admin_config);
?>