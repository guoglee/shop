<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加商品</title>
    <jquery/>
    <hdui/>
    <jsconst/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <js file="__CONTROL_TPL__/js/spec.js"/>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
        <div class="menu_list">
          <ul>
            <li><a href="{|U:'index'}" >商品列表</a></li>
            <li><a href="javascript:;" class="action">添加商品</a></li>
          </ul>
        </div>
         <form action="{|U:add}" method="post" enctype="multipart/form-data">
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
              <td><input type="text" name="gname" id=""  class="w200"/></td>
            </tr>
            <tr>
              <th class="w100">属性</th>
              <td>
                <label class="w50"><input type="checkbox" name="flag[]" id="" value="推荐"/> 推荐</label>
                <label class="w50"><input type="checkbox" name="flag[]" id="" value="置顶"/> 置顶</label>
              </td>
            </tr>
            <tr>
              <th class="w100">货号</th>
              <td><input type="text" name="goods_sn" id=""  class="w200"/></td>
            </tr>
            <tr>
              <th class="w100">价格</th>
              <td><input type="text" name="price" id=""  class="w200"/></td>
            </tr>
            <tr>
              <th class="w100">库存</th>
              <td><input type="text" name="total_stock" id=""  class="w200"/></td>
            </tr>
              <tr>
                <th>栏目名称</th>
                <td>
                  <select name="category_cid" id="" onchange="sp.getAttrSpec(this)">
                     <option value="0">===请选择栏目===</option>
                    <list from="$category" name="n" >

                       <option value="{$n.cid}" {$n.disabled}>{$n.cname}</option>
                    </list>
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
              <td><input type="file" name="pic" id=""  class="w200"/></td>
             </tr>
             
           
            <tr>
               <th class="w100">商品描述</th>
               <td><textarea name="description" id=""  class="w400 h100"/></textarea></td>
            </tr>
            <tr>
               <th class="w100">售后服务</th>
               <td><textarea name="service" id=""  class="w400 h100"/></textarea></td>
            </tr>
             <tr>
               <th class="w100">点击次数</th>
               <td><input type="text" name="click" id=""  class="w200"/></td>
            </tr>
            <tr>
               <th class="w100">发表时间</th>
               <td><input type="text" name="addtime" id="addtime" value="{|date:'Y/m/d G:i:s'}" class="w200"/></td>
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
              <td><ueditor  name="body" id=""  class="w400 h100"/></td>
            </tr>
          </table>
          </div>
           <div id="arc_pic">
            <table class="table1">
            <tr>
              <th class="w100">主图管理</th>
              <td><input type="file" name="content_pic[]" id=""  class="w200"/><a href="javascript:;" onclick="add_pic(this)">添加[+]</a></td>
            </tr>
          </table>
          </div>
       <input type="submit" value="确定" class="btn1" />
     </div>
       </form>
  </div>   <!-- warp -->
</body>
</html>