<?php
class JiangtangAction extends CommonAction {
   public function index(){
		$pdf = M('pdf');
		import('ORG.Util.Page');
		$text = trim($this->_get('title')); //取值
		$data['title'] = array('like',array("%$text%")); //模糊查询 标题和行业
		$data['pid'] = 5;
		$statuspdf = $this->_session('statuspdf'); //获取用户访问权限
		$data['status']  = array('elt',$statuspdf); //判断人力资源报告 是否 小于等于 用户权限
		$count = $pdf->where($data)->count();
		$page = new Page($count,30);
		$list = $pdf->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可看的文件！');
		}
		$map['pid']= $id;
		$map['title'] = $text;
		foreach($map as $key=>$val){
			$page->parameter .="$key=".urlencode($val)."&";
		}
		$show = $page->show();
		$this->assign('soso_text','猎头讲堂');
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
   }
   public function show(){
		$id = $this->_param('2');
		$pdf = M('pdf');
		$list = $pdf->where('id='.$id)->find();
		$this->assign('list',$list);
		$this->display();
   }

}
