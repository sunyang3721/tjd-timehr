<?php
class	KejobViewModel extends ViewModel{
				public $viewFields = array(
					'kejob' => array('id','jobname','num','jinji','address','newdate','status','_type'=>'left'),
					'user' => array('yourname','_on'=>'kejob.tid=user.id'),
				);
}
?>