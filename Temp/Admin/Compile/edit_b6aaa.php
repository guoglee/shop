<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改商品</title>
    <script type='text/javascript' src='http://localhost/shop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/shop';
		WEB = 'http://localhost/shop/index.php';
		URL = 'http://localhost/shop/index.php/Admin/Goods/edit/gid/2';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Goods';
		METH = 'http://localhost/shop/index.php/Admin/Goods/edit';
		GROUP = 'http://localhost/shop/Shop';
		TPL = 'http://localhost/shop/Shop/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/shop/Shop/App/Admin/Tpl/Goods';
		STATIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/shop/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/shop/Shop/App/Admin/Tpl/Goods/css/css.css"/>
    <script type="text/javascript" src="http://localhost/shop/Shop/App/Admin/Tpl/Goods/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/shop/Shop/App/Admin/Tpl/Goods/js/spec.js"></script>
    <script type="text/javascript">
       $(function(){
         $("[name=category_cid]").trigger("change");
       })
    </script>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
        <div class="menu_list">
          <ul>
            <li><a href="<?php echo U('index');?>" >商品列表</a></li>
            <li><a href="javascript:;" class="action">编辑商品</a></li>
          </ul>
        </div>
         <form action="<?php echo U(edit);?>" method="post" enctype="multipart/form-data">
          <?php $hd["list"]["g"]["total"]=0;if(isset($goods) && !empty($goods)):$_id_g=0;$_index_g=0;$lastg=min(1000,count($goods));
