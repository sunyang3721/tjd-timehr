<?php
class KehuAction extends CommonAction {
    public function index(){
			$kehu = M('kehu');
			$list = $kehu->order('status asc,date desc')->select();
			$this->assign('list',$list);
			$id = $this->_session('id');
			$this->user = M('user')->find($id);
			$kejob = new KehuViewModel();
			$this->kelist = $kejob->order('jinji desc,status asc,newdate desc')->select();
			$this->display();
		}
	public function lists(){
		$id = $this->_get('id');
		$kehu = M('kehu');
		$this->list = $kehu->find($id);
		$kejob = new KejobViewModel();
		$this->kelist = $kejob->where('pid='.$id)->order('status asc,newdate desc')->select();
		if($this->kelist == ''){
			$this->empty = '还没有发布任何职位！';
		}
		$this->num = $kejob->where('pid='.$id)->count();
		$this->display();
	}
	public function show(){
		$id = $this->_get('id');
		$kejob = M('kejob');
		$list = $kejob->find($id);
		$this->assign('list',$list);
		$kehu = M('kehu');
		$this->kelist = $kehu->where('id='.$list['pid'])->find();
		$user = M('user');
		$this->userlist = $user->where('id='.$list['tid'])->find();
		$testuser = M('testuser');
		$this->datalist = $testuser->where('pid='.$list['tid'])->find();
		$this->display();
	}
	public function add(){
		$kehu = M('kehu');
		$this->list = $kehu->order('title asc')->select();
		$id = $this->_session('id');
		$user = M('user')->find($id);
		if($user['openjob']==0){
			$this->error('没有权限发布职位信息！',U('Kehu/index'));
		}else{
				$testuser = M('testuser');
				$list = $testuser->where('pid='.$id)->find();
				if($list['ihone']!='' and $list['qq']!='' and $list['tuandui']!='' and $list['mail']!=''){
					$this->display();
				}else{
					$this->error('错误！您填写员工资料不完整！',U('Kehu/index'));
				}
		}
	}
	public function adding(){
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
			$list = $kejob->add($data);
			if($list){
						if($status==1){
							$kehu['id'] = $pid;
							$kehu['status'] = 1;
							$kehu['date'] = time();
							M('kehu')->save($kehu);
						}
				$this->success('保存成功！',U('Kehu/userList'));
			}else{
				$this->error('保存失败！');
			}
		}
	}
	public function userList(){
		$id = $this->_session('id');
		$con = M('kejob');
		$this->num = $con->where('tid='.$id)->count();
		$kejob = new KeuserViewModel();
		$this->list = $kejob->order('jinji desc,status asc,newdate desc')->select();
		$this->display();
	}
	public function zhuangtai(){
		$data['id'] = $this->_get('id');
		$data['status'] = $this->_get('status');
		$data['newdate'] = time();
		$kejob = M('kejob');
		$list = $kejob->data($data)->save();
		if($list){
					$pid = $this->_get('pid');
					$k = $kejob->where('status=1 and pid='.$pid)->select();
					if($k==0){
						$kehu = M('kehu');
						$kestatus['status'] = 2;
						$kestatus['date'] = time();
						$kehu->where('id='.$pid)->save($kestatus);
					}else{
						$kehu = M('kehu');
						$kestatus['status'] = 1;
						$kestatus['date'] = time();
						$kehu->where('id='.$pid)->save($kestatus);
					}
			$this->redirect('Kehu/userList');
		}else{
			$this->error('状态变更失败！');
		}
	}
	public function jinjis(){
		$data['id'] = $this->_get('id');
		$data['jinji'] = $this->_get('jinji');
		$data['newdate'] = time();
		$kejob = M('kejob');
		$list = $kejob->data($data)->save();
		if($list){
					$key['id'] = $this->_get('pid');
					$key['date'] = time();
					M('kehu')->data($key)->save();
			$this->redirect('Kehu/userList');
		}else{
			$this->error('状态变更失败！');
		}
	}
	public function updata(){
			$id = $this->_get('id');
			$this->list = M('kejob')->where('id='.$id)->find();
			$this->kehu = M('kehu')->select();
			$this->display();
	}
	public function modify(){
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
				$user_id = $this->_session('id');
				$get = $this->_post('tid');
				if($get == $user_id){ //判断是否本人操作
					$list = $kejob->save($data);
				if($list){
					$kehu = M('kehu');
					$key['id'] = $pid;
					$key['date'] = time();
					$kehu->data($key)->save();
					$this->success('保存成功！',U('Kehu/userList'));
				}else{
					$this->error('保存失败！');
				}
			}else{
				$this->error('你无权限更改别人的职位信息！');
			}

			}
	}
}