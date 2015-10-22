<?php
class PwdAction extends CommonAction {
    public function index(){
			$this->display();
			//$user = M('user');
			//$list= $user->cache('ceshi',60)->select();
			//$value = S('ceshi');
			//dump($value);
    }
	public function updata(){
		$id = $this->_session('id');
		$password = md5($this->_post('password'));
		$npassword = $this->_post('npassword');
		$apassword = $this->_post('apassword');
		$user = M('user');
		$list = $user->getByPassword($password);
		if($list ==''||$password==''){
			$this->ajaxReturn('', '原密码错误！', 2);
		}else{
			if($npassword!=$apassword||$npassword==''||$apassword==''){
				$this->ajaxReturn('','输入密码不一致或不能为空！',3);
			}else{
				$map['id'] = $id;
				$map['password'] = md5($apassword);
				$pwd = $user->save($map);
				if($pwd){
					$this->ajaxReturn('','密码修改成功！2秒后跳转...',1);
				}
			}
		}


	}
}