<?php
class NewsAction extends CommonAction {
	public function index(){
		$title = trim($this->_post('text'));
		$classif = $this->_post('classif');
		if($classif!=0){
			$data['classif'] = $classif; //判断下拉列表是否选择
		}
		$news = M('news');
		import('ORG.Util.Page');
		$data['title'] = array('like',array("%$title%"));
		$data['status'] = array('like',array('1','2'));
		$count = $news->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $news->where($data)->order('last_time desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('classif',$classif);
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
		$this->display();
	}
	public function delhome(){
		$title = trim($this->_post('text'));
		$classif = $this->_post('classif');
		if($classif!=0){
			$data['classif'] = $classif; //判断下拉列表是否选择
		}
		$news = M('news');
		import('ORG.Util.Page');
		$data['title'] = array('like',array("%$title%"));
		$data['status'] = 0;
		$count = $news->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $news->where($data)->order('last_time desc, id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('classif',$classif);
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
		$this->display();
	}
	public function huishou(){
		$id = $this->_param(2);
		$news = M('news');
		$list = $news->find($id);
		$this->assign('list',$list);
		$this->display();
	}
	public function huanyuan(){
		$id = $this->_param(2);
		$data['status'] = 1;
		$news = M('news');
		$list = $news->where('id='.$id)->save($data);
		if($list){
			$this->ajaxReturn('huanyuan', '恢复成功！', 3);
		}else{
			$this->error('还原失败！');
		}
	}
	public function adding(){
		$data['title'] = $this->_post('title');
		$data['yourname'] = $this->_session('yourname');
		$data['last_time'] = time();
		$data['classif'] = $this->_post('classif');
		$data['content'] = $this->_post('editorValue',stripslashes);
		$data['status'] = $this->_post('status');
		$data['remark'] = $this->_post('remark');

		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			$img = M('news');
			$list = $img->add($data);
			if($list){
				$this->success('提交成功！',U('News/index'));
			}else{
				$this->error('提交失败！');
			}
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		$img = M('news');
		$data['imgpath'] = $info['0']['savename'];
		$list = $img->add($data);
			if($list){
				$this->success('提交成功！',U('News/index'));
			}else{
				$this->error('提交失败！');
			}
		}
	}
	public function edit(){
		$id = $this->_param(2);
		$news = M('news');
		$list = $news->where('id='.$id)->find();
		$this->assign('list',$list);
		$this->display();

	}
	public function updata(){
		$id = $this->_post('id');
		$data['title'] = $this->_post('title');
		$data['yourname'] = $this->_session('yourname');
		$data['last_time'] = time();
		$data['classif'] = $this->_post('classif');
		$data['content'] = $this->_post('editorValue',stripslashes);
		$data['status'] = $this->_post('status');
		$data['remark'] = $this->_post('remark');



		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = time(); //起名用时间目录
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/images/img/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			$news = M('news');
			$list = $news->where('id='.$id)->save($data);
			if($list){
				$this->success('修改成功！',U('News/index'));
			}else{
				$this->error('修改失败！请联系管理员！');
			}
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		$img = M('news');
		$data['imgpath'] = $info['0']['savename'];
		$list = $img->where('id='.$id)->save($data);
			if($list){
				$this->success('修改成功！',U('News/index'));
			}else{
				$this->error('修改失败！请联系管理员！');
			}
		}
	}
	public function del(){
		$so['id'] = $this->_param('2');
		$data['status'] = 0 ;
		$news = M('news');
		$list = $news->where($so)->data($data)->save();
		if($list){
			$this->ajaxReturn('del', '删除成功！', 3);
		}else{
			$this->error('删除失败！请联系管理员！');
			}
	}
	public function status(){
		$id = $this->_param(2);
		$news = M('news');
		$list = $news->where('id='.$id)->find();
		if($list['status']==2){
			$data['status'] = 1;
			$list = $news->where('id='.$id)->data($data)->save();
			$this->ajaxReturn('<span style="color:#33cc00;">发布中</span>', '发布成功！', 1);
		}else if($list['status']==1){
			$data['status'] = 2;
			$list = $news->where('id='.$id)->data($data)->save();
			$this->ajaxReturn('<span style="color:#808080;">关闭发布</span>','关闭成功',0);
		}
	}

}