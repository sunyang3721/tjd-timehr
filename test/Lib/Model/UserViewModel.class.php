<?php
class	UserViewModel extends ViewModel{
				public $viewFields = array(
					'shiyong' => array('id'=>'sid','num','home','tsj','xsq','pid'),
					'tsj' => array('tsj'=>'tsjs','_on'=>'shiyong.tsj=tsj.id'),
					'xsq' => array('xsq'=>'xsqs','_on'=>'shiyong.xsq=xsq.id')
				);
}
?>