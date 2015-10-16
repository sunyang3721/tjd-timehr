<?php
class LskuAction extends CommonAction {
	public function index(){
		import('ORG.Util.Page');
		$kehu = new LskuViewModel();
		$title= $this->_post('text');
		$data['title|hangye'] = array('like',array("%$title%"));
		$data['status'] = 1;
		$count = $kehu->where($data)->count();
		$page = new Page($count,40);
		$show = $page->show();
		$this->list = $kehu->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if(empty($this->list)){
			$this->empty = '没有文件';
		}
		$this->assign('page',$show);
		$this->assign('text',$title);
		$this->display();
	}
	public function modify(){  //修改list表
		$id=$this->_get('id');
		$lsku = M('list');
		$list = $lsku->find($id);
		$this->assign('list',$list);
		$this->display();
	}
	public function modify_save(){  //保存list表
		$list = new LskuModel('list'); //判断条件
		$data = $this->_post();
		$data['content'] = $this->_post('editorValue',stripslashes);
		$data['date'] = time();
		if(!$list->create()){
			$this->error($list->getError());
		}else{
			$result = $list->save($data);
			if($result){
				$this->success('保存成功！',U('Lsku/index'));
			}else{
				$this->error('保存失败！');
			}
		}
   }
    public function show_list(){  //显示list表内容
	    $id = $this->_get('id');
	    $lsku = M('list');
		$list = $lsku->find($id);
		$this->assign('list',$list);
		$this->display();
   }
	public function del(){	 //删除list表 摸排库
		$id = $this->_get('id');
		$kehu = M('list');
		$data['status'] = 0;
		$list = $kehu->where('id='.$id)->data($data)->save();
		if($list){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	public function user_list(){  //申请权限管理
		import('ORG.Util.Page');
		$user = new TestViewModel();
		$data['listpdf'] = array('gt',0);
		$count = $user->where($data)->count();
		$page = new Page($count,30);
		$show = $page->show();
		$list = $user->where($data)->order('listpdf asc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();

	}
	public function sae(){  //授权操作
		$data['id'] = $this->_post('id');
		$data['listpdf'] = $this->_post('listpdf');
		$user = M('user');
		$list = $user->data($data)->save();
		if($list){
			$this->success('修改成功！');
		}else{
			$this->error('修改失败！');
		}
	}
	public function huishou(){  //回收站查询
		import('ORG.Util.Page');
		$kehu = new LskuViewModel();
		$title= $this->_post('text');
		$data['title|hangye'] = array('like',array("%$title%"));
		$data['status'] = 0;
		$count = $kehu->where($data)->count();
		$page = new Page($count,40);
		$show = $page->show();
		$this->list = $kehu->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if(empty($this->list)){
			$this->empty = '没有文件';
		}
		$this->assign('page',$show);
		$this->assign('text',$title);
		$this->display();
	}
	public function uphui(){ //恢复文件操作
		$data['id'] = $this->_get('id');
		$lsku = M('list');
		$data['status'] = 1;
		$list = $lsku->data($data)->save();
		if($list){
			$this->success('恢复成功！');
		}else{
			$this->error('恢复失败！');
		}
	}
}