<?php
class HeadhunAction extends CommonAction {
    public function index(){
		$userdata = M('userdata');
		import('ORG.Util.Page');
		$data['status'] = 1;
		$count = $userdata->where($data)->count();
		$page = new Page($count,10);
		$show = $page->show();
		$list = $userdata->where($data)->order('time')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
		$this->display();
    }
}