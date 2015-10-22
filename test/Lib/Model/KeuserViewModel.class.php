<?php
class	KeuserViewModel extends ViewModel{
				public $viewFields = array(
					'kehu'=> array('id','title','_type'=>'right'),
					//'test'=> array('id'=>'uid','nameid','title','article','_on'=>'name.id=test.nameid'),
					//'timehr'=> array('zhuangtai'=>'tid','ihone','_on'=>'name.id=timehr.zhuangtai')
					'kejob' => array('id'=>'sid','pid','jobname','num','jinji','address','newdate','status','tid','_on'=>'kehu.id=kejob.pid'),
					'user'=> array('yourname','_on'=>'kejob.tid=user.id','_type'=>'left'),
				);
}
?>