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
                    <li><a href="{|U:'index'}">商品类型</a></li>
                    <li><a href="javascript:;" class="action">编辑类型</a></li>
                    
                </ul>
            </div>
         <form action="{|U:edit}" method="post">
          <input type="hidden" name="gt_id" value="{$field.gt_id}"/>
            <table>
              <tr>
                <td class="w100">商品类型</td>
                <td class="w200"><input type="text" name="gtname" id="" value='{$field.gtname}'/></td>
              </tr>
              <tr><td><input type="submit" value="确定" class="btn1" /></td> </tr>
            </table>
             
        
      
       </form>
  </div>   <!-- warp -->
</body>
</html>