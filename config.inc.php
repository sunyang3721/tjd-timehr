<?php
return array(
 'DB_TYPE'   => 'mysql', // 数据库类型
 'DB_HOST'   => 'localhost', // 服务器地址
 'DB_NAME'   => 'cntimehr', // 数据库名
 'DB_USER'   => 'root', // 用户名
 'DB_PWD'    => 'xxxxxx', // 密码
 'DB_CHARSET'  =>'utf8',
 'DB_PORT'   => 3306, // 端口
 'DB_PREFIX' => 'tjd_',

	 //默认错误跳转对应的模板文件
	'TMPL_ACTION_ERROR' => 'Public:jump',
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => 'Public:jump',
	//模板替换规则
	'TMPL_PARSE_STRING'  =>array(
     '__UPLOAD__' =>__ROOT__.'/Upload/home', // 增加新的上传路径替换规则
	 '__UPLOADKEHU__'=>__ROOT__.'/Upload/kehu',
	),
	//字段缓存信息
	'DB_FIELDS_CACHE' => true,
	'TMPL_CACHE_ON'    		=> 	true,        // 是否开启模板编译缓存,设为false则每次都会重新编译
    'TMPL_STRIP_SPACE'      => 	true,   // 是否去除模板文件里面的html空格与换行
	//伪静态
	'URL_HTML_SUFFIX'=>'html|shtml|xml',
	//过滤
	'VAR_FILTERS'=>'strip_tags',

	//主页设置
	'Index' => 'http://tjd.timehr.com',
	//赋值News 新闻动态
	'News' => '__APP__/News/index',
	'News_dt' =>'__APP__/News/news_dt',
	'News_hd' =>'__APP__/News/news_hd',
	'News_bd' =>'__APP__/News/news_bd',
	//赋值Enter 企业服务
	'Enter' => array('1'=>'__APP__/Enter/index','2'=>'与众不同的发展之路'),
	'Enter_ys' => array('1'=>'__APP__/Enter/enter_ys','2'=>'四大核心竞争优势'),
	'Enter_kh' => array('1'=>'__APP__/Enter/enter_kh','2'=>'客户为什么选择猎头'),
	'Enter_lt' => array('1'=>'__APP__/Enter/enter_lt','2'=>'品味猎头'),
	'Enter_zw' => array('1'=>'__APP__/Enter/enter_zw','2'=>'擅长职位类别与级别'),
	'Enter_rc' => array('1'=>'__APP__/Enter/enter_rc','2'=>'人才库数据'),
	'Enter_fw' => array('1'=>'__APP__/Enter/enter_fw','2'=>'服务模式'),
	'Enter_ztc' => array('1'=>'__APP__/Enter/enter_ztc','2'=>'直通车'),
	'Enter_ts' => array('1'=>'__APP__/Enter/enter_ts','2'=>'投诉与建议'),
	//赋值Person  人才服务
	'Person' => array('1'=>'__APP__/Person/index','2'=>'热招职位'),
	'Person_lt' => array('1'=>'__APP__/Person/person_lt','2'=>'品味猎头'),
	'Person_rc' => array('1'=>'__APP__/Person/person_rc','2'=>'人才为什么选择猎头'),
	'Person_fw' => array('1'=>'__APP__/Person/person_fw','2'=>'专业服务'),
	'Person_zx' => array('1'=>'__APP__/Person/person_zx','2'=>'服务过职位'),
	'Person_jl' => array('1'=>'__APP__/Person/person_jl','2'=>'快速直投简历'),
	'Person_gh' => array('1'=>'__APP__/Person/person_gh','2'=>'更换猎头顾问服务'),
	'Person_ztc' => array('1'=>'__APP__/Person/person_ztc','2'=>'直通车'),
	//赋值Benefit 公益活动
	'Benefit' => array('1'=>'__APP__/Benefit/index','2'=>'奖学金'),
	'Benefit_zz' => array('1'=>'__APP__/Benefit/benefit_zz','2'=>'赞助校友会'),
	'Benefit_jz' => array('1'=>'__APP__/Benefit/benefit_jz','2'=>'捐助汶川地震'),
	'Benefit_zs' => array('1'=>'__APP__/Benefit/benefit_zs','2'=>'公益植树'),
	'Benefit_yw' => array('1'=>'__APP__/Benefit/benefit_yw','2'=>'义务大学生职业辅导'),
	//赋值Join 加入我们
	'Join' => array('1'=>'__APP__/Join/index','2'=>'猎头顾问招聘'),
	'Join_qt' => array('1'=>'__APP__/Join/join_qt','2'=>'猎头助理招聘'),
	'Join_ztc' => array('1'=>'__APP__/Join/join_ztc','2'=>'直通车'),
	'Join_ts' => array('1'=>'__APP__/Join/join_ts','2'=>'投诉与建议'),
	//赋值About 关于腾驹达
	'About' => array('1'=>'__APP__/About/index','2'=>'公司简介'),
	'About_lc' => array('1'=>'__APP__/About/about_lc','2'=>'公司发展历程'),
	'About_jg' => array('1'=>'__APP__/About/about_jg','2'=>'组织架构'),
	'About_qy' => array('1'=>'__APP__/About/about_qy','2'=>'企业文化'),
	'About_ry' => array('1'=>'__APP__/About/about_ry','2'=>'公司荣誉'),
	'About_zz' => array('1'=>'__APP__/About/about_zz','2'=>'公司资质'),
	'About_gg' => array('1'=>'__APP__/About/about_gg','2'=>'公司公告'),
	'About_lx' => array('1'=>'__APP__/About/about_lx','2'=>'联系我们'),
	'About_co' => array('1'=>'__APP__/About/about_co','2'=>'年会活动'),
	//赋值 Headhun 猎头在线
	'Headhun' => array('1'=>'__APP__/Headhun/index','2'=>'猎头在线'),

);
