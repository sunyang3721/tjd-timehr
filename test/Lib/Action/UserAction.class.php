<?php
class UserAction extends CommonAction {
    public function index(){
		$id = $this->_session('id');
		$user = M('user');
		$ulist = $user->find($id);
		$this->assign('ulist',$ulist);
		$testuser = M('testuser');
		$tlist = $testuser->where('pid='.$id)->find();
		$this->assign('tlist',$tlist);
		$shiyong = M('shiyong');
		$slist = $shiyong->where('pid='.$id)->find();
		$this->assign('slist',$slist);
		$bianhao = new UserViewModel();
		$blist = $bianhao->where('pid='.$id)->find();
		$this->assign('blist',$blist);
		if($slist['num']==''or $slist['home']==''or $slist['tsj']==''or $slist['xsq']==''){
			$a = '<b>修改设备编号</b>';
			$this->assign('a',$a);
		}
    	$this->display();
    }
    public function img_add(){
			$this->display();
	}
	/*
	//上传头像
	public function uploadImg(){
		import('ORG.UploadFile');
		$upload = new UploadFile();						// 实例化上传类
		$upload->maxSize = 1*1024*1024;					//设置上传图片的大小
		$upload->allowExts = array('jpg','png','gif');	//设置上传图片的后缀
		$upload->uploadReplace = true;					//同名则替换
		$id = $this->_session('id');
		$upload->saveRule = $id;					//设置上传头像命名规则avatar(临时图片),修改了UploadFile上传类
		//完整的头像路径
		$path = './avatar/';
		$upload->savePath = $path;
		if(!$upload->upload()) {						// 上传错误提示错误信息
			$this->ajaxReturn('',$upload->getErrorMsg(),0,'json');
		}else{											// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$temp_size = getimagesize($path.$id.'.jpg');
			if($temp_size[0] < 100 || $temp_size[1] < 100){//判断宽和高是否符合头像要求
				$this->ajaxReturn(0,'图片宽或高不得小于100px！',0,'json');
			}
			$this->ajaxReturn('../../avatar/'.$user_path.$id.'.jpg',$info,1,'json');
		}
	}
	//裁剪并保存用户头像
	public function cropImg(){
		//图片裁剪数据
		$params = $this->_post();						//裁剪参数
		if(!isset($params) && empty($params)){
			return;
		}
		//读取编号
		$id = $this->_session('id');
		//头像目录地址
		$path = './avatar/user/';
		//要保存的图片
		$real_path = './avatar/'.$id.'_thumb.jpg';
		//临时图片地址
		$pic_path = './avatar/'.$id.'.jpg';
		import('ORG.ThinkImage.ThinkImage');
		$Think_img = new ThinkImage(THINKIMAGE_GD);
		//裁剪原图
		$Think_img->open($pic_path)->crop($params['w'],$params['h'],$params['x'],$params['y'])->save($real_path);
		//生成缩略图
		$Think_img->open($real_path)->thumb(150,150, 1)->save($path.$id.'_150.jpg');
		$Think_img->open($real_path)->thumb(60,60, 1)->save($path.$id.'_60.jpg');
		//$Think_img->open($real_path)->thumb(30,30, 1)->save($path.'avatar_30.jpg');
		$this->success('上传头像成功');
	}
	*/
	public function userdata_edit(){
		$id = $this->_session('id');
		$user = M('user');
		$ulist = $user->find($id);
		$this->assign('ulist',$ulist);
		$testuser = M('testuser');
		$list = $testuser->where('pid='.$id)->find();
		$this->assign('list',$list);
		$this->display();
	}
	public function userdata_save(){
		$data['id'] = $this->_post('id');
		$data['homeihone'] = $this->_post('homeihone');
		$data['tuandui'] = $this->_post('tuandui');
		$data['ihone'] = $this->_post('ihone');
		$data['qq'] = $this->_post('qq');
		$data['mail'] = $this->_post('mail');
		$data['other'] = $this->_post('other');
		$data['hangye'] = $this->_post('hangye');
		$data['indate'] = $this->_post('indate');
		$data['markjob'] = $this->_post('markjob');
		$data['date'] = time();
		$testuser = new TestuserModel();
		if (!$testuser->create()){
			$this->error($testuser->getError());
		}else{
			$list = $testuser->data($data)->save();
			if($list){
				$this->success('修改成功！',U('User/index'));
			}else{
				$this->redirect('User/index');
			}
		}
	}
	public function shebei_edit(){
		$id = $this->_param('2');
		$shiyong = M('shiyong');
		$list = $shiyong->find($id);
		$data['status'] = 0;
		$tsj_id = $list['tsj'];
		$tsj = M('tsj');
		$li = $tsj->where('id='.$tsj_id)->save($data);
		$xsq_id = $list['xsq'];
		$xsq = M('xsq');
		$xsq->where('id='.$xsq_id)->save($data);
		$tlist = $tsj->where('status=0')->select();
		$xlist = $xsq->where('status=0')->select();
		if($tlist==''){
		$this->assign('none','没有可用的设备');
		}
		if($xlist==''){
		$this->assign('none','没有可用的设备');
		}
		$this->assign('tlist',$tlist);
		$this->assign('xlist',$xlist);
		$this->assign('list',$list);
		$this->display();
	}
	public function shebei_save(){
		$data['id'] = $this->_post('id');
		$data['num'] = $this->_post('num');
		$data['home'] = $this->_post('home');
		$data['tsj'] = $this->_post('tsj');
		$data['xsq'] = $this->_post('xsq');
		$shiyong = new UserModel('shiyong');
		if (!$shiyong->create()){
				$this->error($shiyong->getError());
			}else{
				$list = $shiyong->save($data);
				if($list){
					$this->success('修改成功！',U('User/index'));
				}else{
					$this->error('修改失败！');
				}
			}

	}
}