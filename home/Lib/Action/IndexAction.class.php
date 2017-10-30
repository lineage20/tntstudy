<?php

class IndexAction extends Action 
{
    public function index()
    {
    	$db=M("article as a");
        $type=M("article_type");
        $variable=$type->where("status=1")->order('sort asc')->select();
    	foreach ($variable as $key => $value) 
    	{
            $where['a.type']=$value['id'];
            if($where['a.type']==17 ||$where['a.type']==19)
            {
                $data['second'][$value['code']]=$db->field("a.*,b.name")->where($where)->join('think_article_type as b ON a.type = b.id')->order("a.time desc")->select();
            }
    		$data['first'][$value['code']]=$db->field("a.*,b.name")->where($where)->join('think_article_type as b ON a.type = b.id')->order("a.time desc")->find();
    		$data['!first'][$value['code']]=$db->field("a.*,b.name")->where($where)->join('think_article_type as b ON a.type = b.id')->limit('1,8')->order("a.time desc")->select();
    	}
        $rand=$db->field("a.*,b.name")->where("a.type=16 or a.type=17 or a.type=19")->join('think_article_type as b ON a.type = b.id')->limit(7)->order('a.time desc')->select();
        //相关外链
        $outjoin=$db->field("a.title,a.href")->join('think_article_type as b ON a.type = b.id')->where("b.id=35")->limit(12)->order('a.id asc')->select();
        foreach ($outjoin as $key => $value) 
        {
            switch ($key) {
                case '0':$outjoin[$key]["class"]="a b";break;
                case '1':$outjoin[$key]["class"]="a b";break;
                case '2':$outjoin[$key]["class"]="a b";break;
                default:
                   $outjoin[$key]["class"]="a";
                    break;
            }
        }
        //LOMO·读图
        $img=$db->field("images,id,title")->where("type=16")->limit(8)->select();
        $img1=$db->field("images,id,title")->where("type=16")->limit(6)->order("id desc")->select();
        $this->assign("outjoin",$outjoin);
        $this->assign("img",$img);
        $this->assign("img1",$img1);
        $this->assign("variable",$variable);
        $this->assign("data",$data);
    	$this->assign("rand",$rand);
        $this->display();
    }

