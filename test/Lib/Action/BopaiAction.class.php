<?php
class BopaiAction extends CommonAction {
   public function index(){
		//$data['pid'] = $this->_get('id'); //企业过滤
   		$username = $this->_session('username'); // 判断是否非管理员
   		if(!in_array($username, C('ADMIN_BOPAI'))){
   			$data['username'] = $username; //不是管理员就显示自己的人才资料
   		}else{
   			$this->guwen= '2';
   		}
   		if (in_array($username, C('GUWEN_BOPAI'))){ //是顾问权限就显示承接按钮
   			$this->guwen = '1';
   		}
		$qiye = $this->_get('id');
		//$data['eid'] = $this->_get('pid'); //项目过滤
		$xiangmu = $this->_get('pid');
		//$data['address'] = trim($this->_get('address')); //地区过滤
		$diqu = trim($this->_get('address'));
		//$data['name|job|project|address|chengjieren|yourname|chusheng|opendate|voluam'] = trim($this->_get('text')); //关键字过滤
		$guanjianzi = trim($this->_get('text'));
		$order_id = $this->_get('order'); //每个字段排序
		$this->assign('order',$order_id); //输出排序触发事件
		if($qiye!=''){
			$data['pid'] = $qiye;
			$this->assign('qiye',$qiye);
		}
		if($xiangmu!=''){
			$data['eid'] = $xiangmu;
			$this->assign('xiangmu',$xiangmu);
		}
		if($diqu!=''){
			$data['address'] = $diqu;
			$this->assign('diqu',$diqu);
		}
		$result = array();
		$str = explode(' ',$guanjianzi);
			foreach($str as $key=>$value){
				if($value!=''){
					$result[] = '%'.$value.'%';
				}
			}
		if($guanjianzi !=''){
			$data['name|job|project|address|chengjieren|yourname|chusheng|opendate|voluam|gongsiname|jobaddress'] = array('like',$result);
		}
		switch($order_id){
			case "1":$order = 'id asc';
				break;
			case "2":$order = 'id desc';
				break;
			case "3":$order = 'project asc';
				break;
			case "4":$order = 'project desc';
				break;
			case "5":$order = 'address asc';
				break;
			case "6":$order = 'address desc';
				break;
			case "7":$order = 'voluam asc';
				break;
			case "8":$order = 'voluam desc';
				break;
			case "9":$order = 'opendate asc';
				break;
			case "10":$order = 'opendate desc';
				break;
			case "11":$order = 'name asc';
				break;
			case "12":$order = 'name desc';
				break;
			case "13":$order = 'chusheng asc';
				break;
			case "14":$order = 'chusheng desc';
				break;
			case "15":$order = 'sex asc';
				break;
			case "16":$order = 'sex desc';
				break;
			case "17":$order = 'job asc';
				break;
			case "18":$order = 'job desc';
				break;
			case "19":$order = 'moeny asc';
				break;
			case "20":$order = 'moeny desc';
				break;
			case "21":$order = 'xueli asc';
				break;
			case "22":$order = 'xueli desc';
				break;
			case "23":$order = 'nowstatus asc';
				break;
			case "24":$order = 'nowstatus desc';
				break;
			case "25":$order = 'date asc';
				break;
			case "26":$order = 'date desc';
				break;
			case "27":$order = 'yourname asc';
				break;
			case "28":$order = 'yourname desc';
				break;
			case "29":$order = 'chengjieren asc';
				break;
			case "30":$order = 'chengjieren desc';
				break;
			case "31":$order = 'chengjieriqi asc';
				break;
			case "32":$order = 'chengjieriqi desc';
				break;
			case "33":$order = 'yanzheng asc';
				break;
			case "34":$order = 'yanzheng desc';
				break;
			 default:$order = 'date desc';
		}
		$this->_talent($data,$order);

		$this->assign('text',$guanjianzi);//关键字高亮显示
		 //显示父级  企业名称
		$this->boenter =  M('boenter')->where('pid=0')->select();
		//显示子级 项目名称
		$this->project = M('boenter')->where('pid!=0')->select();
		//$this->username = M('user')->where()->select();
		//显示承接人姓名
		$this->chengjiexingming = M('user')->select();
		$this->display();
   }
   public function _talent($data,$order='date desc'){
	   $talent = new BopaiViewModel();
		import('ORG.Util.Page');
		$count = $talent->where($data)->count();
		$page = new Page($count,30);
		$list = $talent->where($data)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
		//dump($list);
		//echo $talent->getLastSql();
		if(!$list){
			$this->kong = 'sorry!没有可查询的数据~';
		}
		$show = $page->show();
		$this->assign('show',$show);
		$this->assign('list',$list);
   }

