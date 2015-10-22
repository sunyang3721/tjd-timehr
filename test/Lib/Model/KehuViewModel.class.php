<?php
class	KehuViewModel extends ViewModel{
				public $viewFields = array(
					'kehu' => array('id','title','date','_type'=>'right'),
					'kejob' => array('id'=>'sid','jobname','jinji','status','newdate','_on'=>'kehu.id=kejob.pid'),
				);
}
?>