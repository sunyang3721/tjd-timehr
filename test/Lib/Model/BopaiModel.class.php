<?php
class	BopaiModel extends Model{
			protected $_validate = array(
			array('eid','require','职位名称不能为空!!!'),
			//array('iphone','require','手机号码不能为空!!!'),
			array('name','require','姓名必须填写！'),
			//array('chusheng','require','出生日期必须填写！'),
			//array('chusheng_nian',array(0),'请正确填写出生年份',2,'notin'),
			//array('chusheng_yue',array(0),'请正确填写出生月份',2,'notin'),
			array('opendate_nian',array(0),'请正确填写开业年份',2,'notin'),
			array('opendate_yue',array(0),'请正确填写开业月份',2,'notin'),
			array('job','require','职位必须填写！'),
			array('name','2,4','人才姓名要求2到4个字!',3,'length'),
			//array('moeny','require','年薪必须填写！'),
			array('goutong','require','沟通内容必须填写！'),
			//array('moeny','number','年薪必须是数字或小数点格式！'),
				//企业项目判断验证
			array('project','require','企业项目不能为空!'),
			array('address','require','地区不能为空!'),
			array('opendate','require','开业日期不能为空!'),
			array('voluam','require','商业面积不能为空!'),
			//array('voluam','number','商业面积必须纯数字格式!'),
			//array('qq','number','QQ必须是数字格式！')
			array('project','','企业项目名称有重复!',0,'unique',1),
			array('iphone','number','手机号码必须是数字格式'),
			array('iphone','','手机号码有重复!!!',0,'unique',1)
			//array('yourname','require','员工姓名必须填写！'),
			//array('yourname','','员工姓名有重名！',0,'unique',1),
			//array('password','require','密码不能为空！'),
			//array('password','passwords','密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
			//array('uid',array(1,2,3),'值的范围不正确！',2,'in'),
	);
}
