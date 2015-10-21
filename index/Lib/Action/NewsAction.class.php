<?php
class NewsAction extends CommonAction {
    public function index(){
		$news = M('news');
		import('ORG.Util.Page');
		$data['status'] = 1;
		$data['classif'] = 1;
		$count = $news->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $news->where($data)->order('last_time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
    }
	public function index_show(){
		$id = $this->_param(2);
		$news = M('news');
		$list = $news->find($id);
		$this->assign('list',$list);
		$this->display();
	}
	 public function news_dt(){
		$news = M('news');
		import('ORG.Util.Page');
		$data['status'] = 1;
		$data['classif'] = 2;
		$count = $news->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $news->where($data)->order('last_time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
    }
	public function news_hd(){
		$news = M('news');
		import('ORG.Util.Page');
		$data['status'] = 1;
		$data['classif'] = 3;
		$count = $news->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $news->where($data)->order('last_time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
    }
	public function news_bd(){
		$news = M('news');
		import('ORG.Util.Page');
		$data['status'] = 1;
		$data['classif'] = 4;
		$count = $news->where($data)->count();
		$page = new Page($count,28);
		$show = $page->show();
		$list = $news->where($data)->order('last_time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
    }
}