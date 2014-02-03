<?php

    /**
    *后台权限验证
    **/
   class AuthControl extends Control{
     public function __init(){
     	if($this->auth_user()){
            go("Login/login");
        };
     }

     private function auth_user(){
     	if(!session('aid')){
            return false;
        }
        return true;
     }
    function ueditor_upload() { //编辑器图片上传处理方法
        C("debug", 0); //因为要返回json 数据，所以不能有调试结果等字符出现
        $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES); //对标题实体化
        $upload = new Upload(); //实例化上传类
        $file = $upload->upload(); //上传图像

        if (!$file) {// 发生上传错误
            echo "{'title':'" . $upload->error . "','state':'" . $upload->error . "'}";
            exit;
        }
        $info = $file[0];
        $f = pathinfo($info['path']);
        $upload = array(
            "ext" => $f['extension'],
            "name" => $f['basename'],
            "path" => $f['dirname'],
            "size" => filesize($info['path']),
            "uid" => $_SESSION['aid'],
            "addtime"=>time()
        );
        $db = M("upload");
        $id = $db->add($upload);
        if (!isset($_SESSION['upload'])) {
            $_SESSION['upload'] = array();
        }
        $_SESSION['upload'][] = $id;
        $info['url'] = __ROOT__ . '/' . $info['path'];
        $info["state"] = "SUCCESS";
        //JSON
        echo "{'url':'" . $info['url'] . "','title':'" . $title . "','original':'" . $info["filename"] .
        "','state':'" . $info["state"] . "'}";
        exit;
     }

   }
?>