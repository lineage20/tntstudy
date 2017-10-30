<?php
// 本类由系统自动生成，仅供测试用途
class AccountAction extends Action {

    public function login()
    {
    	$this->display();
    }
    public function captcha()
    {
        import("ORG.Util.Image");
		echo Image::buildImageVerify(4,1,'png',70,30);//静态方法
    }
    //执行登录
    public function dologin()
    {    
        //$validatecode = $this->session->userdata('validatecode');
        //$vcode=$_POST("txtSCode");
        $name=$_POST["txtName"];
        $pwd=$_POST["txtPwd"];
        if(preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$name)){  //不允许特殊字符
            
            $data['error']="用户不存在";
            header("Location:/admin.php/account/login?err={$data['error']}");
            exit;
        }
        if(preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$pwd)){  //不允许特殊字符
            
            $data['error']="密码错误";
            header("Location:/admin.php/account/login?err={$data['error']}");
            exit;
        }
        $name = addslashes($name);
        
        
        
        // $sql="select * from mgr_admin a where a.adm_id='{$name}' and a.adm_status=1";
        // $adm=$this->db->query($sql)->row();
        
        
        
       $db=M('mgr_admin');
                        
        $where['adm_id']=$name;
        $where['adm_status']=1;
        $adm=$db->where($where)->find();
        //var_dump($adm);
        
        
        $sessionCode=strtolower($_SESSION['verify']);
        //获取输入的验证码  $_POST['code']
        $code=strtolower(md5($_POST["code"]));
        if($sessionCode!=$code)
        {
            $data['error']="验证码不正确";
            //header("Location:/account/login?err={$data['error']}");
            //exit;
            $this->echoErr($data);
        }
        if (!empty($adm))
        {
            $admId=$adm['id'];
            $opwd=$adm['adm_pwd'];
        
            $b=false;
        
            /*if ($validatecode != $vcode)
            {
                $data['error']="验证码不正确";  
            }
            elseif (!$opwd)
            {
                 $data['error']="账户不正确"; 
            }
            else
            {*/ 
                //$opwd = do_hash($opwd.$vcode, 'md5');
                            
                //$this->load->library('RAuth');
                //$this->rauth = new RAuth();
                //$pwd = $this->rauth->makePwd($pwd);
                
                $pwd= sha1($pwd);
                
                 if ($pwd!=$opwd)
                 {
                    $data['error']="密码不正确"; 
                    //$this->echoErr($data);
                 }
                 else
                 {
                    $b=true;
                 }        
            //}
        
            //success
            if ($b)
            {
                //登录后台
                $db1=M('mgr_admin as x');
                $where1['id']=$admId;
                $u=$db1->field('x.* ,(select group_concat(CAST(FFuncId AS char)) from think_pms_userrole a join think_pms_rolefunction b on a.FRoleId=b.FRoleId where FUserId=x.id group by FUserId) as pms')->where($where1)->find();

                //查找权限
                $db=M('mgr_admin as a');
                $where['a.id'] = $admId;
                $c=$db->field("b.froleid")->join('think_pms_userrole as b on a.id=b.fuserid')->where($where)->find();
                // var_dump($c);die;
                //$this->adm=$u;
                //$this->adm->pms=explode(',',$this->adm->pms); 
                
                //写入cookie                                     
                cookie("admid",$admId); 
                //省,市区域存入cookie
                // cookie("proid",$adm->province,0);
                // cookie("cityid",$adm->city,0);
                
                cookie("adm_name",$u['adm_id']);
                cookie("adm_fullname",$u['adm_name']);
                cookie("adm_pms",(empty($u['pms'])?"":",".$u['pms'].","));
                cookie("role_id",$c[0]['froleid']);
                // dump($u);
                // dump($_COOKIE['adm_name']);
                // $this->load->model("pms/mgr_loginlog_model", 'loginlog'); 
                // $this->loginlog->insert(array(
                //     "ip"=>Aid::getIp(),
                //     "cdate"=>date("Y-m-d H:i:s"),
                //     "browser"=>Aid::getBrowser(),
                //     "browserversion"=>0,
                //     "os"=>Aid::getOS(),
                //     "userid"=>$admId,         
                // ));
                
                $this->echoOk();
                /* header("Location:/frame");  
                exit; */
            }
            else
            {            
                $this->echoErr($data);
                /* header("Location:/account/login?err={$data['error']}");  
                exit; */
            }
        
        }
        else {
            $data['error']="用户不存在";
            $this->echoErr($data);
            
        }
        
        //header("Location:/account/login?err=用户不存在");  
        
        
        
    }
}