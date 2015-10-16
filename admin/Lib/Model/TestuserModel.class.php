<?php
class	TestuserModel extends Model{
			protected $_validate = array(
			array('tuandui','require','所属团队必须填写！'), 
			array('markjob','require','主做职位必须填写！'), 
			array('hangye','require','擅长行业必须填写！'),
			array('homeihone','require','座机电话必须填写！'), 
			array('homeihone','number','座机电话必须是数字格式！'),
			array('ihone','number','移动电话必须是数字格式！'),
			array('qq','number','QQ必须是数字格式！')
			//array('username','','员工编号已经存在！',0,'unique',1),
			//array('yourname','require','员工姓名必须填写！'),
			//array('yourname','','员工姓名有重名！',0,'unique',1),
			//array('password','require','密码不能为空！'),
			//array('password','passwords','密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
			//array('uid',array(1,2,3),'值的范围不正确！',2,'in'), 
	);
}
