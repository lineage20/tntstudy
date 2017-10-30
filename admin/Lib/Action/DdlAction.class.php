<?php
// 本类由系统自动生成，仅供测试用途
class DdlAction extends Action {
  
    public function __construct() {
        parent::__construct();
                
    }
    
    
    
    /**
     * 国
     */
    public function country()
    {
        $db=M('province');
        $variable=$db->field("code as id,name as text")->select();
        echo json_encode($variable);
    }

    /**
     * 省
     */
    public function province()
    {
        $db=M('city');
        $where['provincecode']=$_GET['id'];
        $variable=$db->field("code as id,name as text")->where($where)->select();
        echo json_encode($variable);
    }

    /**
     * 市、县
     * @param mixed $pid 省ID
     */
    public function city($pid)
    {
        //$this->echoddl("select id,name as text from dic_region where pid={$pid}");
        $this->echoddl("select code as id,name as text from area where citycode={$pid}");
    }
    
    /**
     * 云子
     */
    public function sr_sensor($province=0,$city=0)
    {
        $parms=array();
        if ($province)
        {
            $parms[]="city={$province}";
        }
        if ($city)
        {
            $parms[]="city={$city}";
        }
        $sql="select id,name as text,gps_long,gps_lat from sr_sensor";
        if (!empty($parms))
        {
            $sql.="where ".implode(" and ",$parms);
        }
        $this->echoddl($sql);
    }


    /**
     * 场景点
     */
    public function sr_node()
    {
        $this->echoddl("select id,name as text from sr_node");
    }

    /**
     * 广告
     */
    public function sr_ad()
    {
        $this->echoddl("select id,title as text from sr_ad");
    }


    /**
     * Summary of echoddl
     * @param mixed $sql 
     */
    private function echoddl($sql)
    {
       echo json_encode($this->db->query($sql)->result());    
    }
}