<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加栏目</title>
    <script type='text/javascript' src='http://localhost/shop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/shop';
		WEB = 'http://localhost/shop/index.php';
		URL = 'http://localhost/shop/index.php/Admin/Brand/edit/bid/4';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Brand';
		METH = 'http://localhost/shop/index.php/Admin/Brand/edit';
		GROUP = 'http://localhost/shop/Shop';
		TPL = 'http://localhost/shop/Shop/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/shop/Shop/App/Admin/Tpl/Brand';
		STATIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/shop/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/shop/Shop/App/Admin/Tpl/Brand/css/css.css"/>
    <script type="text/javascript" src="http://localhost/shop/Shop/App/Admin/Tpl/Brand/js/js.js"></script>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
           <div class="menu_list">
                <ul>
                    <li><a href="<?php echo U('index');?>">品牌列表</a></li>
                    <li><a href="javascript:;" class="action">编辑品牌</a></li>
                    
                </ul>
            </div>
         <form action="<?php echo U(edit);?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="bid" value="<?php echo $field['bid'];?>"/>
            <table>
              <tr>
                <td class="w100">品牌名称</td>
                <td class="w200"><input type="text" name="bname" id="" value='<?php echo $field['bname'];?>'/></td>
              </tr>
               <tr>
                <td class="w100">品牌LOGO</td>
                <td class="w200"> <img src="http://localhost/shop/<?php echo $field['logo'];?>" alt=""  class="w150 h80" /> <input type="file" name="logo" id="" value='<?php echo $field['logo'];?>'/></td>
              </tr>
              <tr><td><input type="submit" value="确定" class="btn1" /></td> </tr>
            </table>
             
        
      
       </form>
  </div>   <!-- warp -->
</body>
</html>