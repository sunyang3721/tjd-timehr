<?php
class BenefitAction extends CommonAction {
    public function index(){
	$web = M('web');
	$list = $web->where('id=13')->find();
	$this->assign('list',$list);
	$this->display();
    }
	public function benefit_zz(){
	$web = M('web');
	$list = $web->where('id=14')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function benefit_jz(){
	$web = M('web');
	$list = $web->where('id=15')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function benefit_zs(){
	$web = M('web');
	$list = $web->where('id=16')->find();
	$this->assign('list',$list);
	$this->display();
	}
	public function benefit_yw(){
	$web = M('web');
	$list = $web->where('id=17')->find();
	$this->assign('list',$list);
	$this->display();
	}
}