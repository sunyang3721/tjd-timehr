<?php
class	TsjViewModel extends ViewModel{
				public $viewFields = array(
					'user'=> array('id','yourname','status','_type'=>'right'),
					//'test'=> array('id'=>'uid','nameid','title','article','_on'=>'name.id=test.nameid'),
					//'timehr'=> array('zhuangtai'=>'tid','ihone','_on'=>'name.id=timehr.zhuangtai')
					'shiyong' => array('tsj'=>'tsjs','pid','_on'=>'user.id=shiyong.pid','_type'=>'right'),
					'tsj' => array('id'=>'uid','tsj','xinghao','peizhi','sn','ihone','maidate','madedate','moeny','remark','_on'=>'shiyong.tsj=tsj.id')
						);
}
?>