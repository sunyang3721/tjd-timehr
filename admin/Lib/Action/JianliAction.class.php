<?php
class JianliAction extends CommonAction {
   public function index(){
		$title = trim($this->_post('text'));
		$tousu = M('upload');
		import('ORG.Util.Page');
		$data['email|time|ip'] = array('like',array("%$title%"));
		$count = $tousu->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $tousu->where($data)->order('time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
		$this->display();
   }
}
