<?php
class RbacAction extends CommonAction {
    public function index(){
		$this->display();
    }
	public function addRole(){
		$this->display();
	}
	//添加角色
	public function addRoleHandle(){
		if(M('Role')->add($_POST)){
			$this->success('添加成功！');
		}
	}
	//角色管理
	public function RoleList(){
		$this->role = M('Role')->select();
		$this->display();
	}
	//修改角色
	public function editRole(){
		$id = $this->_get('rid');
		$this->role = M('Role')->find($id);
		$this->display();
	}
	//保存角色
	public function saveRole(){
		$data['id'] = $this->_post('id');
		$data['name'] = $this->_post('name');
		$data['remark'] = $this->_post('remark');
		$data['status'] = $this->_post('status');
		$list = M('Role')->save($data);
		if($list){
			$this->success('修改成功！',U('Rbac/RoleList'));
		}else{
			$this->error('修改失败！');
		}
	}
	//添加权限（节点）
	public function addNode(){
		$this->node=M('Node')->where('level!=3')->order('sort')->select();
		$this->display();
	}
	//添加节点表单处理
	public function addNodeHandle(){
		$node = M('node');
		$node->create();
		if($node->add()){
			$this->success('添加成功！');
		}
	}
	//权限管理（节点列表）
	public function NodeList(){
		import('ORG.Util.Tree');
		$node = M('Node')->order('sort')->select();
		$this->node = Tree::create($node);
		$this->display();
	}
	//删除权限
	public function deleteNode(){
		$id = $_GET['rid'];
		if(M('Node')->delete($id)){
			$this->success('删除成功！');
		}
	}
	//配置权限
	public function access(){
		$rid = $this->_param('3');
		import('ORG.Util.Tree');
		$node = M('Node')->order('sort')->select();
		$node = Tree::create($node);

		$data=array();//$data用于存放最新数组，里面包含当前用户组是否有没一个权限
		$access = M('Access');
		foreach($node as $value){
			$count = $access->where('role_id='.$rid.' and node_id='.$value['id'])->count();
			if($count){
				$value['access'] = 1;
			}else{
				$value['access'] = 0;
			}
			$data[]=$value;
		}
		$this->nodelist=$data;
		$this->rid = $rid; //不知道干什么用
		$this->role = M('Role')->getFieldById($rid,'name');
		$this->display();
	}
	//添加角色-权限表
	public function setAccess(){
		$rid = $this->_post('rid');
		$access = M('Access');
		$access->where('role_id='.$rid)->delete();//清空当前角色的所有权限

		if(isset($_POST['access'])){
			$data = array();
			foreach($_POST['access'] as $value){
				$tmp = explode('_',$value);
				//dump($tmp);
				$data[]=array(
					'role_id' => $rid,
					'node_id' => $tmp[0],
					'level' => $tmp[1]
				);
			}
				if($access->addAll($data)){
					$this->success('成功！');
				}else{
					$this->error('失败！');
				}
		}else{
			$this->success('修改成功！');
		}
	}
//	public function group(){
//		$this->display();
//	}
//	//节点列表
//	public function setAccess(){
//		$rid = i('rid','',int);
//		$access = M('Acess')->where('role_id='.$rid)->delete();
//	}
}