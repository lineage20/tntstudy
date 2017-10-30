<?php

class PersonAction extends Action {
	public function __construct() {
		$user = session ( "user" );
		parent::__construct ();
		if (empty ( $user )) {
			$this->error ( "请先登录", U ( 'home/Index/index' ) );
			die ();
		}

	}

	public function index(){
		$user = session ( "user" );
		$article=M('article')->order('groom desc')->limit(8)->select();
		$number=M('article')->order('number desc')->limit(6)->select();
		$user_info=M('user')->where(array('user_id'=>$user['user_id']))->find();
		$user_article=M('article')->where(array('user_id'=>$user['user_id']))->count();
		$user_article1=M('article')->where(array('user_id'=>$user['user_id']))->sum('number');
		$user_article2=M('article')->where(array('user_id'=>$user['user_id']))->sum('groom');
		$user_article3=M('article')->where(array('user_id'=>$user['user_id']))->sum('comment');
		$user_article4=M('article')->where(array('user_id'=>$user['user_id']))->sum('collect');
		$this->assign('user_article1',$user_article1);
		$this->assign('user_article2',$user_article2);
		$this->assign('user_article3',$user_article3);
		$this->assign('user_article4',$user_article4);
		$this->assign('user_article',$user_article);
		$this->assign('user_info',$user_info);
		$this->assign('num',$number);
		$this->assign('info',$article);
		$this->display();
	}
	public function message_del(){
		$where=array('id'=>$_GET['id']);
		$article=M('user_message');
		if($article->where($where)->delete()){
			$this->success('信息删除成功');
		}else{
			$this->error($article->getLastSql());
		}
	}
	public function user_points(){
		$user = session ( "user" );
		$where=array('think_points_record.user_id'=>$user['user_id']);
		$news=M('points_record');
		$count=$news->join('think_article on think_points_record.top_id=think_article.id or think_points_record.article_id=think_article.id')->where($where)->count();
			import('ORG.Util.Page');
		$Page = new Page ( $count, 5); // 实例化分页类 传入总记录数
		$show = $Page->show ();
		$info=$news->field('think_points_record.*,think_article.subject')->join('think_article on think_points_record.top_id=think_article.id or think_points_record.article_id=think_article.id')->where($where)->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign ( 'page', $show );
		$this->assign('info',$info);
		$this->display();
	}
	public function article_del(){
		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id'],'id'=>$_GET['id']);
		$article=M('article');
		if($article->where($where)->delete()){
			$this->success('发表的文章删除成功');
		}else{
			$this->error($article->getLastSql());
		}
	}
	public function article_list(){
		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id']);
		$news=M('article');
		$count=$news->where($where)->count();
		//dump($count);
		import('ORG.Util.Page');
		$Page = new Page ( $count, 5); // 实例化分页类 传入总记录数
		$show = $Page->show ();
		$collect=$news->where($where)->order('createtime desc')->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		foreach ($collect as $key => $value) {
			//dump($value['type']);
			switch ($value['type']) {
				case '1':$collect[$key]['type']='HTML';break;
				case '2':$collect[$key]['type']='javascript';break;
				case '3':$collect[$key]['type']='jQuery';break;
				case '4':$collect[$key]['type']='MySQL';break;
				case '5':$collect[$key]['type']='PHP';break;
				case '6':$collect[$key]['type']='Linux';break;
				case '7':$collect[$key]['type']='百科全书';break;
				case '8':$collect[$key]['type']='笑话故事';break;
			}
		}
		
		$this->assign('info',$collect);
		//dump($collect);
		$this->assign ( 'page', $show );
		$this->display();
	}
	public function content_add(){
		 //htmlspecialchars(stripslashes(POST['myVent']));
		//dump(htmlspecialchars(stripcslashes($_POST['editorValue'])));die;
		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id']);
		$sql=M('user')->where($where)->find();
		if($_POST['title']==null){ $this->error('标题不能为空',U('home/Person/article_add'));}
		if($_POST['typeid']==null){ $this->error('文章分类没有选择',U('home/Person/article_add'));}
		if($_POST['editorValue']=="<p><br /></p>"){ $this->error('内容不能为空',U('home/Person/article_add'));}
		$data['user_id']=$where['user_id'];
		$data['author']=$sql['author'];
		$data['subject']=$_POST['title'];
		$data['message']=htmlspecialchars(stripcslashes($_POST['editorValue']));
		$data['type']=$_POST['typeid'];
		$data['createtime']=date('Y-m-d H:i:s',time());
		$data['status']=2;	 //类型（1管理员2用户）
		$data['review']=2;   //审核（1通过2未通过）
		//dump($data);die;

		M('article')->add($data);

		$this->success('发布成功，请等待管理员审核',U('home/Person/index'));
	}
	public function pm(){

		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id']);
		$sql=M('user')->where(array('author'=>$_POST["msgtoid"]))->select();
		if($sql==null){$this->error('作者不存在',U('home/Person/writemsg'));}
		if($_POST['msgtoid']==null){ $this->error('发送到作者不能为空',U('home/Person/writemsg'));}
		if($_POST['subject']==null){ $this->error('标题不能为空',U('home/Person/writemsg'));}
		if($_POST['message']==null){ $this->error('内容不能为空',U('home/Person/writemsg'));}
		$user=M('user')->where($where)->find();
		$data['user_id']=$where['user_id'];
		$data['author']=$_POST['msgtoid'];
		$data['title']=$_POST['subject'];
		$data['content']=$_POST['message'];
		$data['sender']=$user['username'];
		$data['time']=date('Y-m-d H:i:s',time());
		$data['status']=0;
		M('user_message')->add($data);
		$this->success('发送成功',U('home/Person/writemsg'));
	}
	public function article_add(){
		$type=M('article_type')->select();
		$article=M('article');
		$article_item=$article->where("id=$id")->find();
			//dump($article_item);die;	
		$this->assign('article_item',$article_item);
		$this->assign('type',$type);
		$this->display();
	}
	public function showmsg(){
		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id']);
		$news=M('user_message');
		$count=$news->where($where)->count();
		//dump($count);
		import('ORG.Util.Page');
		$Page = new Page ( $count, 5); // 实例化分页类 传入总记录数
		$show = $Page->show ();
		$collect=$news->where($where)->order('time desc')->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign('info',$collect);
		//dump($collect);
		$this->assign ( 'page', $show );
		$this->display();
	}
	public function gomsg(){
		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id'],'status'=>0);
		$news=M('user_message');
		$count=$news->where($where)->count();
		//dump($count);
		import('ORG.Util.Page');
		$Page = new Page ( $count, 5); // 实例化分页类 传入总记录数
		$show = $Page->show ();
		$collect=$news->where($where)->order('time desc')->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign('info',$collect);
		//dump($collect);
		$this->assign ( 'page', $show );
		$this->display();
	}
	public function collect(){
		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id']);
		$news=M('collect');
		$count=$news->where($where)->count();
		import('ORG.Util.Page');
		$Page = new Page ( $count, 10); // 实例化分页类 传入总记录数
		$show = $Page->show ();
		$collect=$news->where(array('think_collect.user_id'=>$user['user_id']))->join('think_article as a on  think_collect.collect_id =a.id')->order('think_collect.time desc')->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign('info',$collect);
		$this->assign ( 'page', $show );
		$this->display();

	}
	public function collect_top(){
		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id']);
		$news=M('article');
		$count=$news->where($where)->count();
		//dump($count);
		import('ORG.Util.Page');
		$Page = new Page ( $count, 10); // 实例化分页类 传入总记录数
		$show = $Page->show ();
		$collect=$news->order('collect desc')->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign('info',$collect);
		//dump($show);
		$this->assign ( 'page', $show );
		$this->display();
	}
	public function collect_del(){
		$user = session ( "user" );
		$where=array('user_id'=>$user['user_id'],'collect_id'=>$_GET['id']);
		$article=M('collect');
		if($article->where($where)->delete()){
			$this->success('收藏的文章删除成功');
		}else{
			$this->error($article->getLastSql());
		}

	}
	public function message(){
		$user = session ( "user" );
		$author=M('user')->where(array('user_id'=>$user['user_id']))->find();
		$where=array('author'=>$author['author']);
		$news=M('user_message');
		$count=$news->where($where)->count();
		//dump($count);
		import('ORG.Util.Page');
		$Page = new Page ( $count, 5); // 实例化分页类 传入总记录数
		$show = $Page->show ();
		$collect=$news->where($where)->order('time desc')->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign('info',$collect);
		//dump($collect);
		$this->assign ( 'page', $show );
		$this->display();
	}
	/**
	 * 退出登录
	 */
	public function loginout() {
		session("user",null);
		redirect(U('Home/Index/index'));
	}
	public function article_top(){
		$user = session ( "user" );
		$sort=M('article')->order('sort desc')->limit(1)->find();
		$user_info=M('user')->where(array('user_id'=>$user['user_id']))->find();
		$points=40;//扣除置顶所需要的积分
		$article_info=M('article')->where(array('id'=>$_GET['id']))->find();
		if($article_info['review']==1){
			if($user_info['points']<$points){
				$this->error('积分不足',U('home/Person/index'));
			}else{
				$data['points']=$user_info['points']-$points;
				M('user')->where(array('user_id'=>$user['user_id']))->save($data);
				$save['sort']=$sort['sort']+1;
				M('article')->where(array('id'=>$_GET['id']))->save($save);
				$add['user_id']=$user['user_id'];
				$add['point']=$points;
				$add['time']=date('Y-m-d H:i:s',time());
				$add['type']=1;//1为置顶的记录2为发布文章的记录3奖励的
				$add['top_id']=$_GET['id'];
				M('points_record')->add($add);
				$this->success('置顶成功并扣除40个积分',U('home/Index/index'));
			}
		}elseif($article_info['review']==2){
			$this->error('正在审核的文章不能置顶',U('home/Person/index'));
		}elseif($article_info['review']==3){
			$this->error('积分不足，不能置顶',U('home/Person/index'));
		}else{
			$this->error('审核未通过的文章不能置顶',U('home/Person/index'));
		}
	}


}
?>