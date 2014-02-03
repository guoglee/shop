<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>栏目列表</title>
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
      			<li><a href="javascript:;" class="action">商品类型</a></li>
      			<li><a href="{|U:'add'}">添加类型</a></li>
      		</ul>
      	</div>
      	<table class="table2">
      		<thead>
      		<tr>
      			<td class="w50">gt_id</td>
      			<td >类型名称</td>
      			<td class="w200">操作</td>
      		</tr>
      		</thead>
      		<list from="$type" name="c">
      			<tr>
      		
      			<td >{$c.gt_id}</td>
      			<td >{$c.gtname}</td>
      			<td >
      				
              <a href="{|U:'Attr/index',array('gt_id'=>$c['gt_id'])}">属性管理</a>|
               <a href="{|U:'edit',array('gt_id'=>$c['gt_id'])}">编辑</a>|
      				<a href="javascript:del({$c['gt_id']})">删除</a>
      			</td>
      		</tr>
            </list>
      	</table>
      </div>
</body>
</html>