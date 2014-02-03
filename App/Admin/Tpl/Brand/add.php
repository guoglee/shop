<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加品牌</title>
    <jquery/>
    <hdui/>
    <jsconst/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
        <div class="menu_list">
          <ul>
            <li><a href="{|U:'index'}" >品牌列表</a></li>
            <li><a href="javascript:;" class="action">添加品牌</a></li>
          </ul>
        </div>
         <form action="{|U:add}" method="post" enctype="multipart/form-data">
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