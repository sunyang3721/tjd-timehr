<?php
class	PwdModel extends Model{
			protected $_validate = array(
			array('password','require','密码不能为空！'),
			array('password','passwords','密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
			//array('uid',array(1,2,3),'值的范围不正确！',2,'in'), 
	);
}
