<?php
class MoveAction extends CommonAction {
    public function index(){
			$move = M('move');
			import('ORG.Util.Page');
			$text = $this->_post('text');
			$data['title'] = array('like',array("%$text%"));
			$id = $this->_param('2');
				if($id!='' and $id!='p'){
				$data['status'] = $id;
				}
			$count = $move->where($data)->count();
			$page = new Page($count,30);
			$show = $page->show();
			$list = $move->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','sorry！没有可看的视频！');
			}
			$this->assign('text',$text);
			$this->assign('page',$show);
			$this->assign('list',$list);
			$this->display();
    }
	public function yinpin_index(){
		$move = M('move');
		import('ORG.Util.Page');
		$text = trim($this->_get('title')); //取值
		$data['title'] =array('like',array("%$text%"));;
		$data['status'] = 6;
		$count = $move->where($data)->count();
		$page = new Page($count,30);
			$show = $page->show();
			$list = $move->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','sorry！没有可看的视频！');
			}
		foreach($data as $key=>$val){
			$page->parameter .="$key=".urlencode($val)."&";
		}
		$this->assign('soso_text','客户培训音频');
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display('List:yinpin_index');
	}
	public function Com_move(){
		$move = M('move');
		import('ORG.Util.Page');
		$text = trim($this->_get('title')); //取值
		$data['title'] =array('like',array("%$text%"));;
		$data['status'] = array('neq',6);;
		$count = $move->where($data)->count();
		$page = new Page($count,30);
			$show = $page->show();
			$list = $move->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
			if($list==''){
				$this->assign('empty','sorry！没有可看的视频！');
			}
		foreach($data as $key=>$val){
			$page->parameter .="$key=".urlencode($val)."&";
		}
		$this->assign('soso_text','内部视频');
		$this->assign('text',$text);
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display('Company:Com_move');
	}
	public function show(){
		$id = $this->_param('2');
		$move = M('move');
		$list = $move->find($id);
		$this->assign('list',$list);
		$this->display();
	}
}