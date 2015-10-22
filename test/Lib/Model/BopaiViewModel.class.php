<?php
class	BopaiViewModel extends ViewModel{
				public $viewFields = array(
					'botalent' => array('id','gongsiname','jobaddress','name','job','chusheng','sex','iphone','nowstatus','goutong','chengjieren','quedingchengjie','chengjieriqi','moeny','xueli','date','yanzheng','eid','uid'),
					'user' => array('yourname','username','status','_on'=>'user.id=botalent.uid'),
					'testuser' => array('mail','_on'=>'testuser.pid=user.id'),
					'boenter' => array('project','address','opendate','voluam','zujin','liuliang','beizhu','pid','_on'=>'boenter.id=botalent.eid'),
					//'user' => array('yourname','listpdf','_type'=>'right'),
					//'list' => array('id','title','hangye','address','content','num','status','date','_on'=>'user.id=list.pid'),
					//'mopai' => array('id','name','job','gongsi','address','ihone','mail','guwen','guwendate','genzong','goutong','xitongid','remark','status','listid','date','_on'=>'mopai.uid=user.id'),
					//'remark' => array('conter','username','date'=>'redate','_on'=>'remark.mid=mopai.id','_type'=>'right'),
				);
}
?>