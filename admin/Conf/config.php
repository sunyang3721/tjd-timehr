<?php
$config	=	require './config.inc.php';
$admin_config = array(
	//路由 空模块

	//RBAC 认证配置信息
	'RBAC_SUPERADMIN' => 'administrator', //超级管理员名称administrator
	'ADMIN_AUTH_KEY' => 'superadmin', //超级管理员识别
	'USER_AUTH_ON'		 =>true, //是否需要验证
	'USER_AUTH_TYPE'	 	=>1, //认证类型 1为登录后才认证 2为实时验证
	'USER_AUTH_KEY'	=>'authId', //认证识别号，此名称可以自己取
	//'REQUIRE_AUTH_MODULE'=>'', //需要认证的模块
	//'REQUIRE_AUTH_ACTION'=>'', //需要认证的操作
	'NOT_AUTH_MODULE' =>'', //无需认证模块
	//'AUTH_PWD_ENCODER' =>'md5',
	//'USER_AUTH_GATEWAY'	=>'/Login/index',
	'RBAC_ROLE_TABLE' =>'tjd_role',
	'RBAC_USER_TABLE' =>'tjd_role_user',
	'RBAC_ACCESS_TABLE' =>'tjd_access',
	'RBAC_NODE_TABLE' =>'tjd_node',

);
return array_merge($config,$admin_config);
?>