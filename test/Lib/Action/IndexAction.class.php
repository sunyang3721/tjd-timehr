<?php
class IndexAction extends CommonAction {
    public function index(){
			$notice = M('notice');
			$list = $notice->order('date desc')->limit('1')->select();
			if($list==''){
				$this->assign('empty','没有最新通知');
			}
			$this->assign('list',$list);
			$jobtitle = M('jobtitle');
			$lists = $jobtitle->find(2);
			$this->assign('lists',$lists);
			/*
			$move = M('move');
			$mlist = $move->order('date desc')->limit(0,4)->select();
			if($mlist==''){
				$this->assign('empty','没有最新视频');
			}
			$this->assign('mlist',$mlist);

			$pdf = M('pdf');
			$statuspdf = $this->_session('statuspdf'); //获取用户访问权限
			$data['status']  = array('elt',$statuspdf); //判断人力资源报告 是否 小于等于 用户权限
			$plist = $pdf->where($data)->order('date desc')->limit(0,4)->select();
			if($plist==''){
				$this->assign('empty','没有最新文件');
			}
			$this->assign('plist',$plist);
			*/
			$this->display();
		}
	public function notice(){
			$notice = M('notice');
			import('ORG.Util.Page');
			$count = $notice->count();
			$page = new Page($count,30);
			$show = $page->show();
			$list = $notice->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','没有最新通知');
			}
			$this->assign('page',$show);
			$this->assign('list',$list);
			$this->display();
	}
}