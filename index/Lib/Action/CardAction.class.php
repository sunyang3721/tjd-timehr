<?php
class CardAction extends CommonAction {
    public function index(){  //微信招聘
		define('TPL_PATH','../index/Tpl/Card');
		$this->tpl =  TPL_PATH;
		$this->display();
    }
}