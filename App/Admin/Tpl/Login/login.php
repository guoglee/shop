<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>登录界面</title>
    <jquery/>
    <hdui/>
    <jsconst/>
    <css file="__CONTROL_TPL__/css/css.css"/>
     <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
	<div class="warp">
		<form action="{|U:'user_login'}"  method="post">
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
				<td><input type="text" name="code" id="" class="w100" /> <img src="{|U:code}" alt="" onclick="alter_code()" id="code" /> <a href="javascript:alter_code();" >看不清</a> <span id="hd_code"></span> </td>
			</tr>
			<tr>
				
				<td  colspan="2"><input type="submit" value="登录" class="btn1"/></td>
			</tr>
		</table>
		</form>
	</div>

</body>
</html>