<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>商品管理</title>
    <jquery/>
    <hdui/>
    <jsconst/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
      	<div class="menu_list">
      		<ul>
      			<li><a href="javascript:;" class="action">商品列表</a></li>
      			<li><a href="{|U:'add'}">添加商品</a></li>
      		</ul>
      	</div>
      	<table class="table2">
      		<thead>
      		<tr>
      			<td class="w50">GID</td>
      			<td >商品名称</td>
            <td >所属栏目</td>
            <td >价格</td>
            <td >库存</td>
      			<td class="w80">访问</td>
      			<td class="w200">操作</td>
      		</tr>
      		</thead>
      		<list from="$goods" name="g">
      			<tr>
      		
      			<td >{$g.gid}</td>
      			<td >{$g.gname}</td>
           <td >
             {$g.cname}
            </td>
            <td >{$g.price}</td>
            
            <td >{$g.total_stock}</td>
      			<td ><a href="#">访问</a></td>
      			<td >
      				
      				<a href="{|U:'edit',array('gid'=>$g['gid'])}">修改</a>|
      				<a href="{|U:'del',array('gid'=>$g['gid'])}">删除</a>
      			</td>
      		</tr>
            </list>
      	</table>
      </div>
</body>
</html>