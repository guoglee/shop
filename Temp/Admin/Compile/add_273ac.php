<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加品牌</title>
    <script type='text/javascript' src='http://localhost/shop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/shop';
		WEB = 'http://localhost/shop/index.php';
		URL = 'http://localhost/shop/index.php/Admin/Brand/add';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Brand';
		METH = 'http://localhost/shop/index.php/Admin/Brand/add';
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
            <li><a href="<?php echo U('index');?>" >品牌列表</a></li>
            <li><a href="javascript:;" class="action">添加品牌</a></li>
          </ul>
        </div>
         <form action="<?php echo U(add);?>" method="post" enctype="multipart/form-data">
          <table class="table2">
            <tr>
            <th class="w100">品牌名称</th>
            <td><input type="text" name="bname" id=""  class="w200"/></td>
            </tr>
             <tr>
            <th class="w100">品牌LOGO</th>
            <td><input type="file" name="logo" id=""  class="w200"/></td>
            </tr>
          </table>
       <input type="submit" value="确定" class="btn1" />
       </form>
  </div>   <!-- warp -->
</body>
</html>