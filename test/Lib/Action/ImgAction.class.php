<?php
class ImgAction extends CommonAction {
    public function index(){
			$xiangce = M('xiangce');
			import('ORG.Util.Page');
			$count = $xiangce->count();
			$page = new Page($count,20);
			$show = $page->show();
			$list = $xiangce->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('page',$show);
			$this->assign('list',$list);
			$this->display();
    }
}