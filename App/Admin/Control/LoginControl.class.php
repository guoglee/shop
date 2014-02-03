<?php

class LoginControl extends Control{
       public $db;

	  function __init(){       
        $this->db = k("Admin");
        if(session('aid') && METHOD!='out'){
            go("index/index");
        }
        // $this->db->auto_username('test');
       // echo var_dump($this->db);
	  }
     //后台登录界面
    function login(){
    	 //echo md5("admin888");
        $this->display(); 
    }
    function out(){
        session_unset();
        session_destroy();
        go("login");
    }
    //显示验证码
    function code(){
         $code= new Code();
         $code->show();
    }

    //验证用户输入的验证码
    function check_code(){
    	$code=q("post.code");
    	if(strtoupper($code)==session("code")){
    		echo 1; eixt;
    	}
    }
   //登录处理
    function user_login(){

    	//$db=M("user"); 
    	//$db->find("username");

    	$this->db->auto();
        p($this->db->data);
       // unset($this->db->data['code']);
        $username=Q("post.username",null,"htmlspecialchars,strip_tags");
    	$user=$this->db->where(array("username"=>$username))->find();
        if($user){
            $password=Q("post.password",null,"md5");
            if($user["password"]==$password){
                 $_SESSION['username']=$user['username'];
                 $_SESSION['aid']=$user['aid'];
                 $_SESSION['login_ip']=ip_get_client();
                 //修改本次IP
                 $this->db->save(
                      array(
                          "aid"=>$user['aid'],
                          "login_time"=>time(),
                          "login_ip"=>ip_get_client()
                        )
                    );
                 go("index/index");
            }else{

                $this->error("密码错误");
            }

        }else{
            $this->error("账号不存在");
        }
       
    }
}
?>