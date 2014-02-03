<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>属性列表</title>
    <script type='text/javascript' src='http://localhost/shop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/shop';
		WEB = 'http://localhost/shop/index.php';
		URL = 'http://localhost/shop/index.php/Admin/Attr/index/gt_id/5';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Attr';
		METH = 'http://localhost/shop/index.php/Admin/Attr/index';
		GROUP = 'http://localhost/shop/Shop';
		TPL = 'http://localhost/shop/Shop/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/shop/Shop/App/Admin/Tpl/Attr';
		STATIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/shop/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/shop/Shop/App/Admin/Tpl/Attr/css/css.css"/>
    <script type="text/javascript" src="http://localhost/shop/Shop/App/Admin/Tpl/Attr/js/js.js"></script>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
      	<div class="menu_list">
      		<ul>
      			<li><a href="javascript:;" class="action">属性列表</a></li>
      			<li><a href="<?php echo U('add',array('gt_id'=>$_GET['gt_id']));?>">添加属性</a></li>
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
      		<?php $hd["list"]["a"]["total"]=0;if(isset($attr) && !empty($attr)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($attr));
$hd["list"]["a"]["first"]=true;
$hd["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$hd["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($attr,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$hd["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$hd["list"]["a"]["last"]=true;endif;?>

      			<tr>
      		
      			<td ><?php echo $a['ac_id'];?></td>
      			<td ><?php echo $a['attr_name'];?></td>
      			<td >
      				
              
               <a href="<?php echo U('edit',array('ac_id'=>$a['ac_id'],gt_id=>$a['goods_type_gt_id']));?>">编辑</a>|
               <a href="javascript:del(<?php echo $a['ac_id'];?>)">删除</a>
      			</td>
      		</tr>
            <?php $hd["list"]["a"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
      	</table>
      </div>
</body>
</html>