   public function addEnter(){  //添加集团名称和总部地点   由管理员填写
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->allowExts  = array('png','jpg','gif','bmp','jpeg');// 设置附件上传类型
		$upload->savePath =  './Upload/bopai/';// 设置附件上传目录
		$upload->maxSize  = 4*1024*1024 ;  //不能超过4MB
		$upload->saveRule = time(); //起名用时间目录
		 $upload->thumb = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath = 'ORG.Util.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix = 'm_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '900';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '2000';
        //删除原图
        $upload->thumbRemoveOrigin = true;
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();

		}
		//post提交
		$data = $this->_post();
		$data['imgpath'] = $info[0][savename];
		$data['pid'] = 0;
		$boenter = new BopaiModel('boenter');
		if(!$boenter->create()){
			$this->error($boenter->getError());
		}else{
				$list = $boenter->add($data);
				if($list){
					$this->success('添加集团成功!');
				}else{
					$this->error('添加集团失败!');
				}
		}
   }
   public function addProject(){  //添加项目名称 地点 开业日期 商业面积 租金 日均客流量
		$data = $this->_post();
		$boenter = new BopaiModel('boenter');
		if(!$boenter->create()){
			$this->error($boenter->getError());
		}else{
				if($data['chusheng_nian']!=0 and $data['chusheng_yue']!=0){
				$data['opendate'] = $data['chusheng_nian'].'年'.$data['chusheng_yue'].'月';
				}else{
				$data['opendate'] = '未知';
				}
				$list = $boenter->add($data);
				if($list){
					$this->success('添加项目成功!');
				}else{
					$this->error('添加项目失败!');
				}
		}
   }
   public function ajaxProject(){
	    $id = $this->_param('2');
		 if($id==0){
			$boenter = M('boenter')->where('pid!=0')->select();
			foreach($boenter as $key=>$value){
			$row[] = array(
				'id' => $value['id'],
				'project' => $value['project'],
				'pid' => $value['pid'],
			);
		}
		$this->ajaxReturn($row,JSON);
		}else{
		$boenter = M('boenter')->where('pid='.$id)->select();
		foreach($boenter as $key=>$value){
			$row[] = array(
				'id' => $value['id'],
				'project' => $value['project'],
				'pid' => $value['pid'],
			);
		}
		$this->ajaxReturn($row,JSON);
		}
   }
   public function ajaxAddress(){
	   $id = $this->_param('2');
	   if($id==0){
			$boenter = M('boenter')->where('pid!=0')->Distinct(true)->field('address')->select();
			foreach($boenter as $key=>$value){
			$row[] = array(
				'address' => $value['address'],
			);
			}
			$this->ajaxReturn($row,JSON);
	   }else{
			$boenter = M('boenter')->where('id='.$id)->select();
			foreach($boenter as $key=>$value){
			$row[] = array(
				'address' => $value['address'],
			);
			}
			$this->ajaxReturn($row,JSON);
	   }
   }
   public function addTalent(){ //新增人才信息
			$data = $this->_post();
			if($data['chusheng_nian']!='0' and $data['chusheng_yue']!='0'){
				$data['chusheng'] = $data['chusheng_nian'].'年'.$data['chusheng_yue'].'月';
			}else{
				$data['chusheng'] = '不详';
			}
			$talent = new BopaiModel('botalent');
			if(!$talent->create()){
				$this->ajaxReturn('',$talent->getError(),0);
			}else{
				$result = $talent->add($data);
				if($result){
						$this->ajaxReturn('','保存成功,1秒后跳转......',1);
				}else{
						$this->error('新增失败!请联系管理员!');
				}
			}
   }

   //查看我上传的信息
   public function my_list(){
			$data['uid'] = $this->_session('id');
			$guanjianzi = trim($this->_get('text'));
			if($guanjianzi !=''){
				$data['name|job|project|address|chengjieren|chusheng|opendate|voluam'] = $guanjianzi;
			}
			$this->_talent($data);
			$this->assign('text',$guanjianzi);//关键字高亮显示
			//显示承接人姓名
			$this->chengjiexingming = M('user')->select();
			$this->display();
   }
   public function edit_user(){
   			$session_user_id = $this->_session('id');
   			$id = $this->_get('id');  
   			$botalent = M('botalent');
   			$list = $botalent->find($id); //指定id 查询
   			$this->assign('list',$list);
   			if($list['uid'] == $session_user_id){ //判断是否属于同一人
   				$this->display();
   			}else{
   				$this->error('您无权限修改别人的信息!');
   			}
   			//dump($list);
   			
   }
   public function save_user(){
   			$data= $this->_post();
   			$botalent = M('botalent');
   			$list = $botalent->save($data);
   			if($list){
   				$this->success('修改成功',U('Bopai/index'));
   			}else{
   				$this->error('修改失败!');
   			}
   }
   public function my_join(){  //查看我承接的人才信息
   			$username = $this->_session('username'); // 判断是否非管理员
	   		if (in_array($username, C('GUWEN_BOPAI'))){ //是顾问权限就显示承接按钮
	   			$this->guwen = '1';
	   		}
			$data['chengjieren'] = $this->_session('id');
			$guanjianzi = trim($this->_get('text'));
			if($guanjianzi !=''){
				$data['name|job|project|address|chusheng|opendate|voluam'] = $guanjianzi;
			}
			$this->_talent($data);
			$this->assign('text',$guanjianzi);//关键字高亮显示
			//显示承接人姓名
			$this->chengjiexingming = M('user')->select();
			$this->display();
   }
   public function quedingchengjie(){ //承接顾问按钮处理
			$id = $this->_param('2');
			$talent = M('botalent');
			$data['quedingchengjie'] = 1;
			$data['chengjieriqi'] = time();
			$list = $talent->where('id='.$id)->data($data)->save();
			if($list){
				$this->ajaxReturn(date('Y-m-d'), '承接成功!', 1);
			}
   }

   public function show_list(){ //显示详细内容人才信息和项目
			$id = $this->_param('3');
			$talent = new BopaiViewModel();
			$list = $talent->find($id);

			$this->usermail = M('testuser')->where('pid='.$list['chengjieren'])->find();//显示承接人的邮箱
			$this->userid = $this->_session('id');
			$this->assign('list',$list);
			$data['username'] = array('in',array_merge(C('ADMIN_BOPAI'),C('GUWEN_BOPAI')));//显示顾问权限在内
			$data['status'] = 1 ; //在职状态
			$this->username = M('user')->where($data)->order('last_time desc')->select();
			//dump($list);
			$user_sin = $this->_session('username'); 
	   		if(in_array($user_sin,$data['username']['1']) and $list['chengjieren'] == $this->_session('id')){ //判断是否包含管理员和顾问  是的话 无权限查看手机号码
	   			if($list['quedingchengjie'] == '1' ){
				$this->iphone = $list['iphone'];
				}else{
					$this->iphone = '只有承接才能显示';
				}
			}else{
				if($list['username'] != $user_sin){
					//$this->error('你没有权限查看别人的简历');
					$this->iphone = '无权限查看!';
				}
				
			}
			
			//显示总部企业结构图
			$this->img = M('boenter')->field('imgpath')->where('id='.$list['pid'])->select();
			//顾问沟通留言
			$remark = new RemarkViewModel();
			$this->relist = $remark->order('date desc')->where('tid='.$id)->select();
			if($this->relist==''){
				$this->kong='暂时没有沟通内容及状况';
			}
			$this->display();
   }
   public function quxiaochengjie(){ //取消承接顾问
   		$data = $this->_get();
   		$botalent = M('botalent');
   		if($data!=''){
   			$list = $botalent->data($data)->save();
   			if($list){
   				$this->redirect('Bopai/show_list',array('id'=>$data['id']));
   			}else{
   				$this->error('取消承接顾问失败');
   			}
   		}
   }
   public function mails($chengjie,$id){  //发送邮件函数
		$talent = new BopaiViewModel();
		$list = $talent->find($id);
		//dump($list);
		$talents = new BopaimailViewModel();
		$lists = $talents->find($chengjie);
		//dump($lists);
		$subject = $list['yourname'].'顾问在摸排库承接提醒您!';
		$body = '<b>人才姓名:</b>'.$list['name'].'<br/><b>职位:</b>'.$list['job'].'<br/><b>出生年月:</b>'.$list['chusheng'].'<br/><b>年薪:</b>'.$list['moeny'].'万<br/><b>所在项目名称:</b>'.$list['project'].'<br/><a href="http://tjd.timehr.com/test.php/Bopai/my_join.html">进入官网查看</a>';
		$to = trim($lists['mail']);
		think_send_mail($to,'tjd.timehr.com官网',$subject,$body);
	}
   public function remarkUser(){  //添加顾问沟通内容
			$data = $this->_post();
			$boremark = M('boremark');
			if($data['remark']!=''){
			$remark = $boremark->add($data);
				$this->ajaxReturn($data['remark'], '保存成功!', 1);
			}else{
				$this->ajaxReturn('', '沟通内容不能为空', 0);
			}
   }
   public function chengjieUser(){  //提交承接顾问  字段chengjieren
			$chengjie = $this->_post('chengjieren');
			$id = $this->_post('id');
			if($chengjie==0 or $chengjie ==''){
					$this->error('错误!你没有选定需要承接的顾问!');
			}else{
					$data['chengjieren'] = $chengjie;
					$data['id'] = $id;
					$list = M('botalent')->data($data)->save();
					if($list){
						$this->success('提交成功!');
						$this->mails($chengjie,$id);
					}else{
						$this->error('提交失败!');
					}
			}
   }
   public function yanzhengUser(){   //验证联系 是否有效
			$data['yanzheng'] = $this->_post('yanzheng');
			$data['id'] = $this->_post('id');
			$list = M('botalent')->data($data)->save();
			if($list){
				$this->success('验证成功!');
			}else{
				$this->error('验证失败!');
			}

   }
   public function my_xiangmu(){
   			$username = $this->_session('username');
   			if (in_array($username, C('GUWEN_BOPAI'))){
	   			$this->guwen = '1';
	   		}
	   		if (in_array($username,C('ADMIN_BOPAI'))) {
	   			$this->guwen = '2';
	   		}
			$boenter = M('boenter');
			$this->list = $boenter->select();
			$this->enter = $boenter->where('pid=0')->select();
			 //显示父级  企业名称
		$this->boenter =  M('boenter')->where('pid=0')->select();
			$this->display();
   }
   public function edit_enter(){  //修改企业总部和项目
			$id = $this->_param('id');
			$boenter = M('boenter');
			$list=$boenter->find($id);
			$this->assign('list',$list);
			if($list['pid'] ==0){
				$this->display();
			}else{
				$this->xiangmu = $boenter->where('pid=0')->select();
				$this->display('edit_xiangmu');
			}
   }
   public function save_enter(){  //保存企业总部和项目
			$data['id'] = (int)$this->_post('id');
			$data['project'] = $this->_post('project','trim');
			$data['address'] = $this->_post('address','trim');
			//项目提交
			$data['voluam'] =$this->_post('voluam','trim');
			$data['zujin'] = $this->_post('zujin','trim');
			$data['liuliang'] = $this->_post('liuliang','trim');
			$data['pid'] = (int)$this->_post('pid');
			$data['opendate'] = $this->_post('opendate');
			$data['beizhu'] = $this->_post('beizhu');
			$boenter = new BopaiModel('boenter');
			if(!$boenter->create()){
				$this->error($boenter->getError());
			}else{
				$list = $boenter->save($data);
				if($list){
					$this->success('修改成功!',U('Bopai/my_xiangmu'));
				}else{
					$this->error('修改失败!');
				}
			}
   }
   public function edit_imgpath(){  //企业结构
			$this->id = $this->_param('id');
			dump($this->id);
			$this->display();
   }
   public function save_imgpath(){ //上传保存企业结构
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->allowExts  = array('png','jpg','gif','bmp','jpeg');// 设置附件上传类型
			$upload->savePath =  './Upload/bopai/';// 设置附件上传目录
			$upload->maxSize  = 4*1024*1024 ;  //不能超过4MB
			$upload->saveRule = time(); //起名用时间目录
			 $upload->thumb = true;
			// 设置引用图片类库包路径
			$upload->imageClassPath = 'ORG.Util.Image';
			//设置需要生成缩略图的文件后缀
			$upload->thumbPrefix = 'm_';  //生产2张缩略图
			//设置缩略图最大宽度
			$upload->thumbMaxWidth = '900';
			//设置缩略图最大高度
			$upload->thumbMaxHeight = '2000';
			//删除原图
			$upload->thumbRemoveOrigin = true;
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
				//post提交
				$data['id'] = $this->_post('id');
				dump($data['id']);
				$data['imgpath'] = $info[0][savename];
				$boenter = M('boenter');
				$list = $boenter->save($data);
				if($list){
					$this->success('上传成功!',U('Bopai/my_xiangmu'));
				}else{
					$this->error('上传失败!');
				}
			}
   }
   public function tongji(){
   			$user = $this->_session('username'); 
   			if (in_array($user, C('GUWEN_BOPAI'))){ //是顾问权限就显示承接按钮
	   			$this->guwen = '1';
	   		}
	   		if(in_array($user,C(ADMIN_BOPAI))){
	   			$this->guwen = '2';
	   		}
   			$tongji = new BopaiViewModel();
   			$this->list = $tongji->distinct(true)->field('username,yourname,status')->select();
			foreach ($this->list as $key => $value) {
						$num = $tongji->where('username='.$value['username'])->count();
						$username[] =array('yourname'=>$value['yourname'],'num'=>$num,'status'=>$value['status']);
			}
			
			$key = $this->array_sort($username,'num','desc');
			$this->username=$key;
   			$this->display();
   }
   function array_sort($arr,$keys,$type='asc'){ 
		$keysvalue = $new_array = array();
		foreach ($arr as $k=>$v){
			$keysvalue[$k] = $v[$keys];
		}
		if($type == 'asc'){
			asort($keysvalue);
		}else{
			arsort($keysvalue);
		}
		reset($keysvalue);
		foreach ($keysvalue as $k=>$v){
			$new_array[$k] = $arr[$k];
		}
		return $new_array; 
	} 
}
