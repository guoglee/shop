<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改栏目</title>
    <script type='text/javascript' src='http://localhost/shop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
    <link href="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/hdui.js"></script><script src="http://localhost/shop/hdphp/hdphp/Extend/Org/hdui/js/lhgcalendar.min.js"></script>
    <script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/shop';
		WEB = 'http://localhost/shop/index.php';
		URL = 'http://localhost/shop/index.php/Admin/Config/edit_config';
		HDPHP = 'http://localhost/shop/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/shop/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/shop/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/shop/hdphp/hdphp/Extend';
		APP = 'http://localhost/shop/index.php/Admin';
		CONTROL = 'http://localhost/shop/index.php/Admin/Config';
		METH = 'http://localhost/shop/index.php/Admin/Config/edit_config';
		GROUP = 'http://localhost/shop/Shop';
		TPL = 'http://localhost/shop/Shop/App/Admin/Tpl';
		CONTROLTPL = 'http://localhost/shop/Shop/App/Admin/Tpl/Config';
		STATIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Static';
		PUBLIC = 'http://localhost/shop/Shop/App/Admin/Tpl/Public';
		COMMON = 'http://localhost/shop/Common';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/shop/Shop/App/Admin/Tpl/Config/css/css.css"/>
    <script type="text/javascript" src="http://localhost/shop/Shop/App/Admin/Tpl/Config/js/js.js"></script>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
         <form action="http://localhost/shop/index.php/Admin/Config/edit_config" method="post">
         <div class="tab">
             <ul class="tab_menu">
               <li lab="base"><a href="#">基本配置</a></li>
               <li lab="shop"><a href="#">商品配置</a></li>
             </ul>

              <div class="tab_content">
                  <div id="base">
                      <table class="table1">
                        <tr>
                          <th><?php echo $config[1]['title'];?></th>
                          <td>
                          <input type="text" name="<?php echo $config[1]['cid'];?>" class="w200" id="" value="<?php echo $config[1]['value'];?>" />
                          </td>
                        </tr>
                         <tr>
                          <th><?php echo $config[3]['title'];?></th>
                          <td>
                          <input type="text" name="<?php echo $config[3]['cid'];?>" class="w200" id="" value="<?php echo $config[3]['value'];?>" />
                          </td>
                        </tr>
                         <tr>
                          <th><?php echo $config[4]['title'];?></th>
                          <td>
                          <textarea class="w400 h100" name="<?php echo $config[4]['cid'];?>"><?php echo $config[4]['value'];?></textarea>
                          </td>
                        </tr>
                         <tr>
                          <th><?php echo $config[2]['title'];?></th>
                          <td>
                          <input type="text" name="<?php echo $config[2]['cid'];?>" class="w200" id="" value="<?php echo $config[2]['value'];?>" />
                          </td>
                        </tr>
                         <tr>
                          <th><?php echo $config[5]['title'];?></th>
                          <td>
                          <input type="text" name="<?php echo $config[5]['cid'];?>" class="w200" id="" value="<?php echo $config[5]['value'];?>" />
                          </td>
                        </tr>
                      </table>
                  </div>

                  <div id="shop">
                      <table class="table1">
                          <tr>
                          <th>首页图片尺寸</th>
                          <td>
                          	<label>宽<input type="text" name="<?php echo $config[6]['cid'];?>" class="w200" id="" value="<?php echo $config[6]['value'];?>" />px</label>
                            <label>高<input type="text" name="<?php echo $config[7]['cid'];?>" class="w200" id="" value="<?php echo $config[7]['value'];?>" />px</label>
                          </td>
                          </tr>
                          <tr>
                          <th>列表图片尺寸</th>
                          <td>
                          	<label>宽<input type="text" name="<?php echo $config[8]['cid'];?>" class="w200" id="" value="<?php echo $config[8]['value'];?>" />px</label>
                            <label>高<input type="text" name="<?php echo $config[9]['cid'];?>" class="w200" id="" value="<?php echo $config[9]['value'];?>" />px</label>
                          </td>
                          </tr>
                           <tr>
                          <th>详情页中图片尺寸</th>
                          <td>
                            <label>宽<input type="text" name="<?php echo $config[10]['cid'];?>" class="w200" id="" value="<?php echo $config[10]['value'];?>" />px</label>
                            <label>高<input type="text" name="<?php echo $config[11]['cid'];?>" class="w200" id="" value="<?php echo $config[11]['value'];?>" />px</label>
                          </td>
                          </tr>
                          <tr>
                          <th>详情页小图片尺寸</th>
                          <td>
                            <label>宽<input type="text" name="<?php echo $config[12]['cid'];?>" class="w200" id="" value="<?php echo $config[12]['value'];?>" />px</label>
                            <label>高<input type="text" name="<?php echo $config[13]['cid'];?>" class="w200" id="" value="<?php echo $config[13]['value'];?>" />px</label>
                          </td>
                          </tr>
                      </table>
                  </div>

            </div>   <!-- tab_content -->
       </div>  <!-- tab -->
       <input type="submit" value="确定" class="btn1" />
       </form>
  </div>   <!-- warp -->
</body>
</html>