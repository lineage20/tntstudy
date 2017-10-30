<?php
// 本类由系统自动生成，仅供测试用途
class SniffAction extends Action {

    public function type()
    {
        $furl="/admin.php/sniff/type";

        $froleid = $this->froleidfun();
        
        $data=$this->auth_manage($furl,$froleid);

        $this->assign('data',$data);
        $this->display();
    }
    public function type_getlist()
    {
        $p=$this->getPaging();
        // var_dump($p);
        $db=M('article_type');  
        //记录操作日志
        $this->wirtelog(1, "查询用户列表");
        $data["total"]=$db->count();
        $data["rows"]=$db->limit("{$p['start']},{$p['limit']}")->select();
        echo json_encode($data); 
    }
    public function control()
    {
        $furl="/admin.php/sniff/control";

        $froleid = $this->froleidfun();
        
        $data=$this->auth_manage($furl,$froleid);

        $this->assign('data',$data);
        $this->display();
    }
    public function control_getlist()
    {
        $p=$this->getPaging();
        // var_dump($p);
        $db=M('article');  
        //记录操作日志
        $this->wirtelog(1, "查询用户列表");
        $data["total"]=$db->count();
        $data["rows"]=$db->limit("{$p['start']},{$p['limit']}")->order('time desc')->select();
        foreach ($data["rows"] as $key => $value) 
        {
            $data["rows"][$key]['time']=date('Y-m-d H:i:s',$value['time']);
        }
        // var_dump($data);
        echo json_encode($data); 
    }
}
