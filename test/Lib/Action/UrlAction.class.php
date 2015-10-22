<?php
class UrlAction extends CommonAction {
    public function index(){
			$jobtitle = M('jobtitle');
			$list = $jobtitle->find('1');
			$this->assign('list',$list);
			$this->display();
    }
}