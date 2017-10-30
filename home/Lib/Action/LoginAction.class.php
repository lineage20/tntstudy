<?php

class LoginAction extends Action {
	
	public function index(){
		
	}
	public function dologin(){

		if(	$_SESSION['verify']	!=	md5($_POST['verify'])	){
			$this->error('验证码不正确',U("home/Index/login"));
		}

		$username=I("post.username");
		$password = md5(md5(I("post.password")));
		$m_user = M("user"); 
		$where = "(username='$username' OR phone='$username') AND password='$password'";
		$user = $m_user->where($where)->find();
		if($user){
			session("user",$user);
			$this->success("登录成功",U("home/Person/index"));
		}else{
			$this->error("登录失败,用户名或密码错误",U("home/Index/login"));
		}
		
	}
	public function register( ){
		$info=M('user')->where(array('username'=>I('post.user_id')))->select();
		//用户名
		if($info){
			echo json_encode(array("status"=>'ok'));
		}else{
			echo json_encode(array("status"=>'no'));
		}


	}
	public function register_add(){
		$data['username']=I('post.userid');
		$data['password']=md5(md5(I('post.psw')));
		$data['author']=I('post.username');
		$data['phone']=I('post.mobil');
		$data['ip']=getIP();
		$data['createtime']=date('Y-m-d H:i:s',time());
		$data['points']=100;  //注册送的积分 可用积分
		$data['total']=100;		//注册送的积分 总积分
		$data['status']=2;   //用户注册的
		$result=M("user")->add($data);
		if(empty($result)){
			$this->error("注册失败，请重试",U('home/Login/register'));
			return;
		}
		 $user = M("user")->where(array("user_id"=>$result))->find();
		if($user){
			session("user",$user);
			$data_msg['user_id']=$user['user_id'];
			$data_msg['sender']="管理员";
			$data_msg['author']=$user['author'];
			$data_msg['title']="注册";
			$data_msg['content']='爆炸学习网欢迎您，恭喜您注册成功。';
			$data_msg['time']=date('Y-m-d H:i:s',time());
			$data_msg['status']=0;
			M("user_message")->add($data_msg);
			$record['user_id']=$user['user_id'];
			$record['time']=date('Y-m-d H:i:s',time());
			$record['point']=100;
			$record['type']=3;//3是注册奖励的类型
			M('points_record')->add($record);
			$this->success("注册完成",U("home/Person/index"));
			return;
		}
		


	}
	public function author(){
		$info=M('user')->where(array('author'=>I('post.author')))->select();
			//用户名
		if($info){
			echo json_encode(array("status"=>'yes'));
		}else{
			echo json_encode(array("status"=>'not'));
		}
	}
	public function phone(){
		$info=M('user')->where(array('phone'=>I('post.phone')))->select();
			//用户名
		if($info){
			echo json_encode(array("status"=>'yes'));
		}else{
			echo json_encode(array("status"=>'not'));
		}
	}


	
	


}
?>