<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加栏目</title>
    <jquery/>
    <hdui/>
    <jsconst/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <base target="content"/>
</head>
<body>
      <div class="wrap">
        <div class="menu_list">
          <ul>
           <li><a href="{|U:'index'}">栏目列表</a></li>
           <li><a href="javascript:;" class="action">添加栏目</a></li>
          </ul>
        </div>
         <form action="{|U:add}" method="post">
          <if value="$hd.get.pid">
             <input type="hidden" name="pid" value="{$hd.get.pid}"/>
          </if>
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
                                   <list from="$goods_type" name="n" >
                                      <option value="{$n.gt_id}">{$n.gtname}</option>
                                    </list>
                                   </select>
                                 </td>
                        </tr> 
                        <if value="!$hd.get.pid">
                         <tr>
                                 <th>上级栏目</th>
                                 <td>
                                   <select name="pid" id="">
                                      <option value="0">一级栏目</option>
                                      <list from="$category" name="n" >
                                      <option value="{$n.cid}">{$n.cname}</option>
                                    </list>
                                   </select>
                                 </td>
                        </tr> 
                        </if>
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
                      <list from="$brand" name="b">
                       <li>
                          <a href="#">
                          <label><img src="__ROOT__/{$b.logo}" alt="" />
                           <input type="checkbox" name="brand_category[][bid]" value="{$b.bid}"/>
                          </label></a>
                       </li>
                     </list>
                     </ul>
                  </div>
            </div>   <!-- tab_content -->
       </div>  <!-- tab -->
       <input type="submit" value="确定" class="btn1" />
       </form>
  </div>   <!-- warp -->
</body>
</html>