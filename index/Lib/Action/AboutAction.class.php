<?php
class AboutAction extends CommonAction {
    public function index(){
	$web = M('web');
	$list = $web->where('id=22')->find();
	$this->assign('list',$list);
	$this->display();
    }
	public function about_lc(){
	$web = M('web');
	$list = $web->where('id=23')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function about_jg(){
	$web = M('web');
	$list = $web->where('id=24')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function about_qy(){
	$web = M('web');
	$list = $web->where('id=25')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function about_ry(){
	$web = M('web');
	$list = $web->where('id=26')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function about_zz(){
	$web = M('web');
	$list = $web->where('id=27')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function about_gg(){
	$news = M('news');
	import('ORG.Util.Page');
	$data['status'] = 1;
	$data['classif'] = 5;
	$count = $news->where($data)->count();
	$page = new Page($count,18);
	$show = $page->show();
	$list = $news->where($data)->order('last_time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
	$this->assign('page',$show);
	$this->assign('list',$list);
	$this->display();
	}
	public function about_lx(){
	$web = M('web');
	$list = $web->where('id=29')->find();
	$this->assign('list',$list);
	$this->display();
	}
}