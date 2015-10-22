<?php
class	FlowModel extends Model{
			protected $_validate = array(
			array('name','require','姓名必须填写！'),
			array('job','require','职务必须填写！'),
			array('weixin','require','微信必须填写！'),
			array('address','require','所在地点必须填写！'),
			array('ihone','require','移动电话必须填写'),
			array('qq','require','QQ必须填写'),
			array('godate','require','开始日期必须填写！'),
			array('enddate','require','结束日期必须填写！'),
			//array('sid','require','找不到指定管理，请联系管理员！'),
			//array('homeihone','number','座机电话必须是数字格式！'),
			array('ihone','number','移动电话必须是数字格式！'),
			array('qq','number','QQ必须是数字格式！')
			//array('username','','员工编号已经存在！',0,'unique',1),
			//array('yourname','require','员工姓名必须填写！'),
			//array('yourname','','员工姓名有重名！',0,'unique',1),
			//array('password','require','密码不能为空！'),
			//array('password','passwords','密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
			//array('uid',array(1,2,3),'值的范围不正确！',2,'in'),
			//array('godate','sotime','时间格式不对',1,'callback'),  protected function sotime(){}
	);
			protected $_auto = array (
				//array('status','5',3,'string'),  // 新增的时候把status字段设置为1
				//array('weixin','md5',1,'function') , // 对password字段在新增和编辑的时候使md5函数处理
				//array('name','getName',3,'callback'), // 对name字段在新增和编辑的时候回调getName方法
				//array('weixin_path','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
			//	array('qq','md5',3,'function')
			);
}
