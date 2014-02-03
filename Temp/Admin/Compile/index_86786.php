<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>品牌列表</title>
    <script type='text/javascript' src='http://localhost/shop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/shop';
		WEB = 'http://localhost/shop/index.php';
		URL = 'http://localhost/shop/index.php/Admin/Brand/index';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Brand';
		METH = 'http://localhost/shop/index.php/Admin/Brand/index';
		GROUP = 'http://localhost/shop/Shop';
		TPL = 'http://localhost/shop/Shop/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/shop/Shop/App/Admin/Tpl/Brand';
		STATIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/shop/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/shop/Shop/App/Admin/Tpl/Brand/css/css.css"/>
    <script type="text/javascript" src="http://localhost/shop/Shop/App/Admin/Tpl/Brand/js/js.js"></script>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
      	<div class="menu_list">
      		<ul>
      			<li><a href="javascript:;" class="action">品牌列表</a></li>
      			<li><a href="<?php echo U('add');?>">添加品牌</a></li>
      		</ul>
      	</div>
      	<table class="table2">
      		<thead>
      		<tr>
      			<td class="w50">bid</td>
      			<td >品牌名称</td>
      			<td class="w200">操作</td>
      		</tr>
      		</thead>
      		<?php $hd["list"]["b"]["total"]=0;if(isset($brand) && !empty($brand)):$_id_b=0;$_index_b=0;$lastb=min(1000,count($brand));
$hd["list"]["b"]["first"]=true;
$hd["list"]["b"]["last"]=false;
$_total_b=ceil($lastb/1);$hd["list"]["b"]["total"]=$_total_b;
$_data_b = array_slice($brand,0,$lastb);
if(count($_data_b)==0):echo "";
else:
foreach($_data_b as $key=>$b):
if(($_id_b)%1==0):$_id_b++;else:$_id_b++;continue;endif;
$hd["list"]["b"]["index"]=++$_index_b;
if($_index_b>=$_total_b):$hd["list"]["b"]["last"]=true;endif;?>

      			<tr>
      		
      			<td ><?php echo $b['bid'];?></td>
      			<td ><?php echo $b['bname'];?></td>
      			<td >
      				
             
               <a href="<?php echo U('edit',array('bid'=>$b['bid']));?>">编辑</a>|
      				<a href="javascript:del(<?php echo $b['bid'];?>)">删除</a>
      			</td>
      		</tr>
            <?php $hd["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
      	</table>
      </div>
</body>
</html>