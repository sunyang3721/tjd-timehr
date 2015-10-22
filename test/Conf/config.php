<?php
$config	=	require './config.inc.php';
$test_config = array(
 'DB_TYPE'   => 'mysql', // 数据库类型
 'DB_HOST'   => 'localhost', // 服务器地址
 'DB_NAME'   => 'cntimehr', // 数据库名
 'DB_USER'   => 'root', // 用户名
 'DB_PWD'    => 'W.123.com', // 密码
 'DB_CHARSET'  =>'utf8',
 'DB_PORT'   => 3306, // 端口
 'DB_PREFIX' => 'tjd_',
//邮件配置
 'THINK_EMAIL' => array(
    'SMTP_HOST'   => 'smtp.263.net', //SMTP服务器
    'SMTP_PORT'   => '25', //SMTP服务器端口
    'SMTP_USER'   => 'sunyang@timehr.com', //SMTP服务器用户名
    'SMTP_PASS'   => 'admin@5188', //SMTP服务器密码
    'FROM_EMAIL'  => 'admin@timehr.com', //发件人EMAIL
    'FROM_NAME'   => 'tjd.timehr.com官网', //发件人名称
    'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
    'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
 ),
'TMPL_PARSE_STRING'  =>array(
     '__TEMP__' =>__ROOT__.'/test/Tpl' // 增加新的上传路径替换规则
	),
  //默认错误跳转对应的模板文件
 'TMPL_ACTION_ERROR' => 'Public:jump',
 //默认成功跳转对应的模板文件
 'TMPL_ACTION_SUCCESS' => 'Public:jump',
 //伪静态
 'URL_HTML_SUFFIX'=>'html|shtml|xml',
 //过滤
 'VAR_FILTERS'=>'strip_tags|trim',
 //自动进行模糊查询字段
//'DB_LIKE_FIELDS'=>'name|job|project|address|chengjieren|yourname|chusheng|opendate|voluam',

//'BO_ADMIN_USER'=>'0323,0098,0170,0255,0329,0324,0345',
'ADMIN_BOPAI'=>array('0170','0428','0329','0255','0001','0323'), //孙洋\孙承龙\殷凯\王社民\景总\王宏斌等摸排管理员权限在这里加
'GUWEN_BOPAI'=>array('0036','0091','0098','0100','0109','0110','0130','0138','0139','0148',
'0149',
'0156',
'0158',
'0162',
'0163',
'0176',
'0192',
'0209',
'0228',
'0236',
'0255',
'0260',
'0295',
'0304',
'0306',
'0321',
'0329',
'0338',
'0341',
'0343',
'0345',
'0363',
'0378',
'0379',
'0380',
'0381',
'0387',
'0389',
'0393',
'0396',
'0397',
'0409',
'0418',
'0419',
'0420',
'0421',
'0424',
'0432',
'0433',
'0435',
'0436',
'0437',
'0440',
'0441',
'0445',
'0447'
), //摸排顾问权限在这里加  注意 不能与摸排管理员工号重复出现!!!
'XUNFANG_ADMIN'=>array('0001','0323','0170','0255','0329'), //寻访需求调查表管理员权限在这里加
	//'TOKEN_ON'=>true,  // 是否开启令牌验证
	//'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
	//'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
	//'TOKEN_RESET'=>false,  //令牌验证出错后是否重置令牌 默认为true
	'listid' =>array('0'=>'管理员',
								'1'=>'导师第一组',
								'2'=>'导师第二组',
								'3'=>'导师第三组',
								'4'=>'导师第四组',
								'5'=>'导师第五组',
								'6'=>'导师第六组',
								'7'=>'导师第七组',
								'8'=>'导师第八组',
								'9'=>'导师第九组',
								'10'=>'导师第十组',
								'11'=>'导师第十一组',
								'12'=>'导师第十二组',
								'13'=>'导师第十三组',
								'14'=>'导师第十四组',
								'15'=>'导师第十五组',
								'16'=>'导师第十六组',
								'17'=>'上海导师组',
								'18'=>'新业务办公司',
								'19'=>'独立顾问',
								'20'=>'其它',
							),
);
return array_merge($config,$test_config);