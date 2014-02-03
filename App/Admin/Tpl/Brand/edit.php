<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加栏目</title>
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
                    <li><a href="{|U:'index'}">品牌列表</a></li>
                    <li><a href="javascript:;" class="action">编辑品牌</a></li>
                    
                </ul>
            </div>
         <form action="{|U:edit}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="bid" value="{$field.bid}"/>
            <table>
              <tr>
                <td class="w100">品牌名称</td>
                <td class="w200"><input type="text" name="bname" id="" value='{$field.bname}'/></td>
              </tr>
               <tr>
                <td class="w100">品牌LOGO</td>
                <td class="w200"> <img src="__ROOT__/{$field.logo}" alt=""  class="w150 h80" /> <input type="file" name="logo" id="" value='{$field.logo}'/></td>
              </tr>
              <tr><td><input type="submit" value="确定" class="btn1" /></td> </tr>
            </table>
             
        
      
       </form>
  </div>   <!-- warp -->
</body>
</html>