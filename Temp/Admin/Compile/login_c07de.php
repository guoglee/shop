<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>登录界面</title>
    <script type='text/javascript' src='http://localhost/shop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/shop';
		WEB = 'http://localhost/shop/index.php';
		URL = 'http://localhost/shop/index.php/Admin/Login/login';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Login';
		METH = 'http://localhost/shop/index.php/Admin/Login/login';
		GROUP = 'http://localhost/shop/Shop';
		TPL = 'http://localhost/shop/Shop/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/shop/Shop/App/Admin/Tpl/Login';
		STATIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/shop/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/shop/Shop/App/Admin/Tpl/Login/css/css.css"/>
     <script type="text/javascript" src="http://localhost/shop/Shop/App/Admin/Tpl/Login/js/js.js"></script>
</head>
<body>
	<div class="warp">
		<form action="<?php echo U('user_login');?>"  method="post">
		<table class="table1">
			<tr>
				<td class="w100">用户名：</td>
				<td><input type="text" name="username" id="" class="w200" /></td>
			</tr>
			
			<tr>
				<td>密码：</td>
				<td><input type="password" name="password" id="" class="w200"/></td>
			</tr>
			<tr>
				<td>验证码：</td>
				<td><input type="text" name="code" id="" class="w100" /> <img src="<?php echo U(code);?>" alt="" onclick="alter_code()" id="code" /> <a href="javascript:alter_code();" >看不清</a> <span id="hd_code"></span> </td>
			</tr>
			<tr>
				
				<td  colspan="2"><input type="submit" value="登录" class="btn1"/></td>
			</tr>
		</table>
		</form>
	</div>

</body>
</html>