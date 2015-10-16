<?php
class NoticeAction extends CommonAction {
		public function index(){
			$notice = M('notice');
			import('ORG.Util.Page');
			$count = $notice->count();
			$page = new Page($count,10);
			$show = $page->show();
			$list = $notice->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','没有可查询的数据');
			}
			$this->assign('page',$show);
			$this->assign('list',$list);
			$this->display();
		}
		public function add(){
			$data['title'] = trim($this->_post('title',stripslashes));
			$data['date'] = time();
			$notice = M('notice');
			if($data['title']!=''){
				$list = $notice->add($data);
				if($list){
					$this->success('发布成功！');
				}else{
					$this->error('发布失败！');
				}
			}else{
				$this->error('内容不能为空！');
			}
		}
		public function del(){
			$id = $this->_param(2);
			$Notice = M('notice');
			$list = $Notice->delete($id);
			if($list){
				$this->success('删除成功！');
			}else{
				$this->error('删除失败！');
			}
		}
}