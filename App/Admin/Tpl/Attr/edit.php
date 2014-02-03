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
		  <form action="{|U:edit}" method="post">
		  	  <input type="hidden" name="ac_id" value="{$field.ac_id}"/>
          <input type="hidden" name="goods_type_gt_id" value="{$field.goods_type_gt_id}"/>
		  	   <table class="table1">
            <tr>
            <th class="w100">属性名称</th>
            <td><input type="text" name="attr_name"  value="{$field.attr_name}"/></td>
            </tr>
             <tr>
            <th class="w100">显示类型</th>
            <td>
             <label >文本框 
              <input type="radio" name="show_type" class="w30" value="1" <if value="$field.show_type==1"> checked='checked'</if> onclick="show_attr_value_input(1)"/>
            </label>
              <label >下拉框 <input type="radio" name="show_type"  value="2" class="w30" <if value="$field.show_type==2"> checked='checked'</if> onclick="show_attr_value_input(2)"/></label>
            </td>
            </tr>
             <tr>
            <th class="w100">是否为规格</th>
            <td>
              <label > 否<input type="radio" name="is_spec" class="w30" value="2" <if value="$field.is_spec==2"> checked='checked'</if> /></label>
              <label > 是<input type="radio" name="is_spec" class="w30" value="1" <if value="$field.is_spec==1"> checked='checked'</if> onclick="show_attr_value_input(2)"/></label>
              
            </td>
            </tr>
             <th class="w100">属性值</th>
            <td>
              <div>
              	<if value="$field.show_type== 1"  >
                  <table width="99%" id="attr_value">
                  	<list from="$attr_value" name="av" >
                    <tr>
                      <td><input type="text" name="attr_value[][attr_value]" id="" class="w200" value="{$av.attr_value}" /></td>
                    </tr>
                  </list>
                 </table>
             </if>
                  <if value="$field.show_type== 2" >
                  <table id="mul_attr">
                  	<list from="$attr_value" name="av">
                    <tr>
                      
                      <td>
                        <input type="hidden" name="attr_value[$av.av_id][av_id]" id="" class="w200" value="{$av.av_id}" />
                        <input type="text" name="attr_value[][attr_value]" id="" class="w200" value="{$av.attr_value}" /></td>
                       <td>
                        <a href="javascript:;" onclick="del_attr_value(this)">删除</a>
                      </td>
                    </list>
                    <td>

                      <a href="javascript:;" onclick="add_attr_value(this)">添加属性</a>
                    </td>
                    </tr>
                    <tr>
                     
                    </tr>
                  
                 </table>
             </if>
              </div>
            </td>
            </tr>
          </table>
        
       <input type="submit" value="确定" class="btn1" />
		  </form>
	</div>
</body>
</html>