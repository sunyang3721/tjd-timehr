<?php
class	ShebeiViewModel extends ViewModel{
				public $viewFields = array(
					'user'=> array('id','yourname','status','_type'=>'left'),
					//'test'=> array('id'=>'uid','nameid','title','article','_on'=>'name.id=test.nameid'),
					//'timehr'=> array('zhuangtai'=>'tid','ihone','_on'=>'name.id=timehr.zhuangtai')
					'shiyong' => array('id'=>'sid','num','home','tsj','xsq','remark','date','pid','del','_on'=>'user.id=shiyong.pid'),
					'tsj' => array('tsj'=>'tsjs','_on'=>'shiyong.tsj=tsj.id'),
					'xsq' => array('xsq'=>'xsqs','_on'=>'shiyong.xsq=xsq.id')
				);
}
?>