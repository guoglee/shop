<?php
//配置项管理模块
class configControl extends AuthControl{
	 private $db;

	 public function __init(){
	 	 $this->db=K("config");
	 }
	//修改配置型
	public function edit_config(){
		if(IS_POST){
           foreach ($_POST as $cid => $value) {
              $this->db->save(array("cid"=>$cid,"value"=>$value));
           }
           $config=$this->db->field("name,value")->all();
            $conf=array();
            foreach ($config as $c) {
            	$conf[$c['name']]=$c['value'];
            }
            file_put_contents("config/config.inc.php","<?php if(!defined('HDPHP_PATH'))exit; \n return ". var_export($conf,true).";\n?>");
            $this->success("修改配置成功","edit_config");
		}else{
			   
			   $conf=$this->db->all();
               $config=array();
               foreach ($conf as $n => $c) {
        	   $config[$c['cid']]=$c;
                }
               // p($config);
               $this->assign("config",$config);
		       $this->display();
	}

		}
       
}
?>