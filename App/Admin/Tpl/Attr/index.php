<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>属性列表</title>
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
      			<li><a href="javascript:;" class="action">属性列表</a></li>
      			<li><a href="{|U:'add',array('gt_id'=>$_GET['gt_id'])}">添加属性</a></li>
      		</ul>
      	</div>
      	<table class="table2">
      		<thead>
      		<tr>
      			<td class="w50">ac_id</td>
      			<td >属性名称</td>
      			<td class="w200">操作</td>
      		</tr>
      		</thead>
      		<list from="$attr" name="a">
      			<tr>
      		
      			<td >{$a.ac_id}</td>
      			<td >{$a.attr_name}</td>
      			<td >
      				
              
               <a href="{|U:'edit',array('ac_id'=>$a['ac_id'],gt_id=>$a['goods_type_gt_id'])}">编辑</a>|
               <a href="javascript:del({$a['ac_id']})">删除</a>
      			</td>
      		</tr>
            </list>
      	</table>
      </div>
</body>
</html>