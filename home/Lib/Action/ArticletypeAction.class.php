<?php

class ArticletypeAction extends Action 
{
    public function index()
    {
        $db=M("article");// 实例化Data数据对象  date 是你的表名
        $where['type']=$_GET['id'];
        import('ORG.Util.Page');// 导入分页类
        $count = $db->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,10);// 实例化分页类 传入总记录数
	    $show = $Page->show();// 分页显示输出
	    // 进行分页数据查询
        $data=$db->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("time desc")->select();
        foreach ($data as $key => $value) 
        {
        	$data[$key]['time']=date("Y-m-d H:i:s",$value['time']);
        }
        $type=M('article_type');
        $type=$type->where(array("id"=>$_GET['id']))->find();
        //热门推荐
        $groom=$db->field("id,images,title")->limit(5)->order('hits desc,time desc')->select();
        //随机相关分类
        $randtype=M('article_type')->query("select * from think_article_type where status=1 order by rand() limit 9");
        
        $this->assign('page',$show);// 赋值分页输出
        $this->assign("data",$data);// 赋值数据集
        $this->assign("type",$type);// 赋值数据集
        $this->assign("groom",$groom);// 赋值数据集
        $this->assign("randtype",$randtype);// 赋值数据集
        $this->display();// 输出模板
    }
}