<?php
class	XsqViewModel extends ViewModel{
				public $viewFields = array(
					//'name'=> array('id','name','mail'),
					//'test'=> array('id'=>'uid','nameid','title','article','_on'=>'name.id=test.nameid'),
					//'timehr'=> array('zhuangtai'=>'tid','ihone','_on'=>'name.id=timehr.zhuangtai')
					'user'=> array('id','yourname','status','_type'=>'right'),
					'shiyong' => array('xsq'=>'xsqs','pid','_on'=>'user.id=shiyong.pid','_type'=>'right'),
					'xsq' =>array('id'=>'xid','xsq','xxinghao','snid','xmaidate','xmadedate','xmoeny','xremark','_on'=>'shiyong.xsq=xsq.id')
				);
}
?>