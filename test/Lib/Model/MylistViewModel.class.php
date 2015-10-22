<?php
class	MylistViewModel extends ViewModel{
				public $viewFields = array(
					//'user' => array('yourname','listpdf','_type'=>'right'),
					'list' => array('title'),
					'mopai' => array('id','name','job','gongsi','address','ihone','mail','guwen','guwendate','genzong','goutong','xitongid','remark','status','listid','date','_on'=>'mopai.gid=list.id'),
					//'remark' => array('conter','username','date'=>'redate','_on'=>'remark.mid=mopai.id','_type'=>'right'),
				);
}
?>