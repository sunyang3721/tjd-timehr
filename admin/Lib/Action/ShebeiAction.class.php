<?php
class ShebeiAction extends CommonAction {
    public function index(){
		$shiyong =new ShebeiViewModel();
		$classif = $this->_post('classif');
		$text = trim($this->_post('text'));
		import('ORG.Util.Page');
		$data['status'] = array('in',array('1','2'));
		$data['del'] = 0;
		if($classif == 1){
			$data['yourname'] = array('like',array("%$text%"));
		}else if($classif == 2){
			$data['tsjs'] = array('like',array("%$text%"));
		}else if($classif == 3){
			$data['xsqs'] = array('like',array("%$text%"));
		}
		$count = $shiyong->where($data)->count();
		$page = new Page($count,30);
		$show = $page->show();
		$list = $shiyong->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','没有可查询的数据');
		}
		$this->assign('page',$show);
		$this->assign('classif',$classif);
		$this->assign('text',$text);
		$this->assign('list',$list);
		$this->display();
    }
	public function edit(){
		$id = $this->_param('2');
		$shiyong = new ShebeiViewModel();
		$list = $shiyong->find($id);
		//撤销状态
		$data['status'] = 0;
		$tsj_id = $list['tsj'];
		$tsj = M('tsj');
		$li = $tsj->where('id='.$tsj_id)->save($data);
		$xsq_id = $list['xsq'];
		$xsq = M('xsq');
		$xsq->where('id='.$xsq_id)->save($data);
		$tlist = $tsj->where('status=0')->select();
		$xlist = $xsq->where('status=0')->select();
		if($tlist==''){
		$this->assign('none','没有可用的设备');
		}
		if($xlist==''){
		$this->assign('none','没有可用的设备');
		}
		$this->assign('tlist',$tlist);
		$this->assign('xlist',$xlist);
		$this->assign('list',$list);
		$this->display();
	}
	public function save(){
		$sid = $this->_post('sid');
		$data['num'] = $this->_post('num');
		$data['home'] = $this->_post('home');
		$data['tsj'] = $this->_post('tsj');
		$data['xsq'] = $this->_post('xsq');
		$data['remark'] = $this->_post('remark');
		$data['date'] = time();
		$shiyong = M('shiyong');
		$list = $shiyong->where('id='.$sid)->save($data);
		$tsjxsq['status'] = 1 ;

		$xsq = M('xsq');
		$xlist = $xsq->where('id='.$data['xsq'])->save($tsjxsq);

		$tsj = M('tsj');
		$tlist = $tsj->where('id='.$data['tsj'])->save($tsjxsq);
		//dump($tlist);
		if($list){
			$this->success('修改成功！',U('Shebei/index'));
		}else{
			$this->error('修改失败！');
		}
		
	}
	/*
	public function add(){
		//使用人页面
		$tsj = M('tsj');
		$xsq = M('xsq');
		$tlist = $tsj->where('status=0')->select();
		$xlist = $xsq->where('status=0')->select();
		if($tlist==''){
		$this->assign('none','没有可用的设备');
		}
		if($xlist==''){
		$this->assign('none','没有可用的设备');
		}
		$this->assign('tlist',$tlist);
		$this->assign('xlist',$xlist);
		$this->display();
	}
	
	public function adding(){
		//增加使用人数据
		$data['username'] = $this->_post('username');
		$data['num'] = $this->_post('num');
		$data['home'] = $this->_post('home');
		$data['tsj'] = $this->_post('tsj');
		$data['xsq'] = $this->_post('xsq');
		$data['status'] = $this->_post('status');
		$data['remark'] = $this->_post('remark');
		$data['date'] = time();
		$shiyong = M('shiyong');
		if($data['username']!='' and $data['num']!=''and $data['home']!=''){
		$list = $shiyong->add($data);
		if($list){	
			$tsj = M('tsj');
			$a['username'] = $this->_post('username');
			$a['id'] = $this->_post('tsj');
			$a['status'] = $this->_post('status');
			$tlist = $tsj->save($a);
			$xsq = M('xsq');
			$b['username'] = $this->_post('username');
			$b['id'] = $this->_post('xsq');
			$b['status'] = $this->_post('status');
			$xlist = $xsq->save($b);
				if($tlist and $xlist){
					$this->success('添加成功！',U('Shebei/index'));
				}
		}else{
			$this->error('添加失败！');
		}
		}else{
			$this->error('不能为空！');
		}
	}
	*/
	public function del(){
		$id = $this->_param('3');
		$shiyong =	M('shiyong');
		$list = $shiyong->where('id='.$id)->find();
			echo $id;
			$save['status'] = 0;
			$save['username'] = '空位';
			$tsj = M('tsj');
			$tsj->where('id='.$list['tsj'])->save($save);
			$xsq = M('xsq');
			$xsq->where('id='.$list['xsq'])->save($save);

			$del['del']= 1;
			$del['date'] = time();
			$list = $shiyong->where('id='.$id)->save($del);
			if($list){
				$this->success('操作成功！');
			}else{
				$this->error('操作失败！');
			}
	}
	public function tsj(){
		$classif = $this->_post('classif');
		$text = trim($this->_post('text'));
		import('ORG.Util.Page');
		if($classif == 0){
			$data['tsj'] = array('like',array("%$text%"));
		}else if($classif == 1){
			$data['yourname'] = array('like',array("%$text%"));
		}

		$tsj = new TsjViewModel();
		$count = $tsj->where($data)->count();
		$page = new Page($count,30);
		$show = $page->show();
		$list = $tsj->where($data)->order('tsj')->limit($page->firstRow.','.$page->listRows)->select();
		//dump($list);
		if($list==''){
			$this->assign('empty','没有可查询的数据');
		}
		$this->assign('page',$show);
		$this->assign('classif',$classif);
		$this->assign('text',$text);
		$this->assign('list',$list);
		$this->display();
	}
	public function tsjadd(){
		$this->display();
	}
	public function tsjadding(){
		$data['username'] = '空位';
		$data['tsj'] = $this->_post('tsj');
		$data['xinghao'] = $this->_post('xinghao');
		$data['peizhi'] = $this->_post('peizhi');
		$data['maidate'] = $this->_post('maidate');
		$data['madedate'] = $this->_post('madedate');
		$data['sn'] = $this->_post('sn');
		$data['ihone'] = $this->_post('ihone');
		$data['moeny'] = $this->_post('moeny');
		$data['remark'] = $this->_post('remark');
		$tsj = M('tsj');
		if($data['tsj']!=''or$data['xinghao']!=''or$data['peizhi']!=''){
		$list = $tsj->add($data);
		if($list){
			$this->success('添加成功！',U('Shebei/tsj'));
		}else{
			$this->error('添加失败！');
		}
		}else{
			$this->error('不能为空！');
		}
	}
	public function tsjedit(){
		$data['id'] = $this->_param('2');
		$tsj = M('tsj');
		$list = $tsj->where($data)->find();
		$this->assign('list',$list);
		$this->display();
	}
	public function tsjsave(){
		$data['id'] = $this->_post('id');
		//$data['tsj'] = $this->_post('tsj');
		$data['xinghao'] = $this->_post('xinghao');
		$data['peizhi'] = $this->_post('peizhi');
		$data['maidate'] = $this->_post('maidate');
		$data['madedate'] = $this->_post('madedate');
		$data['sn'] = $this->_post('sn');
		$data['ihone'] = $this->_post('ihone');
		$data['moeny'] = $this->_post('moeny');
		$data['remark'] = $this->_post('remark');
		$tsj = M('tsj');
		$list = $tsj->save($data);
		if($list){
			$this->success('修改成功！',U('Shebei/tsj'));
		}else{
			$this->error('修改失败！');
		}
	}
	public function xsq(){
		$classif = $this->_post('classif');
		$text = trim($this->_post('text'));
		import('ORG.Util.Page');
		if($classif == 0){
			$data['xsq'] = array('like',array("%$text%"));
		}else if($classif == 1){
			$data['yourname'] = array('like',array("%$text%"));
		}
		$xsq = new XsqViewModel();
		$count = $xsq->where($data)->count();
		$page = new Page($count,30);
		$show = $page->show();
		$list = $xsq->where($data)->order('xsq')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','没有可查询的数据');
		}
		$this->assign('page',$show);
		$this->assign('classif',$classif);
		$this->assign('text',$text);
		$this->assign('list',$list);
		$this->display();
	}
	public function xsqadd(){
		$this->display();
	}
	public function xsqadding(){
		$data['xsq'] = $this->_post('xsq');
		$data['xxinghao'] = $this->_post('xxinghao');
		$data['xmaidate'] = $this->_post('xmaidate');
		$data['xmadedate'] = $this->_post('xmadedate');
		$data['snid'] = $this->_post('snid');
		$data['xmoeny'] = $this->_post('xmoeny');
		$data['xremark'] = $this->_post('xremark');
		$xsq = M('xsq');
		if($data['xsq']!=''or$data['xxinghao']!=''){
		$list = $xsq->add($data);
		if($list){
			$this->success('添加成功！',U('Shebei/xsq'));
		}else{
			$this->error('添加失败！');
		}
		}else{
			$this->error('不能为空！');
		}
	}
	public function xsqedit(){
		$data['id'] = $this->_param('2');
		$xsq = M('xsq');
		$list = $xsq->where($data)->find();
		$this->assign('list',$list);
		$this->display();
	}
	public function xsqsave(){
		$data['id'] = $this->_post('id');
		$data['xxinghao'] = $this->_post('xxinghao');
		$data['xmaidate'] = $this->_post('xmaidate');
		$data['xmadedate'] = $this->_post('xmadedate');
		$data['snid'] = $this->_post('snid');
		$data['xmoeny'] = $this->_post('xmoeny');
		$data['xremark'] = $this->_post('xremark');
		$xsq = M('xsq');
		$list = $xsq->save($data);
		if($list){
			$this->success('修改成功！',U('Shebei/xsq'));
		}else{
			$this->error('修改失败！');
		}
	}
	public function lizhi(){
		$shiyong =new ShebeiViewModel();
		$classif = $this->_post('classif');
		$text = trim($this->_post('text'));
		import('ORG.Util.Page');
		$data['status'] = array('in',array('1','2'));
		$data['del'] = 1;
		if($classif == 1){
			$data['yourname'] = array('like',array("%$text%"));
		}else if($classif == 2){
			$data['tsjs'] = array('like',array("%$text%"));
		}else if($classif == 3){
			$data['xsqs'] = array('like',array("%$text%"));
		}
		$count = $shiyong->where($data)->count();
		$page = new Page($count,30);
		$show = $page->show();
		$list = $shiyong->where($data)->order('date desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($list==''){
			$this->assign('empty','没有可查询的数据');
		}
		$this->assign('page',$show);
		$this->assign('classif',$classif);
		$this->assign('text',$text);
		$this->assign('list',$list);
		$this->display();
	}
	public function huifu(){
		$id = $this->_param('3');
		$shiyong = M('shiyong');
		$data['del'] = 0;
		$data['tsj'] = '143';
		$data['xsq'] = '136';
		$list = $shiyong->where('id='.$id)->save($data);
		if($list){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败！');
		}
	}
}