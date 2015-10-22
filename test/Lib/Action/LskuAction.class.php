<?php
class LskuAction extends CommonAction {
   public function index(){
		 $lsku = new LskuViewModel();  //数据表tjd_list
		import('ORG.Util.Page');
		$text = trim($this->_get('title')); //取值
		$data['title|hangye'] = array('like',array("%$text%")); //模糊查询 标题和行业
		$data['status'] = '1';
		$data['sid'] = '0';
		$id = $this->_session('id'); //获取用户访问权限
		$user = M('user');
		$listpdf = $user->where('id='.$id)->find();
		$this->assign('listpdf',$listpdf['listpdf']);
		//$data['status']  = array('elt',$statuspdf); //判断人力资源报告 是否 小于等于 用户权限
		$count = $lsku->where($data)->count();
		$page = new Page($count,30);
		$list = $lsku->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','sorry！没有可看的文件！');
		}
		//$map['pid']= $id;
		$map['title'] = $text;
		foreach($map as $key=>$val){
			$page->parameter .="$key=".urlencode($val)."&";
		}
		$show = $page->show();
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
   }
   public function pindex(){  //公共显示集团中的所有分公司，个人的是plist
		 $lsku = new LskuViewModel();  //数据表tjd_list
		import('ORG.Util.Page');
		$sid = trim($this->_get('id')); //取值
		$data['title'] = array('like',array("%$text%")); //模糊查询 标题和行业
		$data['status'] = 1;
		$data['sid'] = $sid;
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
   public function show_list(){ //显示list表
	    $id = $this->_get('id');
	    $lsku = M('list');
		$list = $lsku->find($id);
		$this->assign('list',$list);
		$this->display();
   }
   public function plist(){  //个人查看集团中的显示分公司  公共的是pindex
	   import('ORG.Util.Page');
	    $id = $this->_session('id'); //获取用户访问权限
		$user = M('user');
		$listpdf = $user->where('id='.$id)->find();
		$this->assign('listpdf',$listpdf['listpdf']);
		$data['pid'] = $id;  //自己的列表
		$data['status'] = 1;
		$data['sid'] = $this->_get('id');
		$lsku = M('list');
		$count = $lsku->where($data)->count();
		$page = new Page($count,30);
		$show = $page->show();
		$list = $lsku->where($data)->order('id desc')->select();
		if($list==''){
			$this->assign('empty','sorry！没有可看的文件，请创建分公司！');
		}
		//集团名称
		$title = $lsku->find($data['sid']);
		$this->assign('title',$title['title']);
		$this->assign('sid',$data['sid']);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
   }
   public function mylist(){  //查看我的集团列表
		import('ORG.Util.Page');
		$id = $this->_session('id'); //获取用户访问权限
		$user = M('user');
		$listpdf = $user->where('id='.$id)->find();
		$this->assign('listpdf',$listpdf['listpdf']);
		$data['pid'] = $this->_session('id');
		$data['status'] = 1;
		$data['sid'] = 0;
		$lsku = M('list');
		$count = $lsku->where($data)->count();
		$page = new Page($count,30);
		$list = $lsku->where($data)->order('id desc')->select();
		$show = $page->show();
		if($list==''){
			$this->assign('empty','sorry！没有可看的文件，请创建集团！');
		}
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
			dump($list);
			if($list){
				$this->success('新增成功！',U('Lsku/mylist'));
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
	   /*
		判断员工权限  3,4   修改
	   */
		$list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->save($data);
			if($result){
				$id = $this->_post('sid');
				$time['date'] = $data['date'];
				$list->where('id='.$id)->save($time);
				$this->success('保存成功！',U('Lsku/pindex',array('id'=>$data['sid'])));
			}else{
				$this->error('保存失败！');
			}
		}
   }
   /*
   public function save(){  //集团内容修改保存
		$list = M('list'); //判断条件
		$data = $this->_post();
		//$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		$data['sid'] = 0;
		if($data['title']!=''){
			$this->error($list->getError());
		}else{
			$result = $list->save($data);
			if($result){
				$this->success('保存成功！',U('Lsku/index'));
			}else{
				$this->error('保存失败！');
			}
		}
   }
   */
   public function pmodify(){  //个人编辑显示集团内容 到保存pmodeify_save()
		$this->modify();
   }
   public function pmodify_save(){  //个人集团内容修改
	   /*
		判断员工权限  3,4   修改
	   */
		$list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		//$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->save($data);
			if($result){
				$this->success('保存成功！',U('Lsku/mylist'));
			}else{
				$this->error('保存失败！');
			}
		}
   }
   public function umodify(){ //管理员编辑显示集团内容 到保存 umodify_save();
		$this->modify();
   }

   public function umodify_save(){  //管理员集团内容修改保存 umodify();
	   /*
		判断员工权限  3,4   修改
	   */
		$list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		//$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->save($data);
			if($result){
				$this->success('保存成功！',U('Lsku/index'));
			}else{
				$this->error('保存失败！');
			}
		}
   }
   public function user_modify(){  //个人编辑分公司  保存到  user_modify_save()
		$this->modify();
   }
   public function user_modify_save(){  //个人分公司内容修改保存  user_modify();
	   /*
		判断员工权限  3,4   修改
	   */
		$list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->save($data);
			if($result){
				//$this->redirect('Lsku/plist',array('id'=>$data['sid']));
				$id = $this->_post('sid');
				$time['date'] = $data['date'];
				$list->where('id='.$id)->save($time);
				$this->success('保存成功！',U('Lsku/plist',array('id'=>$data['sid'])));
			}else{
				$this->error('保存失败！');
			}
		}
   }
   public function addlist(){  //个人创建公司内容  保存到 add()
		$sid = $this->_get('sid');
		$this->assign('sid',$sid);
		$this->display();
   }
   public function add(){ //个人保存   addlist()
	   /*
		判断员工权限  3,4   创建
	   */
	    $list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->add($data);
			if($result){
				$id = $this->_post('sid');
				$time['date'] = $data['date'];
				$list->where('id='.$id)->save($time);
				$this->success('保存成功！',U('Lsku/plist',array('id'=>$data['sid'])));
			}else{
				$this->error('保存失败！');
			}
		}
   }
   public function listpdf(){
		$user = M('user');
		$data['id'] = $this->_get('id');
		$data['listpdf'] = $this->_get('listpdf');
		$list = $user->data($data)->save();
		if($list){
			$this->success('申请成功！等待审核~');
		}else{
			$this->error('申请失败！');
		}
   }
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
