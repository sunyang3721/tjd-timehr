<?php
class	XunfangViewModel extends ViewModel{
				public $viewFields = array(
					'user' => array('yourname'),
					'xunfang' => array('id','gongsiname','gongsihangye','gongsizhineng','gongsijob','date','gongsineed','jobxingzhi','bumen','jobnum','xueli','zhuanye','age_a','age_b','zhengshuneed','jobage','xiangmujingyan','jinengneed','guanji','mubiaogongsi','mubiaojiagou','mubiaobumen','jobfengge','zhicheng','bushurenshu','peihe','opendate','jinji','offdate','liucheng','offer','moeny_a','moeny_b','yeji','maidian','jinsheng','daogang','shenhe','qita','_on'=>'xunfang.user_id=user.id'),
					//'user' => array('yourname','listpdf','_type'=>'right'),
					//'list' => array('id','title','hangye','address','content','num','status','date','_on'=>'user.id=list.pid'),
					//'mopai' => array('id','name','job','gongsi','address','ihone','mail','guwen','guwendate','genzong','goutong','xitongid','remark','status','listid','date','_on'=>'mopai.uid=user.id'),
					//'remark' => array('conter','username','date'=>'redate','_on'=>'remark.mid=mopai.id','_type'=>'right'),
				);
}
?>