$hd["list"]["g"]["first"]=true;
$hd["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$hd["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($goods,0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$hd["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$hd["list"]["g"]["last"]=true;endif;?>

          <input type="hidden" name="gid" value="<?php echo $g['gid'];?>" />
        <div class="tab">
                    <ul class="tab_menu">
                        <li lab="base"><a href="#">基本配置</a></li>
                        <li lab="ext"><a href="#">详情描述</a></li>
                        <li lab="brand"><a href="#">品牌</a></li>
                        <li lab="arc_pic"><a href="#">主图设置</a></li>
                    </ul>
      <div class="tab_content">
           <div id="base">
          <table class="table2">
             
            <tr>
              <th class="w100">商品名称</th>
              <td><input type="text" name="gname" id=""  class="w200" value="<?php echo $g['gname'];?>"/></td>
            </tr>
             <tr>
              <th class="w100">属性</th>
              <td>
                <label class="w50"><input type="checkbox" name="flag[]" id="" value="推荐" <?php if(strstr($g['flag'],'推荐')){?>checked='chceked'<?php }?>/> 推荐</label>
                <label class="w50"><input type="checkbox" name="flag[]" id="" value="置顶" <?php if(strstr($g['flag'],'置顶')){?>checked='chceked'<?php }?>/> 置顶</label>
              </td>
            </tr>
            <tr>
              <th class="w100">货号</th>
              <td><input type="text" name="goods_sn" id="" value="<?php echo $g['goods_sn'];?>" class="w200"/></td>
            </tr>
            <tr>
              <th class="w100">价格</th>
              <td><input type="text" name="price" id=""  class="w200"  value="<?php echo $g['price'];?>"/></td>
            </tr>
            <tr>
              <th class="w100">库存</th>
              <td><input type="text" name="total_stock" id=""  class="w200" value="<?php echo $g['total_stock'];?>"/></td>
            </tr>
              <tr>
                <th>栏目名称</th>
                <td>
                  <select name="category_cid" id="" onchange="sp.getAttrSpec(this,<?php echo $g['gid'];?>)">
                     <option value="0">===请选择栏目===</option>
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


                       <option value="<?php echo $n['cid'];?>" <?php echo $n['disabled'];?> <?php if($g['category_cid']==$n['cid']){?>selected='selected'<?php }?>><?php echo $n['cname'];?></option>
                    <?php $hd["list"]["g"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                 </select>
                </td>
              </tr>
              <tr>
            </table>
                 <div class="attribute" border="1px solid red">
                   
                 </div>
                 <div class="spec">
                   
                 </div>
                <table class="table2">
              <th class="w100">商品图片</th>
              <td>
                <input type="file" name="pic" id=""  class="w200"  value="<?php echo $g['pic'];?>"/>
                <img src="http://localhost/shop/<?php echo $g['pic'];?>" alt="" class="w100 h100"/>
              </td>
             </tr>
            
           
            <tr>
               <th class="w100">商品描述</th>
               <td><textarea name="description" id="" value="<?php echo $g['description'];?>" class="w400 h100"/></textarea></td>
            </tr>
            <tr>
               <th class="w100">售后服务</th>
               <td><textarea name="service" id="" value="<?php echo $g['service'];?>" class="w400 h100"/></textarea></td>
            </tr>
             <tr>
               <th class="w100">点击次数</th>
               <td><input type="text" name="click" id="" value="<?php echo $g['click'];?>" class="w200"/></td>
            </tr>
            <tr>
               <th class="w100">发表时间</th>
               <td><input type="text" name="addtime" id="addtime" value="<?php echo date('Y/m/d G:i:s');?>" class="w200"/></td>
            </tr>
              <script type="text/javascript">
               $("#addtime").calendar({format:"yyyy/MM/dd HH:mm:ss"});
              </script>
              </table>
            </div>
            <div id="ext">
            <table class="table1">
            <tr>
              <th class="w100">商品正文</th>
              <td><script type="text/javascript" charset="utf-8" src="http://localhost/shop/hdphp/hdphp/Extend/Org/Editor/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://localhost/shop/hdphp/hdphp/Extend/Org/Editor/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://localhost/shop/hdphp/hdphp/Extend/Org/Editor/Ueditor/"</script><script id="hd_body" name="body" type="text/plain"></script>
    <script type='text/javascript'>
    $(function(){
            var ue = UE.getEditor('hd_body',{
            imageUrl:'http://localhost/shop/index.php/Admin/Goods&m=ueditor_upload&water=1&uploadsize=2000000&maximagewidth=false&maximageheight=false'//处理上传脚本
            ,zIndex : 0
            ,autoClearinitialContent:false
            ,initialFrameWidth:"100%" //宽度1000
            ,initialFrameHeight:"300" //宽度1000
            ,autoHeightEnabled:false //是否自动长高,默认true
            ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
            ,maximumWords:2000 //允许的最大字符数
            ,readonly : false //编辑器初始化结束后,编辑区域是否是只读的，默认是false
            ,wordCount:true //是否开启字数统计
            
        });
    })
    </script></td>
            </tr>
          </table>
          </div>
           <div id="arc_pic">
             <div class="pics">
               <ul>
                 <?php $hd["list"]["p"]["total"]=0;if(isset($pics) && !empty($pics)):$_id_p=0;$_index_p=0;$lastp=min(1000,count($pics));
$hd["list"]["p"]["first"]=true;
$hd["list"]["p"]["last"]=false;
$_total_p=ceil($lastp/1);$hd["list"]["p"]["total"]=$_total_p;
$_data_p = array_slice($pics,0,$lastp);
if(count($_data_p)==0):echo "";
else:
foreach($_data_p as $key=>$p):
if(($_id_p)%1==0):$_id_p++;else:$_id_p++;continue;endif;
$hd["list"]["p"]["index"]=++$_index_p;
if($_index_p>=$_total_p):$hd["list"]["p"]["last"]=true;endif;?>

                 <li><img src="http://localhost/shop/<?php echo $p['small'];?>" alt="" pid="<?php echo $p['pic_id'];?>"/> <span  onclick="del_smallpic(this)"><a href="javascript:;">X</a> </span> </li>
               <?php $hd["list"]["p"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
               </ul>
             </div>
            <table class="table1">
            <tr>
              <th class="w100">主图管理</th>
              <td><input type="file" name="content_pic[]" id=""  class="w200"/><a href="javascript:;" onclick="add_pic(this)">添加[+]</a></td>
            </tr>
          </table>
          </div>
           <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
       <input type="submit" value="确定" class="btn1" />
     </div>
       </form>
  </div>   <!-- warp -->
</body>
</html>