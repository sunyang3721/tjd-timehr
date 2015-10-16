<?php
class ZiliaoAction extends CommonAction {
		public function index(){
			$test = new TestViewModel();
			$classif = $this->_post('classif');
			$text = trim($this->_post('text'));
			import('ORG.Util.Page');
			$data['status'] = array('in',array('1','2'));
			if($classif == 0){
				$data['username'] = array('like',array("%$text%"));
			}else if($classif == 1){
				$data['yourname'] = array('like',array("%$text%"));
			}else if($classif == 2){
				$data['tuandui'] = array('like',array("%$text%"));
			}else if($classif == 3){
				$data['homeihone|ihone'] = array('like',array("%$text%"));
			}
			$count = $test->where($data)->count();
			$page = new Page($count,30);
			$show = $page->show();
			$list = $test->where($data)->order('username desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','没有可查询的数据');
			}
			$this->assign('page',$show);
			$this->assign('classif',$classif);
			$this->assign('text',$text);
			$this->assign('list',$list);
			$this->assign('index','index');
			$this->display();
			}
		public function zaizhi(){
			$test = new TestViewModel();
			$classif = $this->_post('classif');
			$text = trim($this->_post('text'));
			import('ORG.Util.Page');
			$data['status'] = 1;
			if($classif == 0){
				$data['username'] = array('like',array("%$text%"));
			}else if($classif == 1){
				$data['yourname'] = array('like',array("%$text%"));
			}else if($classif == 2){
				$data['tuandui'] = array('like',array("%$text%"));
			}else if($classif == 3){
				$data['homeihone|ihone'] = array('like',array("%$text%"));
			}
			$count = $test->where($data)->count();
			$page = new Page($count,30);
			$show = $page->show();
			$list = $test->where($data)->order('username desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','没有可查询的数据');
			}
			$this->assign('page',$show);
			$this->assign('classif',$classif);
			$this->assign('text',$text);
			$this->assign('list',$list);
			$this->assign('index','zaizhi');
			$this->display('index');
		}
		public function lizhi(){
			$test = new TestViewModel();
			$classif = $this->_post('classif');
			$text = trim($this->_post('text'));
			import('ORG.Util.Page');
			$data['status'] = 2;
			if($classif == 0){
				$data['username'] = array('like',array("%$text%"));
			}else if($classif == 1){
				$data['yourname'] = array('like',array("%$text%"));
			}else if($classif == 2){
				$data['tuandui'] = array('like',array("%$text%"));
			}else if($classif == 3){
				$data['homeihone|ihone'] = array('like',array("%$text%"));
			}
			$count = $test->where($data)->count();
			$page = new Page($count,30);
			$show = $page->show();
			$list = $test->where($data)->order('username desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','没有可查询的数据');
			}
			$this->assign('page',$show);
			$this->assign('classif',$classif);
			$this->assign('text',$text);
			$this->assign('list',$list);
			$this->assign('index','lizhi');
			$this->display('index');
		}
		public function edit(){
			$id = $this->_param('2');
			$testuser = new TestViewModel();
			$list = $testuser->find($id);
			$this->assign('list',$list);
			$this->display();
		}
		public function save(){
			$data['id'] = $this->_post('id');
			$data['tuandui'] = $this->_post('tuandui');
			$data['hangye'] = $this->_post('hangye');
			$data['markjob'] = $this->_post('markjob');
			$data['homeihone'] = $this->_post('homeihone');
			$data['ihone'] = $this->_post('ihone');
			$data['qq'] = $this->_post('qq');
			$data['indate'] = $this->_post('indate');
			$data['date'] = time();
			$data['mail'] = $this->_post('mail');
			$data['other'] = $this->_post('other');
			$testuser = new TestuserModel('testuser');
			if(!$testuser->create()){
				$this->error($testuser->getError());
			}else{
				$list = $testuser->save($data);
				if($list){
					$this->success('修改成功！',U('Ziliao/index'));
				}else{
					$this->error('修改失败！');
				}
			}
		}
		public function UserImg(){
			$text = trim($this->_post('text'));
			import('ORG.Util.Page');
			$data['yourname'] = array('like',array("%$text%"));
			$test = new TestViewModel();
			$count = $test->where($data)->count();
			$page = new Page($count,30);
			$show = $page->show();
			$list = $test->where($data)->order('username desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','没有可查询的数据');
			}
			$this->assign('page',$show);
			$this->assign('text',$text);
			$this->assign('list',$list);
			$this->display();
		}
}