    public function jishu()
    {
        $db=M("article as a");
        $type=M("article_type");
        $where['secondtype']=1;
        $variable=$type->where($where)->order('secondsort asc')->select();
        foreach ($variable as $key => $value) 
        {
            $data[$key]['id']=$value['id'];
            $data[$key]['name']=$value['name'];
            $data[$key]['img']=$value['img'];
            $data[$key]['title']=$value['title'];
            $data[$key]['localtion']=$value['localtion'];
            $articlewhere['a.type']=$value['id'];
            $data[$key]['content']=$db->field("a.title,a.id,a.time")->where($articlewhere)->join('think_article_type as b ON a.type = b.id')->limit(8)->order('a.time desc')->select();
        }
        //最新上线
        $article=$db->field("a.title,a.id")->join('think_article_type as b ON a.type = b.id')->where("b.id!=34 and b.id!=19")->limit(12)->order('a.time desc')->select();
        foreach ($article as $key => $value) 
        {
            switch ($key) {
                case '0':$article[$key]["class"]="a b";break;
                case '1':$article[$key]["class"]="a b";break;
                case '2':$article[$key]["class"]="a b";break;
                default:
                   $article[$key]["class"]="a";
                    break;
            }
        }
        //心情随笔
        $suibi=$db->field("a.title,a.id")->join('think_article_type as b ON a.type = b.id')->where("b.id=19")->limit(12)->order('a.time desc')->select();
        foreach ($suibi as $key => $value) 
        {
            switch ($key) {
                case '0':$suibi[$key]["class"]="a b";break;
                case '1':$suibi[$key]["class"]="a b";break;
                case '2':$suibi[$key]["class"]="a b";break;
                default:
                   $suibi[$key]["class"]="a";
                    break;
            }
        }
        //游戏视频
        $game=$db->field("a.title,a.id")->join('think_article_type as b ON a.type = b.id')->where("b.id=34")->limit(12)->order('a.time desc')->select();
        foreach ($game as $key => $value) 
        {
            switch ($key) {
                case '0':$game[$key]["class"]="a b";break;
                case '1':$game[$key]["class"]="a b";break;
                case '2':$game[$key]["class"]="a b";break;
                default:
                   $game[$key]["class"]="a";
                    break;
            }
        }
        //随机相关分类
        $randtype=$type->query("select * from think_article_type where status=1 order by rand() limit 9");
     

        $this->assign("data",$data);
        $this->assign("game",$game);
        $this->assign("suibi",$suibi);
        $this->assign("article",$article);
        $this->assign("randtype",$randtype);
        $this->display();
    }
    public function suibi()
    {
        $db=M("article as a");
        $type=M("article_type");
        $where['secondtype']=2;
        $variable=$type->where($where)->order('secondsort asc')->select();
        foreach ($variable as $key => $value) 
        {
            $data[$key]['id']=$value['id'];
            $data[$key]['name']=$value['name'];
            $data[$key]['img']=$value['img'];
            $data[$key]['title']=$value['title'];
            $data[$key]['localtion']=$value['localtion'];
            $articlewhere['a.type']=$value['id'];
            $data[$key]['content']=$db->field("a.title,a.id,a.time")->where($articlewhere)->join('think_article_type as b ON a.type = b.id')->limit(8)->order('a.time desc')->select();
        }
         //最新上线
        $article=$db->field("a.title,a.id")->join('think_article_type as b ON a.type = b.id')->where("b.id!=34 and b.id!=19")->limit(12)->order('a.time desc')->select();
        foreach ($article as $key => $value) 
        {
            switch ($key) {
                case '0':$article[$key]["class"]="a b";break;
                case '1':$article[$key]["class"]="a b";break;
                case '2':$article[$key]["class"]="a b";break;
                default:
                   $article[$key]["class"]="a";
                    break;
            }
        }
        //心情随笔
        $suibi=$db->field("a.title,a.id")->join('think_article_type as b ON a.type = b.id')->where("b.id=19")->limit(12)->order('a.time desc')->select();
        foreach ($suibi as $key => $value) 
        {
            switch ($key) {
                case '0':$suibi[$key]["class"]="a b";break;
                case '1':$suibi[$key]["class"]="a b";break;
                case '2':$suibi[$key]["class"]="a b";break;
                default:
                   $suibi[$key]["class"]="a";
                    break;
            }
        }
        //游戏视频
        $game=$db->field("a.title,a.id")->join('think_article_type as b ON a.type = b.id')->where("b.id=34")->limit(12)->order('a.time desc')->select();
        foreach ($game as $key => $value) 
        {
            switch ($key) {
                case '0':$game[$key]["class"]="a b";break;
                case '1':$game[$key]["class"]="a b";break;
                case '2':$game[$key]["class"]="a b";break;
                default:
                   $game[$key]["class"]="a";
                    break;
            }
        }
        //随机相关分类
        $randtype=$type->query("select * from think_article_type where status=1 order by rand() limit 9");
        $this->assign("data",$data);
        $this->assign("game",$game);
        $this->assign("suibi",$suibi);
        $this->assign("article",$article);
        $this->assign("randtype",$randtype);
        $this->display();
    }
    public function liuyan()
    {
        if(I('get.type')==1||I('get.type')==2||I('get.type')==3){
            $where['type']=I('get.type');
            $words=M('words')->where($where)->order('time desc')->select();
        }else{
            $words=M('words')->order('time desc')->select();
        }
        
        $article_type=M('article_type')->select();
        foreach ($words as $key => $value) {
            //dump($value);die;
            $words[$key]['time']=date('Y-m-d H:i',strtotime($value['time']));
        }
        $this->assign('words',$words);
        $this->assign('class',I('get.type'));
        $this->assign('article_type',$article_type);
        $this->display();
    }
    public function leavemsg()
    {
        $this->assign('class',I('get.type'));
        $this->display();
    }
    public function word_message(){
        //dump(I('post.message'));die;
        if(I('post.message')==null){
            go_to('../../Index/liuyan');
        }else{
            import('ORG.Net.IpLocation');
            $Ip = new IpLocation('UTFWry.dat'); 
            $area = $Ip->getlocation(get_client_ip()); 
            $user = session ( "user" );
        //dump($user);die;
            $date['ip']=get_client_ip();
            $date['location']=$area['country'];
            $date['user_id']=$user['user_id'];
            $date['user_name']=$user['username'];
            $date['bgpic']=I('post.bgpic');
            $date['mood']=I('post.mood');
            $date['message']=I('post.message');
            $date['time']=date('Y-m-d H:i:s',time());
            if($user['user_id']){
                if($user['user_id']==17){
                    $date['type']=3;
                }else{
                    $date['type']=2;
                }
            }else{
                $date['type']=1;
            }
        //dump($date);die;
            M('words')->add($date);
            go_to('../../Index/liuyan');
        }
        $this->display();
    }
}