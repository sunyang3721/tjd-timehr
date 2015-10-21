<?php
class EnterAction extends CommonAction {
    public function index(){
	$this->display();
    }
	public function enter_lt(){
	$web = M('web');
	$list = $web->where('id=2')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function enter_zw(){
	$web = M('web');
	$list = $web->where('id=3')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function enter_rc(){
	$web = M('web');
	$list = $web->where('id=4')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function enter_fw(){
	$web = M('web');
	$list = $web->where('id=5')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function enter_ztc(){
	$web = M('web');
	$list = $web->where('id=6')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function enter_ts(){
	$web = M('web');
	$list = $web->where('id=7')->find();
	$this->assign('list',$list);
	$Person = A('Person');
	$getIP = $Person->getIP();
	$this->assign('getIP',$getIP);
	$this->display();
	}
}