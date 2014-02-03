<?php
   if(!defined("ROOT_PATH"))exit;
  return 
  array_merge(
  	   require "./config/config.inc.php", require "./config/db.inc.php", 
  	   array(
      "DEBUG_SHOW"                    => 0,           //为TRUE时显示DEBUG信息否则显示按钮
  	  "TPL_FIX" => ".php",           //模板文件扩展名

  	   "UPLOAD_PATH"=>'upload/'.date("Y/m/d") //上传文件存放目录
  	  )                          
  	   
  	);
?>