<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加栏目</title>
    <script type='text/javascript' src='http://localhost/shop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/shop';
		WEB = 'http://localhost/shop/index.php';
		URL = 'http://localhost/shop/index.php/Admin/Attr/edit/ac_id/30/gt_id/5';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Attr';
		METH = 'http://localhost/shop/index.php/Admin/Attr/edit';
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
		  <form action="<?php echo U(edit);?>" method="post">
		  	  <input type="hidden" name="ac_id" value="<?php echo $field['ac_id'];?>"/>
          <input type="hidden" name="goods_type_gt_id" value="<?php echo $field['goods_type_gt_id'];?>"/>
		  	   <table class="table1">
            <tr>
            <th class="w100">属性名称</th>
            <td><input type="text" name="attr_name"  value="<?php echo $field['attr_name'];?>"/></td>
            </tr>
             <tr>
            <th class="w100">显示类型</th>
            <td>
             <label >文本框 
              <input type="radio" name="show_type" class="w30" value="1" <?php if($field['show_type']==1){?> checked='checked'<?php }?> onclick="show_attr_value_input(1)"/>
            </label>
              <label >下拉框 <input type="radio" name="show_type"  value="2" class="w30" <?php if($field['show_type']==2){?> checked='checked'<?php }?> onclick="show_attr_value_input(2)"/></label>
            </td>
            </tr>
             <tr>
            <th class="w100">是否为规格</th>
            <td>
              <label > 否<input type="radio" name="is_spec" class="w30" value="2" <?php if($field['is_spec']==2){?> checked='checked'<?php }?> /></label>
              <label > 是<input type="radio" name="is_spec" class="w30" value="1" <?php if($field['is_spec']==1){?> checked='checked'<?php }?> onclick="show_attr_value_input(2)"/></label>
              
            </td>
            </tr>
             <th class="w100">属性值</th>
            <td>
              <div>
              	<?php if($field['show_type']== 1){?>
                  <table width="99%" id="attr_value">
                  	<?php $hd["list"]["av"]["total"]=0;if(isset($attr_value) && !empty($attr_value)):$_id_av=0;$_index_av=0;$lastav=min(1000,count($attr_value));
$hd["list"]["av"]["first"]=true;
$hd["list"]["av"]["last"]=false;
$_total_av=ceil($lastav/1);$hd["list"]["av"]["total"]=$_total_av;
$_data_av = array_slice($attr_value,0,$lastav);
if(count($_data_av)==0):echo "";
else:
foreach($_data_av as $key=>$av):
if(($_id_av)%1==0):$_id_av++;else:$_id_av++;continue;endif;
$hd["list"]["av"]["index"]=++$_index_av;
if($_index_av>=$_total_av):$hd["list"]["av"]["last"]=true;endif;?>

                    <tr>
                      <td><input type="text" name="attr_value[][attr_value]" id="" class="w200" value="<?php echo $av['attr_value'];?>" /></td>
                    </tr>
                  <?php $hd["list"]["av"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                 </table>
             <?php }?>
                  <?php if($field['show_type']== 2){?>
                  <table id="mul_attr">
                  	<?php $hd["list"]["av"]["total"]=0;if(isset($attr_value) && !empty($attr_value)):$_id_av=0;$_index_av=0;$lastav=min(1000,count($attr_value));
$hd["list"]["av"]["first"]=true;
$hd["list"]["av"]["last"]=false;
$_total_av=ceil($lastav/1);$hd["list"]["av"]["total"]=$_total_av;
$_data_av = array_slice($attr_value,0,$lastav);
if(count($_data_av)==0):echo "";
else:
foreach($_data_av as $key=>$av):
if(($_id_av)%1==0):$_id_av++;else:$_id_av++;continue;endif;
$hd["list"]["av"]["index"]=++$_index_av;
if($_index_av>=$_total_av):$hd["list"]["av"]["last"]=true;endif;?>

                    <tr>
                      
                      <td>
                        <input type="hidden" name="attr_value[$av.av_id][av_id]" id="" class="w200" value="<?php echo $av['av_id'];?>" />
                        <input type="text" name="attr_value[][attr_value]" id="" class="w200" value="<?php echo $av['attr_value'];?>" /></td>
                       <td>
                        <a href="javascript:;" onclick="del_attr_value(this)">删除</a>
                      </td>
                    <?php $hd["list"]["av"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    <td>

                      <a href="javascript:;" onclick="add_attr_value(this)">添加属性</a>
                    </td>
                    </tr>
                    <tr>
                     
                    </tr>
                  
                 </table>
             <?php }?>
              </div>
            </td>
            </tr>
          </table>
        
       <input type="submit" value="确定" class="btn1" />
		  </form>
	</div>
</body>
</html>