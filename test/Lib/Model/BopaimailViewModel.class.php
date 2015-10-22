<?php
class	BopaimailViewModel extends ViewModel{
				public $viewFields = array(
					//'botalent' => array('name','job','chusheng','sex','nowstatus','goutong','chengjieren','quedingchengjie','chengjieriqi','moeny','xueli','date','yanzheng','eid','uid'),
					'user' => array('id','yourname'),
					'testuser' => array('mail','_on'=>'testuser.pid=user.id'),
					//'boenter' => array('project','address','opendate','voluam','zujin','liuliang','pid','_on'=>'boenter.id=botalent.eid'),
					//'user' => array('yourname','listpdf','_type'=>'right'),
					//'list' => array('id','title','hangye','address','content','num','status','date','_on'=>'user.id=list.pid'),
					//'mopai' => array('id','name','job','gongsi','address','ihone','mail','guwen','guwendate','genzong','goutong','xitongid','remark','status','listid','date','_on'=>'mopai.uid=user.id'),
					//'remark' => array('conter','username','date'=>'redate','_on'=>'remark.mid=mopai.id','_type'=>'right'),
				);
}
?>