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
    <base target="content"/>
</head>
<body>
      <div class="wrap">
      	<div class="menu_list">
      		<ul>
      			<li><a href="javascript:;" class="action">栏目列表</a></li>
      			<li><a href="{|U:'add'}">添加栏目</a></li>
            <li><a href="{|U:'update_cache'}">更新缓存</a></li>
      		</ul>
      	</div>
      	<table class="table2">
      		<thead>
      		<tr>
      			<td class="w50">CID</td>
      			<td >栏目名称</td>
      			<td class="w80">访问</td>
      			<td class="w200">操作</td>
      		</tr>
      		</thead>
      		<list from="$category" name="c">
      			<tr>
      		
      			<td >{$c.cid}</td>
      			<td >{$c.cname}</td>
      			<td ><a href="#">访问</a></td>
      			<td >
      				<a href="#">内容</a>
      				<a href="{|U:'add',array('pid'=>$c['cid'])}">增加子栏目</a>|
      				<a href="{|U:'edit',array('cid'=>$c['cid'])}">修改</a>|
      				<a href="{|U:'del',array('cid'=>$c['cid'])}">删除</a>
      			</td>
      		</tr>
            </list>
      	</table>
      </div>
</body>
</html>