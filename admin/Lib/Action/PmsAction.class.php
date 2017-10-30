<?php
// 本类由系统自动生成，仅供测试用途
class PmsAction extends Action {

    public function functions()
    {
        $furl="/admin.php/pms/functions";

        $froleid = $this->froleidfun();
        $data=$this->auth_manage($furl,$froleid);
        $this->assign('data',$data);
    	$this->display();
    }
    public function functions_getlist()
    {
        echo json_encode($this->getTreeList()); 
    }
    public function functions_ddl()
    {
        echo json_encode($this->getTreeList()); 
    }
    /**
     * 保存功能表信息
     * 异步请求
     * @fname  功能名称
     * @fremark 备注
     * @fparentid 父功能id
     * @fid 功能id
     */
    public function functions_save()
    {
        $User = M("pms_functions");
        $parms=array(
            "fname"=>$_POST["fname"],
            "fsort"=>$_POST["fsort"],
            "fstyle"=>$_POST["fstyle"],
            "furl"=>$_POST["furl"],
            "fremark"=>$_POST["fremark"],
            "fparentid"=>$_POST["fparentid"]
        );
        
        $where['fid']=$_POST["fid"];              
        
        if(!$parms["fsort"])
        {
            $parms["fsort"]=0;
        }
        
        //add
        if (empty($where['fid']))
        {            
            $User->add($parms);    
        }
        else
        {   
            $User->where($where)->save($parms);    
        }
              
        $this->echoOk(); 
    }
          
          
    public function functions_delete()
    {    
        // var_dump($_GET['id']);
        $User = M("pms_functions"); // 实例化User对象
        $User->where(array("fid"=>$_GET['id']))->delete();   
        // $this->pms_functions->delete(array("fid"=>$id));
        $this->echoOk(); 
    }
    private function createMenu($pms)
    {
        $rst="";
        
        $tree=$this->getTreeList();  
        
        foreach ($tree[0]["children"] as $value)
        {
            if($value['id']!=10211)
            {
                $tmp = $this->secondMenu($pms,$value["children"]);
            
                if (!empty($tmp)||strpos($pms,','.$value["id"].',')!==false)
                {
                    $rst.="<li>
                    <a href='".($value["furl"]?$value["furl"]:"javascript:void(0)")."' class='dropdown-toggle'>
                        <i class='{$value["fstyle"]}'></i>
                        <span class='menu-text'> {$value["text"]} </span>
                        <b class='arrow fa fa-angle-down'></b>
                    </a>
                    <ul class='submenu'>{$tmp}</ul></li>";             
                }    
            }
            
        }
        
        
        return $rst;
        
    }
    
    
    private function secondMenu($pms,$tree)
    {        
        if (empty($tree)) return "";
        $rst="";
        foreach ($tree as $value)
        {
            if (strpos($pms,','.$value["id"].',')!==false)
            {
                $rst.="<li><a href='{$value["furl"]}' class='alink'><i class='fa fa-angle-double-right '></i>{$value["text"]}</a></li>";           
            }            
        }
        return $rst;
    }
    private function getTreeList()
    {
        //第一层
        $db=M('pms_functions');
        $where1['fparentid']=0;
        $lv1c=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where1)->count();
        $lv1s=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where1)->select();
        //第二层
        for($i=0;$i<$lv1c;$i++)
        {            
            $where2['fparentid']=$lv1s[$i]["id"];
            $lv2c=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where2)->order('fsort')->count();
            $lv2s=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where2)->order('fsort')->select();

            //第三层
            for($j=0;$j<$lv2c;$j++)
            {
                $where3['fparentid']=$lv2s[$j]["id"];
                $lv3c=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where3)->order('fsort')->count();

                $lv3s=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where3)->order('fsort')->select();
                //第四层
                for ($k=0; $k < $lv3c; $k++) 
                { 
                    $where4['fparentid']=$lv3s[$k]["id"];
                    $lv3s[$k]["children"]=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where4)->order('fsort')->select();
                }

                $lv2s[$j]["children"]=$lv3s;
            }
            $lv1s[$i]["children"]=$lv2s;
        }
        return $lv1s;
    }
    public function roles()
    {
        $furl="/admin.php/pms/roles";

        $froleid = $this->froleidfun();
        $data=$this->auth_manage($furl,$froleid);
        $this->assign('data',$data);
        $this->display();
    }
    public function roles_getlist()
    {
        $p=$this->getPaging();
        $db=M('pms_roles');  
        //记录操作日志
        $this->wirtelog(1, "查询角色列表");
        $data["total"]=$db->count();
        $data["rows"]=$db->limit("{$p['start']},{$p['limit']}")->select();
        echo json_encode($data); 
    }
       /**
     * 保存角色表信息
     * 异步请求
     * @fname  角色名称
     * @fremark 备注
     * @pms 角色功能
     */
    public function roles_save()
    {
        $parms=array(
            "fname"=>$_POST["fname"],
            "fremark"=>$_POST["fremark"]
        );
              
        $pmsarr=$_POST["pms"];              
        $id=$_POST["fid"];         
        $roles=M('pms_roles');   
        $field=M('field_find');   
        //add
        if (empty($id))
        {            
            //记录操作日志
            $this->wirtelog(2, "添加角色，名称为:".$_POST["fname"]);
            $id=$roles->add($parms);    
        }
        else
        {     
            $where['fid']=$id;
            //记录操作日志
            $this->wirtelog(3, "修改角色，名称为:".$_POST["fname"]);
            $roles->where($where)->save($parms);    
        }
              
        //update pms
              
        // $this->db->query("delete from pms_rolefunction where froleid={$id}");   
        $rolefunction=M('rolefunction');
        $where1['froleid']=$id;
        $rolefunction->where($where1)->delete();      
              
        if (!empty($pmsarr))
        {            
                  
            $pmsarr=explode(",",$pmsarr); 
                  
            $sql='insert into pms_rolefunction(froleid,ffuncid) values ';
                  
            $arr=array();
            $arr1=array();         
            foreach ($pmsarr as $fid)
            {
                if($fid==10212)
                {
                    array_push($arr1,1);
                }
                if($fid==10213)
                {
                   array_push($arr1,2);
                }
                if($fid==10214)
                {
                   array_push($arr1,3);
                }
                if($fid==10215)
                {
                   array_push($arr1,4);
                }
                if($fid==10216)
                {
                   array_push($arr1,5);
                }
                if($fid==10217)
                {
                   array_push($arr1,6);
                }
                if($fid==10218)
                {
                   array_push($arr1,7);
                }
                if($fid==10219)
                {
                   array_push($arr1,8);
                }
                if($fid==10220)
                {
                   array_push($arr1,9);
                }
                if($fid==10221)
                {
                   array_push($arr1,10);
                }
                if($fid==10222)
                {
                   array_push($arr1,11);
                }
                if($fid==10223)
                {
                   array_push($arr1,12);
                }
                if($fid==10224)
                {
                   array_push($arr1,13);
                }
                if($fid==10225)
                {
                   array_push($arr1,14);
                }
                if($fid==10226)
                {
                   array_push($arr1,15);
                }
                if($fid==10227)
                {
                   array_push($arr1,16);
                }
                if($fid==10228)
                {
                   array_push($arr1,17);
                }
                if($fid==10229)
                {
                   array_push($arr1,18);
                }
                if($fid==10230)
                {
                   array_push($arr1,19);
                }
                if($fid==10231)
                {
                   array_push($arr1,20);
                }
                if($fid==10232)
                {
                   array_push($arr1,21);
                }
                if($fid==10233)
                {
                   array_push($arr1,22);
                }
                if($fid==10234)
                {
                   array_push($arr1,23);
                }
                if($fid==10235)
                {
                   array_push($arr1,24);
                }
                array_push($arr,"({$id},{$fid})");             
            }
            self::mgr_role($arr1);      
            $sql.=implode(',',$arr);   
            // dump($sql);      
            M('pms_rolefunction')->query($sql);        
        }
              
        $this->echoOk(); 
    }
          
          
    public function roles_delete($id)
    {    
        // $this->load->model("pms/pms_roles_model","pms_roles");
        //记录操作日志
        $this->wirtelog(4, "删除角色，id:".$id);
        $roles=M('pms_roles');
        $roles->delete(array("fid"=>$id));
        $this->echoOk(); 
    }
          
    public function roles_GetPmsByRoleId($id)
    {
        $rolefunction=M('pms_rolefunction');
        $where1['froleid']=$_GET['id'];
        $id=$rolefunction->field('ffuncid as id')->where($where1)->select();

        $functions=M('pms_functions');
        $result = $functions->field('fparentid')->select();

        $array  = array();
        foreach ($result as $key => $value) 
        {
            array_push($array,$value['fparentid']);
        }
        $array_data = array();
        foreach ($id as $key => $val) 
        {
            $in_array = $val['id'];
            if(!in_array($in_array,$array))
            {
                $array_id['id'] = $in_array;
                $data = (object)$array_id;
                array_push($array_data,$data);
                
            }
        }
        echo json_encode($array_data);
    }
    private function mgr_role($arr1)
    {
        $field_find=M('field_find');
        $field_find->delete(array("adm_id"=>$_COOKIE['admid']));
        foreach ($arr1 as $key => $value) 
        {
            $parms=array(
                "adm_id"=>$_COOKIE['admid'],
                "field_key"=>$value,
            );
            $id = $field_find->add($parms);
        }
    }
    public function sysadmin()
    {
        $furl="/admin.php/pms/sysadmin";

        $froleid = $this->froleidfun();
        
        $data=$this->auth_manage($furl,$froleid);

        $this->assign('data',$data);
        $this->display();
    }
    public function sysadmin_getlist()
    {
         $p=$this->getPaging();
        $db=M('mgr_admin as a');  
        //记录操作日志
        $this->wirtelog(1, "查询用户列表");
        $data["total"]=$db->count();
        $data["rows"]=$db->field("a.*,ro.froleid,v.name as provinceName,c.name as cityName 
,(select group_concat(CAST(FRoleId AS char)) from think_pms_userrole where FUserId=a.Id group by FUserId) Roles
,(select group_concat(r.FName) from think_pms_userrole ur JOIN think_pms_roles r on r.FId=ur.FRoleId where FUserId=a.Id group by FUserId) as RolesName")->join("think_province v on a.province = v.code")->join("think_city c on a.city=c.code")->join("think_pms_userrole as ro on a.id=ro.fuserid")->limit("{$p['start']},{$p['limit']}")->select();

        echo json_encode($data); 
    }
    public function syslog()
    {
        $furl="/admin.php/pms/syslog";

        $froleid = $this->froleidfun();
        
        $data=$this->auth_manage($furl,$froleid);

        $this->assign('data',$data);
        $this->display();
    }
    public function syslog_getlist()
    {
        $p=$this->getPaging();
        // var_dump($p);
        $db=M('sys_visit_log as a');  
        //记录操作日志
        $this->wirtelog(1, "查询用户列表");
        $data["total"]=$db->count();
        $data["rows"]=$db->field("a.ip,a.os,a.browser,a.source,a.cdate,b.adm_id,b.adm_name")->join("left join think_mgr_admin b on a.userid=b.id")->limit("{$p['start']},{$p['limit']}")->order("a.cdate desc")->select();
        echo json_encode($data); 
    }
}