<?php
class MessageAction extends CommonAction {
	protected $config = array('app_type' => 'personal');
	//过滤查询字段
	function _filter(&$map){
		$map['status'] = array('eq', '1');
		$map['owner'] = $_SESSION['emp_no'];
		if (!empty($_REQUEST['keyword'])) {
			$map['content'] = array('like', "%" . $_POST['keyword'] . "%");
		}
	}

	function add() {
		$this -> display();
	}

	public function index(){
		//列表过滤器，生成查询Map对象
		$model = D("Message");
		if (empty($_POST['keyword'])){
			$list = $model -> get_list();
			$this -> assign('list', $list);
		} else {
			if (method_exists($this, '_filter')) {
				$this -> _filter($map);
			}
			if (!empty($model)) {
				$this -> _list($model, $map);
			}
		}
		$this->assign('user_id',get_user_id());
		$this->assign('auth',$this->config['auth']);
		$this -> display();
	}

	function _insert(){
		$data['content']=$_POST['content'];
		$data['add_file']=$_POST['add_file'];
		$data['sender_id']=get_user_id();
		$data['sender_name']=get_user_name();
		$data['create_time']=time();
		
		$model = D('Message');

		$arr_recever = array_filter(explode(";",$_POST['to']));
 
		foreach ($arr_recever as $val) {
			$tmp=explode("|",$val);
			$data['receiver_id']=$tmp[1];
			$data['receiver_name']=$tmp[0];			
			$data['user_id']=get_user_id();

			$list = $model -> add($data);

			$data['user_id']=$tmp[1];			
			$list = $model -> add($data);
		}
		//保存当前数据对象
		if ($list !== false) {//保存成功
			$this -> assign('jumpUrl',get_return_url());
			$this -> success('发送成功!');
		} else {
			//失败提示
			$this -> error('发送失败!');
		}
	}

	public function read(){

		$receiver_id = $_REQUEST['reply_id'];
		$sender_id = get_user_id();
		$model = M("Message");
		$where['user_id'] = get_user_id();
		$where['_string'] = "(sender_id='$sender_id' and receiver_id='$receiver_id') or (receiver_id='$sender_id' and sender_id='$receiver_id')";
		$model -> where($where) -> setField('is_read', '1');
		$list = $model -> where($where) -> order('create_time desc') -> select();
		$this -> assign('list', $list);
		
		if(is_array($list)){
			$vo=$list[0];
			if($vo['sender_id']==get_user_id()){
				$reply_id=$vo['receiver_id'];
				$reply_name=$vo['receiver_name'];
			}
			if($vo['receiver_id']==get_user_id()){
				$reply_id=$vo['sender_id'];
				$reply_name=$vo['sender_name'];
			}
			$this-> assign('reply_id',$reply_id);
			$this-> assign('reply_name',$reply_name);
		}
		$this -> display();
	}

	function reply(){

		$data['content']=$_POST['content'];
		$data['add_file']=$_POST['add_file'];
		$data['sender_id']=get_user_id();
		$data['sender_name']=get_user_name();
		$data['create_time']=time();
		$data['receiver_id']=$_POST['receiver_id'];
		$data['receiver_name']=$_POST['receiver_name'];
		$data['user_id']=get_user_id();

		$model = D('Message');		
		$list = $model -> add($data);

		$data['user_id']=$_POST['receiver_id'];
		$list = $model -> add($data);

		//保存当前数据对象
		if ($list !== false) {//保存成功
			$this -> assign('jumpUrl',get_return_url());
			$this -> success('发送成功!');
		} else {
			//失败提示
			$this -> error('发送失败!');
		}
	}

	function forward(){
		$id = $_REQUEST['id'];
		$model = M("Message");
		$where['user_id']=array('eq',get_user_id());
		$where['id']=array('eq',$id);
		
		$list=$model ->where($where)->find();
		if ($list !== false) {//保存成功
			$this -> assign('vo',$list);
			$this -> display();
		} else {
			//失败提示
			$this -> error('读取失败!');
		}
	}

	public function del() {
		$type=$_REQUEST['type'];
		$where['user_id'] = array("eq",get_user_id());
		switch($type){
			case 'all' :
				break;
			case 'dialogue' :
				$receiver_id = $_REQUEST['reply_id'];
				$sender_id = get_user_id();
				$where['_string'] = "(sender_id='$sender_id' and receiver_id='$receiver_id') or (receiver_id='$sender_id' and sender_id='$receiver_id')";
				break;
			case 'message' :
				$message_id = $_REQUEST['message_id'];
				$where['id'] = array("eq",$message_id);
				break;
			default :
				$this -> ajaxReturn('', "删除失败",0);
				break;
		}
		$model=D("Message");
		$list=$model->where($where)->delete();
	
		if ($list !== false) {//保存成功
			$this -> assign('jumpUrl', get_return_url());
			$this -> success('删除成功!');
		} else {
			$this -> error('删除失败!');
			//失败提示
		}
	}
}
