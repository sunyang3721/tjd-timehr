<?php
class	MopaiModel extends Model{
			protected $_validate = array(
			array('name','require','姓名必须填写！'),
			array('job','require','职务必须填写！'),
			array('gongsi','require','公司必须填写！'),
			array('address','require','地点必须填写！'),
			array('ihone','require','手机号码必须填写,也不能带空格！'),
			array('guwen','require','顾问姓名必须填写！'),
			array('guwendate','require','顾问联系时间必须填写！'),
			array('goutong','require','沟通情况必须填写！'),
			//array('sid','require','找不到指定管理，请联系管理员！'),
			//array('homeihone','number','座机电话必须是数字格式！'),
			array('ihone','number','移动电话必须是数字格式！'),
			//array('qq','number','QQ必须是数字格式！')
			//array('username','','员工编号已经存在！',0,'unique',1),
			//array('yourname','require','员工姓名必须填写！'),
			//array('yourname','','员工姓名有重名！',0,'unique',1),
			//array('password','require','密码不能为空！'),
			//array('password','passwords','密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
			//array('uid',array(1,2,3),'值的范围不正确！',2,'in'),
	);
}
