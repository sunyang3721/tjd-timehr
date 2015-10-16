<?php
class UserAction extends CommonAction {
    public function index(){
		$title = trim($this->_post('text'));
		$classif = $this->_post('classif');
		if($classif == 0){
					$data['username|yourname'] = array('like',array("%$title%"));
		}else if($classif==1){
			$data['username'] = array('like',array("%$title%")); //判断下拉列表是否选择
		}else if($classif == 2){
			$data['yourname'] = array('like',array("%$title%"));
		}
		$userdata = D('User');
		//$username = $this->_session('username');
		//$admin = $userdata->getByUsername($username);
		import('ORG.Util.Page');
		$data['status'] = array('like',array('1','2'));
		$data['id'] = array('neq',1);
		$count = $userdata->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $userdata->relation(true)->field('password',true)->where($data)->order('last_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('classif',$classif);
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		//$ip = $list[3]['last_ip'];
		//$ceshi = $this->getCity($ip);
		//dump($ceshi);
		$this->assign('list',$list);
		$this->display();
    }
	/*
	//IP 地理位置
	function getCity($ip){
		$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
		$ip=json_decode(file_get_contents($url));
		if((string)$ip->code=='1'){
		   return false;
		}
		$data = (array)$ip->data;
		return $data;
	}
	*/
	public function username(){
		$id = $this->_param('2');
		$this->list = M('user')->find($id);
		$this->display();
	}
	public function usernameSave(){
		$data['id'] = $this->_post('id');
		$data['yourname'] = $this->_post('yourname');
		$list = M('user')->save($data);
		if($list){
			$this->success('修改成功！',U('User/index'));
		}else{
			$this->error('修改失败！');
		}
	}
	public function zaizhi(){
		$title = trim($this->_post('text'));
		$classif = $this->_post('classif');
		if($classif == 0){
					$data['username|yourname'] = array('like',array("%$title%"));
		}else if($classif==1){
			$data['username'] = array('like',array("%$title%")); //判断下拉列表是否选择
		}else if($classif == 2){
			$data['yourname'] = array('like',array("%$title%"));
		}
		$userdata = D('User');
		$username = $this->_session('username');
		$admin = $userdata->getByUsername($username);
		import('ORG.Util.Page');
		$data['status'] = 1;
		$data['id'] = array('neq',1);
		$count = $userdata->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $userdata->relation(true)->field('password',true)->where($data)->order('last_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('classif',$classif);
		$this->assign('moshu','zaizhi');
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
		$this->display('index');
	}
	public function lizhi(){
		$title = trim($this->_post('text'));
		$classif = $this->_post('classif');
		if($classif == 0){
					$data['username|yourname'] = array('like',array("%$title%"));
		}else if($classif==1){
			$data['username'] = array('like',array("%$title%")); //判断下拉列表是否选择
		}else if($classif == 2){
			$data['yourname'] = array('like',array("%$title%"));
		}
		$userdata = D('User');
		$username = $this->_session('username');
		$admin = $userdata->getByUsername($username);
		import('ORG.Util.Page');
		$data['status'] = 2;
		$count = $userdata->where($data)->count();
		$page = new Page($count,18);
		$show = $page->show();
		$list = $userdata->relation(true)->field('password',true)->where($data)->order('last_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('classif',$classif);
		$this->assign('moshu','lizhi');
		$this->assign('soso',$title);
		$this->assign('page',$show);
		if($list==''){
		$this->assign('empty','抱歉！没有数据可查询~');
		}
		$this->assign('list',$list);
		$this->display('index');
	}
	public function status(){

		$id = $this->_param('2');
			$job = M('User');
			$list = $job->where('id='.$id)->find();
			if($list['status']==2){
				$data['status'] = 1;
				$data['time'] = time();
				$job->where('id='.$id)->data($data)->save();
				$this->ajaxReturn('<span style="color:#33cc00;">启用（在职）</span>', '启用成功', 1);
			}else if($list['status']==1){
				$data['status'] = 2;
				$job->where('id='.$id)->data($data)->save();
				$this->ajaxReturn('<span style="color:#808080;">禁用（离职）</span>','禁用成功',0);
			}
	}
	public function openjob(){
		$openjob = M('user');
		$id = $this->_param('2');
		$list = $openjob->find($id);
		if($list['openjob']==0){
			$data['openjob']=1;
			$openjob->where('id='.$id)->data($data)->save();
			$this->ajaxReturn('<span style="color:#33cc00;">允许</span>', '启用成功', 0);
		}else{
			$data['openjob']=0;
			$openjob->where('id='.$id)->data($data)->save();
			$this->ajaxReturn('<span style="color:#808080;">禁用','禁用成功',1);
		}
	}
	public function listpdf(){
		$user = M('user');
		$id = $this->_param('2');
		$list = $user->find($id);
		if($list['listpdf']==0){
			$data['listpdf']=1;
			$user->where('id='.$id)->data($data)->save();
			$this->ajaxReturn('<span style="color:#33cc00;">允许</span>', '启用成功', 0);
		}else{
			$data['listpdf']=0;
			$user->where('id='.$id)->data($data)->save();
			$this->ajaxReturn('<span style="color:#808080;">禁用','禁用成功',1);
		}
	}
	public function del(){

			$id = $this->_param('2');
			$job = M('user');
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
						$data['username|yourname'] = array('like',array("%$title%"));
			}else if($classif==1){
				$data['username'] = array('like',array("%$title%")); //判断下拉列表是否选择
			}else if($classif == 2){
				$data['yourname'] = array('like',array("%$title%"));
			}
			$job = M('user');
			import('ORG.Util.Page');
			$data['status'] = 0;
			$count = $job->where($data)->count();
			$page = new Page($count,18);
			$show = $page->show();
			$list = $job->where($data)->limit($page->firstRow.','.$page->listRows)->select();
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
			$job = M('user');
			$list = $job->where('id='.$id)->save($data);
			if($list){
				$this->ajaxReturn('huanyuan', '恢复成功！', 3);
			}else{
				$this->error('恢复失败！');
			}
		}
	public function add(){
		$this->role = M('Role')->field('id,name')->order('id desc')->select();//用户组授权选择
		$this->display();
	}
	public function adding(){
		$data['username'] = $this->_post('username');
		$data['yourname'] = $this->_post('yourname');
		$data['password'] = md5($this->_post('password'));
		$data['status'] =$this->_post('status');
		$user = new UserModel('user');
			if (!$user->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
			$this->error($user->getError());
			}else{
				$list = $user->add($data);

				$id['role_id'] = $this->_post('role_id');
				$id['user_id'] = $list;
				$role = M('roleUser')->add($id);
				$shiyong = M('shiyong');
				$data_id['pid'] = $list;
				$data_id['tsj'] = '143';
				$data_id['xsq'] = '136';
				$slist = $shiyong->add($data_id);
				$testuser = M('testuser');
				$test['pid'] = $list;
				$testlist = $testuser->add($test);
				if($list and $role and $slist and $testlist){
					$this->success('注册成功！',U('User/index'));
				}else{
					$this->error('注册失败！');
				}

			}


		/*
		if($data['username']!='' and $data['yourname']!=''){
			if($pwd==$pwds and $pwd!='' and $pwds!=''){
						$user = M('user');
						$data['password'] = md5($pwds);
						$list=$user->data($data)->add();
						if($list){
							$this->success('添加成功','index');
						}else{
							$this->error('添加失败，清理联系管理员！');
						}
			}else{
				$this->error('密码有误！！！');
			}
		}else{
			$this->error('员工账号和用户姓名不能为空！！！');
		}
		*/
	}
	public function edit(){ //修改密码
			$id = $this->_param('2');
			$job = M('user');
			$list = $job->where('id='.$id)->find();
			$this->assign('list',$list);
			$this->display();
		}
	public function save(){
			$data['id'] =$this->_post('id');
			//$data['yourname'] = $this->_post('yourname');
			$data['password'] = md5($this->_post('passwords'));
			$user = new PwdModel('user');
			if(!$user->create()){
				$this->error($user->getError());
			}else{
				$s = M('user');
				$list = $s->data($data)->save();
				if($list){
					$this->success('保存成功！',U('index'));
				}else{
					$this->error('保存失败！');
				}
			}

		}
	public function editpdf(){
			$id = $this->_param('2');
			$job = M('user');
			$list = $job->where('id='.$id)->find();
			$this->assign('list',$list);
			$this->display();
	}
	public function savepdf(){
			$data['id'] =$this->_post('id');
			$data['statuspdf'] = $this->_post('statuspdf');
				$s = M('user');
				$list = $s->data($data)->save();
				if($list){
					$this->success('保存成功！',U('index'));
				}else{
					$this->error('保存失败！');
				}
	}
	public function editRole(){
		$id = $this->_param('2');
		$this->user = D('User')->Relation(true)->find($id);
		$this->role = M('Role')->field('id,name')->select();
		$this->display();
	}
	public function saveRole(){
		$data['user_id'] = $this->_post('user_id');
		$data['role_id'] = $this->_post('role_id');
		$group = M('roleUser')->save($data);
		if($group){
			$this->success('修改成功！' ,U('User/index'));
		}else{
			$this->error('修改失败！');
		}

	}
//	public function _admin(){
//		$userdata = M('user');
//		$username = $this->_session('username');
//		$admin = $userdata->getByUsername($username);
//		if($admin['username'] != 'admin'){
//				$this->error('您无权限！');
//				exit;
//		}
//	}
}