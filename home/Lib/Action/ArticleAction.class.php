<?php

class ArticleAction extends Action 
{
    public function index()
    {
        $db=M("article as a");
        $db1=M("article");
        $where['id']=$_GET['id'];
        $data=$db1->where($where)->find();
        $type=M("article_type");
        $type=$type->where(array("id"=>$data['type']))->find();

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
        $randtype=M("article_type")->query("select * from think_article_type where status=1 order by rand() limit 9");
        //美图推荐
        $img=$db1->field("images,id,title")->where("type=16")->limit(8)->select();
        // dump($img);
        $this->assign("data",$data);
        $this->assign("type",$type);
        $this->assign("game",$game);
        $this->assign("suibi",$suibi);
        $this->assign("article",$article);
        $this->assign("randtype",$randtype);
        $this->assign("img",$img);
        $this->display();
    }
}