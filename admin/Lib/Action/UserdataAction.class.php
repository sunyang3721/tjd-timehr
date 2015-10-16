<?php
class UserdataAction extends CommonAction {
    public function index(){
		$title = trim($this->_post('text'));
		$classif = $this->_post('classif');
		if($classif == 0){
					$data['cid|ihone|username|email|industry|dojob'] = array('like',array("%$title%"));  
		}else if($classif==1){
			$data['cid'] = array('like',array("%$title%")); //判断下拉列表是否选择
		}else if($classif == 2){
			$data['ihone'] = array('like',array("%$title%"));
		}else if($classif == 3){
			$data['username'] = array('like',array("%$title%"));
		}
		$userdata = M('userdata');
		import('ORG.Util.Page');
		$data['status'] = array('like',array('1','2'));
		$count = $userdata->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $userdata->where($data)->order('time')->limit($page->firstRow.','.$page->listRows)->select();
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
		$data['cid'] = date('Ymdhis');
		$data['username'] = $this->_post('username');
		$data['industry'] = $this->_post('industry');
		$data['dojob'] = $this->_post('dojob');
		$data['ihone'] = $this->_post('ihone');
		$data['email'] = $this->_post('email');
		$data['qqliuyan'] = $this->_post('qqliuyan',stripslashes);
		$data['sinawb'] = $this->_post('sinawb',stripslashes);
		$data['qqwb'] = $this->_post('qqwb',stripslashes);
		$data['status'] = $this->_post('status');
		$data['time'] = $this->_post('time');
		if(empty($data['username']) || empty($data['industry']) || empty($data['dojob']) || empty($data['ihone']) || empty($data['email'])){
			$this->error('姓名，擅长行业，主做职位，电话，邮箱都不能为空！');
		}else{
			$userdata = M('userdata');
			$list = $userdata->data($data)->add();
			if($list){
				$this->success('添加成功！',U('Userdata/index'));
			}else{
				$this->error('添加失败！请联系管理员！');
			}
		}

	}
	public function status(){
		$id = $this->_param('2');
			$job = M('userdata');
			$list = $job->where('id='.$id)->find();
			if($list['status']==2){
				$data['status'] = 1;
				//$data['time'] = time();
				$list = $job->where('id='.$id)->data($data)->save();
				$this->ajaxReturn('<span style="color:#33cc00;">发布中</span>', '发布成功！', 1);
			}else if($list['status']==1){
				$data['status'] = 2;
				$list = $job->where('id='.$id)->data($data)->save();
				$this->ajaxReturn('<span style="color:#808080;">关闭发布</span>','关闭成功',0);
			}
	}
	public function edit(){
			$id = $this->_param('2');
			$job = M('userdata');
			$list = $job->where('id='.$id)->find();
			$this->assign('list',$list);
			$this->display();
		}
	public function save(){
			$data['id'] = $this->_post('id');
			$data['industry'] = $this->_post('industry');
			$data['dojob'] = $this->_post('dojob');
			$data['ihone'] = $this->_post('ihone');
			$data['email'] = $this->_post('email');
			$data['username'] = $this->_post('username');
			$data['sinawb'] = $this->_post('sinawb',stripslashes);
			$data['qqwb'] = $this->_post('qqwb',stripslashes);
			$data['qqliuyan'] = $this->_post('qqliuyan',stripslashes);
			$data['time'] = $this->_post('time');
			$data['status'] = $this->_post('status');
			$job = M('userdata');
			$list = $job->save($data);
			if($list){
				$this->success('修改成功！',U('Userdata/index'));
			}else{
				$this->error('修改失败！');
			}

		}
		public function delhome(){
			$title = trim($this->_post('text'));
			$classif = $this->_post('classif');
			if($classif == 0){
						$data['username|ihone|cid'] = array('like',array("%$title%"));
			}else if($classif==1){
				$data['cid'] = array('like',array("%$title%")); //判断下拉列表是否选择
			}else if($classif == 2){
				$data['ihone'] = array('like',array("%$title%"));
			}else if($classif == 3){
				$data['username'] = array('like',array("%$title%"));
			}
			$job = M('userdata');
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
		public function del(){
			$id = $this->_param('2');
			$job = M('userdata');
			$data['status'] = 0;
			$list = $job->where('id='.$id)->data($data)->save();
			if($list){
			$this->ajaxReturn('del', '删除成功！', 3);
		}else{
			$this->error('删除失败！请联系管理员！');
			}
		}
		public function huanyuan(){
			$id = $this->_param(2);
			$data['status'] = 1;
			$job = M('userdata');
			$list = $job->where('id='.$id)->save($data);
			if($list){
				$this->ajaxReturn('huanyuan', '恢复成功！', 3);
			}else{
				$this->error('恢复失败！');
			}
		}
		public function upload(){
			$id = $this->_param('2');
			$this->assign('list',$id);
			$this->display();
		}
		public function uping(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			//$upload->saveRule = time(); //起名用时间目录
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/images/userdata/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			}
			$img = M('userdata');
			$imgs['imgpath'] = $info['0']['savename'];
			$imgs['id'] = $this->_post('id');
			$list = $img->data($imgs)->save();
			if($list){
				$this->success('上传成功！',U('Userdata/index'));
			}else{
				$this->error('上传失败！');
			}
		}
}