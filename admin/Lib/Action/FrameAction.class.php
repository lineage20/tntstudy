<?php
// 本类由系统自动生成，仅供测试用途
class FrameAction extends Action {

    public function index()
    {
        // var_dump(cookie('adm_pms'));
        $data["menu"]=$this->createMenu(cookie('adm_pms'));
        $this->assign('menu',$data['menu']);
    	$this->display();
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
        // $lv1s=$this->db->query("select fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl from pms_functions where fparentid=0");
        // $lv1c=$lv1s->num_rows();
        // $lv1s=$lv1s->result_array();
        
        $db=M('pms_functions');
        $where1['fparentid']=0;
        $lv1c=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where1)->count();
        $lv1s=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where1)->select();
        //第二层
        for($i=0;$i<$lv1c;$i++)
        {            
            // $lv2s=$this->db->query("select fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl from pms_functions where fparentid={$lv1s[$i]["id"]} order by fsort");
            // $lv2c=$lv2s->num_rows();
            // $lv2s=$lv2s->result_array();

            $where2['fparentid']=$lv1s[$i]["id"];
            $lv2c=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where2)->order('fsort')->count();
            $lv2s=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where2)->order('fsort')->select();

            //第三层
            for($j=0;$j<$lv2c;$j++)
            {
                // $lv2s[$j]["children"]=$this->db->query("select fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl from pms_functions where fparentid={$lv2s[$j]["id"]} order by fsort");
                // $lv3c=$lv2s[$j]["children"]->num_rows();
                // $lv3s=$lv2s[$j]["children"]->result_array();

                $where3['fparentid']=$lv2s[$j]["id"];
                $lv3c=$lv2s[$j]["children"]=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where3)->order('fsort')->count();
                $lv3s=$lv2s[$j]["children"]=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where3)->order('fsort')->select();
                //第四层
                for ($k=0; $k < $lv3c; $k++) 
                { 
                    // $lv3s[$k]["children"]=$this->db->query("select fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl from pms_functions where fparentid={$lv3s[$k]["id"]} order by fsort")->result_array();
                    $where4['fparentid']=$lv3s[$k]["id"];
                    $lv3s[$k]["children"]=$db->field("fid as id,fname as text,fparentid as parentid,fremark,fsort,fstyle,furl")->where($where3)->order('fsort')->select();
                }

                $lv2s[$j]["children"]=$lv3s;

            }
            
            $lv1s[$i]["children"]=$lv2s;
            
        }
        // dump($lv1s);
        return $lv1s;
    }
}