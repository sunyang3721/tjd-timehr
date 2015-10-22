<?php
class WeixinAction extends CommonAction {
   public function index(){
   		$user_id = $this->_session('id');
   		$user = M('user');
   		$list = $user->find($user_id);
   		$this->assign('list',$list);

   		$userdata = M('testuser');
   		$utest = $userdata->where('pid='.$user_id)->find();
   		$this->assign('ulist',$utest);

   		$weijob = M('weijob');
   		import('ORG.Util.Page');
   		$count = $weijob->where('pid='.$user_id)->count();
   		$page = new Page($count,20);
   		$joblist = $weijob->where('pid='.$user_id)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
   		$show = $page->show();
   		$this->assign('jobcount',$count);
		$this->assign('page',$show);
   		$this->assign('joblist',$joblist);
		$this->display();
   }
   public function rencai(){
         $id = $this->_session('id');
   		$weipost = M('weipost');
   		import('ORG.Util.Page');
   		$count = $weipost->where('pid='.$id)->count();
   		$page = new Page($count,50);
   		$this->list = $weipost->where('pid='.$id)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
   		$show = $page->show();
		$this->assign('page',$show);
		if($this->list == ''){
			$this->assign('kong','暂时没有收到人才信息');
		}
   		$this->display();
   }
   public function rencai_admin(){
         $id = $this->_session('id');
         if($id != '23'){
            echo '抱歉您没有权限!';
            exit;
         }
         $weipost = M('weipost');
         import('ORG.Util.Page');
         $count = $weipost->count();
         $page = new Page($count,50);
         $this->list = $weipost->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
         $show = $page->show();
      $this->assign('page',$show);
      if($this->list == ''){
         $this->assign('kong','暂时没有收到人才信息');
      }
         $this->display('rencai');
   }
   public function edit_job(){
   		$data['id'] = $this->_get('id');
   		$data['pid'] = $this->_session('id');
   		$weijob = M('weijob');
   		$this->list = $weijob->find($data['id']);
   		$this->display();
   }
   public function edit_job_save(){
   		$data = $this->_post();
   		if($data['jobtitle']=='' or $data['moeny'] =='' or $data['jobcontent']==''){
   			$this->error('职位名称,年薪和职位描述都不能为空!');
   		}else {
   			$weijob = M('weijob');
   			$weijob->save($data);
   			$this->success('修改职位成功!',U('Weixin/index'));
   		}
   }
   /* 上传二维码的图片*/
   public function Upload(){
   		$session_id = $this->_session('username');
   		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize   =     4145728 ;// 设置附件上传大小
	    $upload->allowExts =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
	    $upload->savePath  =     './Upload/erweima/'; // 设置附件上传根目录
	    $upload->thumb = true;
	    $upload->uploadReplace = true;
		$upload->thumbMaxWidth = '200,200';
		$upload->thumbMaxHeight = '200,200';
	    $upload->saveRule = 'UserId_'.$session_id;
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getErrorMsg());
	    }else{// 上传成功
	      	$getInfo =  $upload->getUploadFileInfo();
	      	$data['id'] = $this->_session('id');
	    	$data['user_img'] = $getInfo['0']["savename"];
			$user = M('user');
			$list = $user->data($data)->save();

				$this->success('上传成功!');
			
	    }
   }
   public function saveUserdata(){
   		$data = $this->_post();
   		//dump($data);
   		$testuser = M('testuser');
   		$list = $testuser->data($data)->save();
   		$this->success('修改成功!');

   }
   public function job_add(){
   		$data = $this->_post();
   		if($data['jobtitle']=='' or $data['moeny'] =='' or $data['jobcontent']==''){
   			$this->error('职位名称,年薪和职位描述都不能为空!');
   		}else {
   			$weijob = M('weijob');
   			$weijob->add($data);
   			$this->success('新增职位成功!');
   		}
   }
}
/*
		import('ORG.Util.Page');
		$mopai = new MylistViewModel();
		$data['uid'] = $id;
		$data['status'] = 1;
		$count = $mopai->where($data)->count();
		$page = new Page($count,30);
		$this->lists = $mopai->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($this->lists==''){
			$this->assign('empty','sorry！没有可看的人才信息！');
		}
		$show = $page->show();
		$this->assign('page',$show);

		$remark = M('remark');
		$this->listremark = $remark->order('date desc')->select();
		$this->display();
		*/