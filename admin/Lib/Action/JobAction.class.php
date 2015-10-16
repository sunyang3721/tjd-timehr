<?php
class JobAction extends CommonAction {
		public function index(){
		$title = trim($this->_post('text'));
		$classif = $this->_post('classif');
		if($classif == 0){
					$data['jobname|yourname|id'] = array('like',array("%$title%"));
		}else if($classif==1){
			$data['id'] = array('like',array("%$title%")); //判断下拉列表是否选择
		}else if($classif == 2){
			$data['jobname'] = array('like',array("%$title%"));
		}else if($classif == 3){
			$data['yourname'] = array('like',array("%$title%"));
		}
		$job = M('job');
		import('ORG.Util.Page');
		$data['status'] = array('like',array('1','2'));
		$count = $job->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		//$list = $job->where($data)->order('rand()')->limit($page->firstRow.','.$page->listRows)->select();
		$list = $job->where($data)->order('time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('classif',$classif);
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
		$this->display();
		}
		public function add(){
			$this->display();
		}
		public function adding(){
			$data['jobname'] = $this->_post('jobname');
			$data['industry'] = $this->_post('industry');
			$data['address'] = $this->_post('address');
			$data['moeny'] = $this->_post('moeny');
			$data['zhize'] = $this->_post('zhize');
			$data['yaoqiu'] = $this->_post('yaoqiu');
			$data['yourname'] = $this->_session('yourname');
			$data['time'] = time();
			$data['status'] = $this->_post('status');
			$job = M('job');
			$list = $job->data($data)->add();
			if($list){
				$this->success('职位添加成功！',U('Job/index'));
			}else{
				$this->error('职位添加失败！');
			}
		}
		public function edit(){
			$id = $this->_param('2');
			$job = M('job');
			$list = $job->where('id='.$id)->find();
			$this->assign('list',$list);
			$this->display();
		}
		public function save(){
			$data['id'] = $this->_post('id');
			$data['jobname'] = $this->_post('jobname');
			$data['industry'] = $this->_post('industry');
			$data['address'] = $this->_post('address');
			$data['moeny'] = $this->_post('moeny');
			$data['zhize'] = $this->_post('zhize');
			$data['yaoqiu'] = $this->_post('yaoqiu');
			$data['yourname'] = $this->_session('yourname');
			$data['time'] = time();
			$data['status'] = $this->_post('status');
			$job = M('job');
			$list = $job->save($data);
			if($list){
				$this->success('职位修改成功！',U('Job/index'));
			}else{
				$this->error('职位修改失败！');
			}

		}
		public function status(){
			$id = $this->_param('2');
			$job = M('job');
			$list = $job->where('id='.$id)->find();
			if($list['status']==2){
				$data['status'] = 1;
				$data['time'] = time();
				$list = $job->where('id='.$id)->data($data)->save();
				$this->ajaxReturn('<span style="color:#33cc00;">发布中</span>', '发布成功！', 1);
			}else if($list['status']==1){
				$data['status'] = 2;
				$list = $job->where('id='.$id)->data($data)->save();
				$this->ajaxReturn('<span style="color:#808080;">关闭发布</span>','关闭成功',0);
			}

		}
		public function del(){
			$id = $this->_param('2');
			$job = M('job');
			$data['status'] = 0;
			$list = $job->where('id='.$id)->data($data)->save();
			if($list){
			$this->ajaxReturn('del', '删除成功！', 3);
		}else{
			$this->error('删除失败！请联系管理员！');
			}
		}
		public function delhome(){
			$title = trim($this->_post('text'));
			$classif = $this->_post('classif');
			if($classif == 0){
						$data['jobname|yourname|id'] = array('like',array("%$title%"));
			}else if($classif==1){
				$data['id'] = array('like',array("%$title%")); //判断下拉列表是否选择
			}else if($classif == 2){
				$data['jobname'] = array('like',array("%$title%"));
			}else if($classif == 3){
				$data['yourname'] = array('like',array("%$title%"));
			}
			$job = M('job');
			import('ORG.Util.Page');
			$data['status'] = 0;
			$count = $job->where($data)->count();
			$page = new Page($count,18);
			$show = $page->show();
			$list = $job->where($data)->order('time desc, id desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('classif',$classif);
			$this->assign('soso',$title);
			$this->assign('page',$show);
			if($list==''){
			$this->assign('empty','抱歉！没有数据可查询~');
			}
			$this->assign('list',$list);
			$this->display();
		}
		public function huanyuan(){
			$id = $this->_param(2);
			$data['status'] = 1;
			$job = M('job');
			$list = $job->where('id='.$id)->save($data);
			if($list){
				$this->ajaxReturn('huanyuan', '恢复成功！', 3);
			}else{
				$this->error('恢复失败！');
			}
		}
		public function huishou(){
			$id = $this->_param(2);
			$job = M('job');
			$list = $job->find($id);
			$this->assign('list',$list);
			$this->display();
		}
}