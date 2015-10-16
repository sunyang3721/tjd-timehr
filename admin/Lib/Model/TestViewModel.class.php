<?php
class	TestViewModel extends ViewModel{
				public $viewFields = array(
					'user'=> array('id','username','yourname','status','listpdf'),
					'testuser'=> array('id'=>'uid','hangye','mail','other','homeihone','ihone','indate','tuandui','markjob','date','pid','qq','_on'=>'user.id=testuser.pid')
					//'timehr'=> array('zhuangtai'=>'tid','ihone','_on'=>'name.id=timehr.zhuangtai')
					//'shiyong' => array('id'=>'sid','num','home','tsj','xsq','remark','date','pid','del','_on'=>'user.id=shiyong.pid'),
					//'tsj' => array('tsj'=>'tsjs','_on'=>'shiyong.tsj=tsj.id'),
					//'xsq' => array('xsq'=>'xsqs','_on'=>'shiyong.xsq=xsq.id')
				);
}
?>