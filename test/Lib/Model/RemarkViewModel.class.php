<?php
class	RemarkViewModel extends ViewModel{
				public $viewFields = array(
					'boremark' => array('uid','tid','remark','date'),
					'user' => array('yourname','_on'=>'user.id=boremark.uid'),
					//'user' => array('yourname','listpdf','_type'=>'right'),
					//'list' => array('id','title','hangye','address','content','num','status','date','_on'=>'user.id=list.pid'),
					//'mopai' => array('id','name','job','gongsi','address','ihone','mail','guwen','guwendate','genzong','goutong','xitongid','remark','status','listid','date','_on'=>'mopai.uid=user.id'),
					//'remark' => array('conter','username','date'=>'redate','_on'=>'remark.mid=mopai.id','_type'=>'right'),
				);
}
?>