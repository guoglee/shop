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
		URL = 'http://localhost/shop/index.php/Admin/Category/add';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Category';
		METH = 'http://localhost/shop/index.php/Admin/Category/add';
		GROUP = 'http://localhost/shop/Shop';
		TPL = 'http://localhost/shop/Shop/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/shop/Shop/App/Admin/Tpl/Category';
		STATIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/shop/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/shop/Shop/App/Admin/Tpl/Category/css/css.css"/>
    <script type="text/javascript" src="http://localhost/shop/Shop/App/Admin/Tpl/Category/js/js.js"></script>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
        <div class="menu_list">
          <ul>
           <li><a href="<?php echo U('index');?>">栏目列表</a></li>
           <li><a href="javascript:;" class="action">添加栏目</a></li>
          </ul>
        </div>
         <form action="<?php echo U(add);?>" method="post">
          <?php if($_GET['pid']){?>
             <input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>"/>
          <?php }?>
         <div class="tab">
             <ul class="tab_menu">
               <li lab="base"><a href="#">基本配置</a></li>
               <li lab="ext"><a href="#">扩展配置</a></li>
               <li lab="brand"><a href="#">品牌</a></li>
             </ul>

              <div class="tab_content">
                  <div id="base">
                      <table class="table1">
                        <tr>
                          <th>栏目名称</th>
                          <td>
                          <input type="text" name="cname" class="w200" id="" />
                          </td>
                        </tr>
                         <tr>
                                 <th>商品类型</th>
                                 <td>
                                   <select name="goods_type_gt_id" id="">
                                   <?php $hd["list"]["n"]["total"]=0;if(isset($goods_type) && !empty($goods_type)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($goods_type));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($goods_type,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

                                      <option value="<?php echo $n['gt_id'];?>"><?php echo $n['gtname'];?></option>
                                    <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                   </select>
                                 </td>
                        </tr> 
                        <?php if(!$_GET['pid']){?>
                         <tr>
                                 <th>上级栏目</th>
                                 <td>
                                   <select name="pid" id="">
                                      <option value="0">一级栏目</option>
                                      <?php $hd["list"]["n"]["total"]=0;if(isset($category) && !empty($category)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($category));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($category,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

                                      <option value="<?php echo $n['cid'];?>"><?php echo $n['cname'];?></option>
                                    <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                   </select>
                                 </td>
                        </tr> 
                        <?php }?>
                         <tr>
                            <th>栏目类型</th>
                            <td>
                             <label><input type="radio" name="cat_type" class="w100" value="1" />封面栏目</label>
                             <label><input type="radio" name="cat_type" class="w100" value="2" checked="checked"/>普通栏目</label>
                            </td>
                        </tr>
                         <tr>
                            <th>单位</th>
                            <td>
                            <input type="text" name="unit" class="w80" value="个" />
                            </td>
                        </tr>
                        <tr>
                            <th>价格区间</th>
                            <td>
                            <input type="text" name="price_range" class="w80" value="0" />
                            </td>
                        </tr>      
                      </table>
                  </div>

                  <div id="ext">
                      <table class="table1">
                          <tr>
                            <th>关键字</th>
                            <td>
                            <input type="text" name="keywords" class="w200" id="" />
                            </td>
                          </tr>
                           <tr>
                            <th>描述</th>
                            <td>
                              <textarea name="descript" class="w400 h100" style="resize:none;" ></textarea>
                             
                            </td>
                          </tr>
                      </table>
                  </div>
                  <div id="brand">
                     <ul>
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

                       <li>
                          <a href="#">
                          <label><img src="http://localhost/shop/<?php echo $b['logo'];?>" alt="" />
                           <input type="checkbox" name="brand_category[][bid]" value="<?php echo $b['bid'];?>"/>
                          </label></a>
                       </li>
                     <?php $hd["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                     </ul>
                  </div>
            </div>   <!-- tab_content -->
       </div>  <!-- tab -->
       <input type="submit" value="确定" class="btn1" />
       </form>
  </div>   <!-- warp -->
</body>
</html>