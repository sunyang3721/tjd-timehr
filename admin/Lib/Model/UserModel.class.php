<?php
class	UserModel extends RelationModel{
			protected $_validate = array(
			array('username','require','员工编号必须填写！'),
			array('username','number','必须是数字格式！'),
			array('username','','员工编号已经存在！',0,'unique',1),
			array('yourname','require','员工姓名必须填写！'),
			array('yourname','','员工姓名有重名！',0,'unique',1),
			array('password','require','密码不能为空！'),
			array('password','passwords','密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
			//array('uid',array(1,2,3),'值的范围不正确！',2,'in'),
	);
			protected $_link = array(
				'Role'=>array(
					'mapping_type' => MANY_TO_MANY,
					'foreign_key' => 'user_id',
					'relation_key' => 'role_id',
					'relation_table' => 'tjd_role_user',
					'mapping_fields' =>'id,name',
				)

	);
}
