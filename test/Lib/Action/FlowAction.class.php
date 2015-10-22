<?php
class FlowAction extends CommonAction {
   public function index(){
		$flow = M('flow');
		import('ORG.Util.Page');
		$count = $flow->count();
		$page = new Page($count,50);
		$this->list = $flow->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$show = $page->show();
		$this->assign('page',$show);
		$user = M('user');
		$id = $this->_session('id');
		$this->status = $user->where('id='.$id)->find();
		$this->display();
   }
   public function modify(){
		$id = $this->_get('id');
		$flow = M('flow');
		$this->list = $flow->where('id='.$id)->find();
		$this->display();
   }
   public function save(){
		$data = $this->_post();
		$data['godate'] = strtotime($this->_post('godate'));
		$data['enddate'] = strtotime($this->_post('enddate'));
		$data['status'] = strtotime($this->_post('enddate'))+12*3600; //状态加1天结束
		$flow = D("Flow");
		 if (!$flow->create()){
				$this->error($flow->getError());
			 }else{
				$list = $flow->save($data);
				if($list){
					$this->success('保存成功！',U('Flow/index'));
				}else{
					dump($data);
					//$this->error('保存失败！');
				}
			 }

   }
   public function adding(){
		$data = $this->_post();
		$data['godate'] = strtotime($this->_post('godate'));
		$data['enddate'] = strtotime($this->_post('enddate'));
		$data['status'] = strtotime($this->_post('enddate'))+12*3600; //状态加1天结束
		$flow = D("Flow");
			if(!$flow->create()){
				$this->error($flow->getError());
			}else{
				$list = $flow->add($data);
				if($list){
					$this->success('保存成功！',U('Flow/index'));
				}else{
					dump($data);
					//$this->error('保存失败！');
				}
			}
   }
	public function upload(){
		$this->id = $this->_get('id');
		$this->display();
	}
	public function uploading(){
		$id = $this->_post('id');
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Upload/flow/';// 设置附件上传目录
		$upload->saveRule = $id; //起名用时间目录
		$upload->uploadReplace = true; //覆盖同名
		$upload->thumb = true;
		$upload->thumbMaxWidth = '200';
		$upload->thumbMaxHeight = '200';
		$upload->thumbPrefix = 'm_';
		$upload->thumbRemoveOrigin = true;
		if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
		}
		$flow = M('flow');
		$imgs['weixin_path'] = $info['0']['savename'];
		//$imgs['imgtitle'] = $this->_post('imgtitle');
		//$imgs['date'] = time();
		$list = $flow->where('id='.$id)->save($imgs);
		if($list){
			$this->success('上传成功！',U('Flow/index'));
		}else{
			$this->success('上传成功！',U('Flow/index'));
		}
	}
}
