<?php
class KehuAction extends CommonAction {
	public function index(){
		import('ORG.Util.Page');
		$kehu = M('kehu');
		$title= $this->_post('text');
		$data['title'] = array('like',array("%$title%"));
		$count = $kehu->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$this->list = $kehu->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('text',$title);
		$this->display();
	}
	public function show(){
		$id = $this->_get('id');
		$kehu = M('kehu');
		$this->list = $kehu->find($id);
		$this->display();
	}
	public function adding(){
			$data['title'] = $this->_post('title');
			$data['introduce'] = $this->_post('introduce');
			$data['date'] = time();
			$data['status'] = $this->_post('status');
			//$data['jobnum'] = $this->_post('jobnum');
			/*
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = -1 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Upload/kehu/';// 设置附件上传目录
			$upload->saveRule = time(); //起名用时间目录
			$upload->thumb = true;
			$upload->thumbMaxWidth = '550';
			$upload->thumbMaxHeight = '1200';
			$upload->thumbPrefix = 'm_';
			$upload->thumbRemoveOrigin = true;
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			}
			$data['imgpath'] = $info['0']['savename'];
			*/

			$kehu = M('kehu');
			$list = $kehu->add($data);
			if($list){
				$this->success('添加成功！',U('Kehu/index'));
			}else{
				dump($data);
				$this->error('添加失败！');
			}
	}
	public function modify(){
		$id = $this->_get('id');
		$kehu = M('kehu');
		$this->list = $kehu->find($id);
		$this->display();
	}
	public function img(){
		$id = $this->_get('id');
		$kehu = M('kehu');
		$this->list = $kehu->find($id);
		$this->display();
	}
	public function save(){
		$data['id'] = $this->_post('id');
		$data['title'] = $this->_post('title');
		$data['introduce'] = $this->_post('introduce');
		$data['date'] = time();
		$data['status'] = $this->_post('status');
		$data['jobnum'] = $this->_post('jobnum');
		$kehu = M('kehu');
		$list = $kehu->save($data);
		if($list){
			$this->success('修改成功！',U('Kehu/index'));
		}else{
			$this->error('修改失败！');
		}
	}
	/*
	public function imgUpload(){
		import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = -1 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Upload/kehu/';// 设置附件上传目录
			$upload->saveRule = time(); //起名用时间目录
			$upload->thumb = true;
			$upload->thumbMaxWidth = '550';
			$upload->thumbMaxHeight = '1200';
			$upload->thumbPrefix = 'm_';
			$upload->thumbRemoveOrigin = true;
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			}
			$data['imgpath'] = $info['0']['savename'];
		$data['id'] = $this->_post('id');
		$kehu = M('kehu');
		$list = $kehu->save($data);
		if($list){
			$this->success('上传成功！',U('Kehu/index'));
		}else{
			$this->error('修改失败！');
		}
	}
	*/
	public function del(){
		$id = $this->_get('id');
		$kehu = M('kehu');
		$list = $kehu->delete($id);
		if($list){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	public function job(){
		import('ORG.Util.Page');
		$kejob = new KehuViewModel();
		$title= $this->_post('text');
		$data['jobname'] = array('like',array("%$title%"));
		$count = $kejob->where($data)->count();
		$page = new Page($count,45);
		$show = $page->show();
		$this->list = $kejob->where($data)->order('status asc,newdate desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('text',$title);
		$this->display();
	}
	public function showjob(){
		$id = $this->_param('2');
		$kejob = M('kejob');
		$list = $kejob->find($id);
		$kehu = M('kehu');
		$this->kehulist = $kehu->find($list['pad']);
		$user = M('user');
		$this->userlist = $user->find($list['tid']);
		$testuser = M('testuser');
		$this->testuser = $testuser->where('pid='.$list['tid'])->find();
		$this->assign('list',$list);
		$this->display();
	}
	public function updata(){
			$id = $this->_get('id');
			$this->list = M('kejob')->where('id='.$id)->find();
			$this->kehu = M('kehu')->select();
			$this->display();
	}
	public function job_modify(){
		$jobname = $this->_post('jobname');
		$pid = $this->_post('pid');
		$status = $this->_post('status');
		if($jobname==''){
			$this->error('职位名称不能为空！！！');
		}else if($pid=='0'){
			$this->error('请选择客户名称！！！');
		}else  if($status=='0'){
			$this->error('请选择目前状态！！！');
		}else{
			$data = $this->_post();
			$kejob = M('kejob');
			$list = $kejob->save($data);
			if($list){
						if($status==1){
							$kehu['id'] = $pid;
							$kehu['status'] = 1;
							$kehu['date'] = time();
							M('kehu')->save($kehu);
						}
				$this->success('保存成功！',U('Kehu/job'));
			}else{
				$this->error('保存失败！');
			}
		}
	}
	public function dele(){
		$id = $this->_get('id');
		$list = M('kejob')->delete($id);
		if($list){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
}