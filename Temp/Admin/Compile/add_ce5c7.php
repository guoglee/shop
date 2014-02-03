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
		URL = 'http://localhost/shop/index.php/Admin/Attr/add/gt_id/5';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Attr';
		METH = 'http://localhost/shop/index.php/Admin/Attr/add';
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
            <li><a href="<?php echo U('index');?>">属性列表</a></li>
            <li><a  href="javascript:;" class="action">添加属性</a></li>
          </ul>
        </div>
         <form action="<?php echo U(add);?>" method="post">
          <input type="hidden" name="goods_type_gt_id" value="<?php echo $_GET['gt_id'];?>"/>
          <table class="table1">
            <tr>
            <th class="w100">属性名称</th>
            <td><input type="text" name="attr_name"/></td>
            </tr>
             <tr>
            <th class="w100">显示类型</th>
            <td>
             <label >文本框 
              <input type="radio" name="show_type" class="w30" value="1" checked="checked" onclick="show_attr_value_input(1)"/>
            </label>
              <label >下拉框 <input type="radio" name="show_type" class="w30" value="2" onclick="show_attr_value_input(2)"/></label>
            </td>
            </tr>
             <tr>
            <th class="w100">是否为规格</th>
            <td>
              <label > 否<input type="radio" name="is_spec" class="w30" value="2" checked="checked"/></label>
              <label > 是<input type="radio" name="is_spec" class="w30" value="1" onclick="show_attr_value_input(2)"/></label>
              
            </td>
            </tr>
             <th class="w100">属性值</th>
            <td>
              <div>
                  <table width="99%" id="attr_value">
                    <tr>
                      <td><input type="text" name="attr_value[][attr_value]" id="" class="w200" /></td>
                    </tr>
                
                 </table>
                  <table id="mul_attr">
                    <tr>
                      <td><input type="text" name="attr_value[][attr_value]" id="at_value" class="w200" /></td>
                    
                    <td>
                      <a href="javascript:;" onclick="add_attr_value(this)">添加属性</a>
                    </td>
                </tr>
                 </table>
              </div>
            </td>
            </tr>
          </table>
        
       <input type="submit" value="确定" class="btn1" />
       </form>
  </div>   <!-- warp -->
</body>
</html>