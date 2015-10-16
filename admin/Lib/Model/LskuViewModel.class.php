<?php
class	LskuViewModel extends ViewModel{
				public $viewFields = array(
					'user' => array('yourname','_type'=>'right'),
					'list' => array('id','title','hangye','address','content','status','date','_on'=>'user.id=list.pid'),
				);
}
?>