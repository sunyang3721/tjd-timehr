<?php
class JoinAction extends CommonAction {
    public function index(){
	$web = M('web');
	$list = $web->where('id=18')->find();
	$this->assign('list',$list);
	$this->display();
    }
	public function join_qt(){
	$web = M('web');
	$list = $web->where('id=19')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function join_ztc(){
	$web = M('web');
	$list = $web->where('id=20')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function join_ts(){
	$web = M('web');
	$list = $web->where('id=21')->find();
	$this->assign('list',$list);
	$Person = A('Person');
	$getIP = $Person->getIP();
	$this->assign('getIP',$getIP);
	$this->display();
	}
	public function add(){
		$data['name'] = $this->_post('name');
		$data['email'] = $this->_post('email');
		$data['qq'] = $this->_post('qq');
		$data['job'] = $this->_post('job');
		$data['tousu'] = $this->_post('tousu');
		$data['time'] = time();
		$data['ip'] = $this->_post('ip');
		$verify = md5(strtoupper($this->_post('verify')));
		$verifysin = $this->_session('verify');
		if($verifysin == $verify){
			if($data['tousu']!=''){
			$tousu = M('tousu');
			$list = $tousu->data($data)->add();
				if($list){
					$this->success('提交成功！');
				}else{
					$this->error('提交失败！');
				}
		}else{
			$this->error('投诉或建议不能为空！');
		}
		}else{
			$this->error('验证码有误！');
		}
	}
}