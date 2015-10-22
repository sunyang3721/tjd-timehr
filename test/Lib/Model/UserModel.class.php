<?php
class	UserModel extends Model{
			protected $_validate = array(
			array('num','require','工位必须填写！'),
			array('num','number','必须是数字格式！'),
			//array('username','','员工编号已经存在！',0,'unique',1),
			array('home','require','房间必须填写！'),
			//array('yourname','','员工姓名有重名！',0,'unique',1),
			//array('password','require','密码不能为空！'),
			//array('password','passwords','密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
			//array('uid',array(1,2,3),'值的范围不正确！',2,'in'),
	);
}
