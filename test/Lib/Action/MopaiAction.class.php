<?php
class MopaiAction extends CommonAction {
   public function index(){
		 $lsku = new LskuViewModel();  //数据表tjd_list
		import('ORG.Util.Page');
		$data['status'] = '1';
		$data['sid'] = '0';
		$id = $this->_session('id'); //获取用户访问权限
		$user = M('user');
		$listpdf = $user->where('id='.$id)->find();
		$this->assign('listpdf',$listpdf['listpdf']);  // 0 为管理员 创建集团
		$count = $lsku->where($data)->count();
		$page = new Page($count,30);
		$list = $lsku->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可看的文件！');
		}
		$show = $page->show();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
   }
   public function pindex(){  //公共显示集团中的所有分公司，个人的是plist
		 $lsku = new LskuViewModel();  //数据表tjd_list
		import('ORG.Util.Page');
		$sid = trim($this->_get('id')); //取值
		$data['status'] = 1;
		$data['sid'] = $sid;
		$list = M('list');
		$this->title = $list->where('id='.$sid)->find();
		$id = $this->_session('id'); //获取用户访问权限
		$user = M('user');
		$listpdf = $user->where('id='.$id)->find();
		$this->assign('listpdf',$listpdf['listpdf']);
		$count = $lsku->where($data)->count();
		$page = new Page($count,30);
		$list = $lsku->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可看的文件！');
		}
		/*
		$map['title'] = $text;
		foreach($map as $key=>$val){
			$page->parameter .="$key=".urlencode($val)."&";
		}
		*/
		$show = $page->show();
		$this->assign('sid',$data['sid']);
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
   }
   public function addjituan(){  //增加集团信息
		$data = $this->_post();

		$data['status'] = 1;
		$data['date'] = time();
		$data['pid'] = $this->_session('id');
		if(!empty($data['hangye']) or !empty($data['title'])){
			$lsku = M('list');
			$list = $lsku->data($data)->add();
			//dump($list);
			if($list){
				$this->success('新增成功！',U('Mopai/index'));
			}
		}else{
			$this->error('集团名称或所属行业不能为空！');
		}
   }
      public function modify(){  //管理员编辑显示公司内容 到保存 modify_save()
		$id=$this->_get('id');
		$lsku = M('list');
		$list = $lsku->find($id);
		$this->assign('list',$list);
		$this->display();
   }
   public function modify_save(){  //管理员分公司内容修改保存 modify()
		$list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		//$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->save($data);
			if($result){
				$this->success('保存成功！',U('Mopai/pindex',array('id'=>$data['sid'])));
			}else{
				$this->error('保存失败！');
			}
		}
   }
   public function show_list(){ //显示list表
	    $id = $this->_get('id');
	    $lsku = M('list');
		$list = $lsku->find($id);
		$this->assign('list',$list);
		$this->jituan = $lsku->where('id='.$list['sid'])->find();
		//显示人才信息
		import('ORG.Util.Page');
		$this->listpdf = session('listpdf'); //获取权限值;
		$mopai = new MopaiViewModel();
		$data['gid'] = $list['id'];
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
		//dump($this->listremark);
		$this->display();
   }
   public function MopaiAdd(){  //添加人才信息表
		$data = $this->_post();
		$mopai = D('Mopai');
		if(!$mopai->create()){
			$this->ajaxReturn('',$mopai->getError(),0);
		}else{
			$result = $mopai->add($data);
			if($result){
					$setInc = M('list');
					$id = $data['gid'];
					$aaa = $setInc->where('id='.$id)->setInc('num');
					$this->ajaxReturn('','保存成功,1秒后跳转......',1);
			}else{
					$this->error('新增失败!请联系管理员!');
			}
		}
   }
	public function addRemark(){ //新增备注
		$data = $this->_post();
		$remark = D('Remark');
		if(!$remark->create()){
			$this->ajaxReturn('',$remark->getError(),0);
		}else{
			$result = $remark->add($data);
			if($result){
				$this->ajaxReturn('['.date("Y-m-d",$data['date']).']'.$data['username'].':'.$data['conter'],'提交成功!',1);
			}else{
				$this->error('新增失败!请联系管理员!');
			}
		}
	}
    public function umodify(){ //管理员编辑显示集团内容 到保存 umodify_save();
		$this->modify();
   }

   public function umodify_save(){  //管理员集团内容修改保存 umodify();
		$list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		//$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->save($data);
			if($result){
				$this->success('保存成功！',U('Mopai/index'));
			}else{
				$this->error('保存失败！');
			}
		}
   }
   public function add(){ //个人保存   addlist()
	   /*
		判断员工权限  3,4   创建
	   */
	    $list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		//$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->add($data);
			if($result){
				$id = $this->_post('sid');
				$time['date'] = $data['date'];
				$list->where('id='.$id)->save($time);
				$this->success('保存成功！',U('Mopai/pindex',array('id'=>$data['sid'])));
			}else{
				$this->error('保存失败！');
			}
		}
   }
	public function mylist(){
		$id = $this->_session('id');
		//$id = $this->_get('id');
	    //$lsku = M('list');
		//$list = $lsku->find($id);
		//$this->assign('list',$list);
		//$this->jituan = $lsku->where('id='.$list['sid'])->find();
		//显示人才信息
		import('ORG.Util.Page');
		//$this->listpdf = session('listpdf'); //获取权限值;
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
		//dump($this->listremark);
		$this->display();
	}
   //********************************************************************************

   public function del(){	 //删除list表 摸排库
		$id = $this->_get('id');
		$kehu = M('list');
		$data['status'] = 0;
		$list = $kehu->where('id='.$id)->data($data)->save();
		if($list){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
}
