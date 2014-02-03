  //表单验证
  $(function(){
     
    $("form").validation({
        attr_name:{
                    rule:{
                      required:true
                    },
                    error:{
                      required:"属性名不能为空"
                    }
       },
      
})
})


 
/**
* 1、如果点击文本框，显示一个文本框
* 2、点击下拉列表框或规格选择 “是” 显示多行文本框
* @return {undefined}
**/
function show_attr_value_input(type){
	
	switch(type){
		case 1:
		 $("#attr_value").show().find("input").removeAttr("disabled");
		 $("#mul_attr").hide().find("input").attr("disabled","disabled");
		break;
		case 2:
		$("#mul_attr").show().find("input").removeAttr("disabled");
		$("#attr_value").hide().find("input").attr("disabled","disabled");
		break;
	}
}
//添加属性
function  add_attr_value(obj){

   var html = ' <tr>\
                                        <td>\
                                            <input type="text"  name="attr_value[][attr_value]" id="at_value" class="w200"/>\
                                        </td>\
                                        <td>\
                                            <a href="javascript:;" onclick="del_attr_value(this)">删除</a>\
                                        </td>\
                                    </tr>';
    $("#mul_attr").append(html);
}
//删除属性
function del_attr_value(obj){
	$(obj).parents("tr").eq(0).remove();
}
//页面加载后，属性类型为文本框的radio
// $(function() {
//     $("[name=show_type]:checked").trigger("click");
// })
$(function(){
	$("[name=show_type]:checked").trigger("click");
})

$(function(){
  $("[name=is_spec]").click(function(){
    if($(this).val()==1){
      $("[name=show_type]").eq(1).trigger("click");
    }
  })
  $("[name=show_type]").click(function(){
     if($(this).val()==1){
       $("[name=is_spec]").eq(0).trigger("click");
     }
  })
})

function del(ac_id){

        $.ajax({
              
              url: CONTROL + "&m=del&ac_id="+ac_id,
              success: function(stat){
        		if(stat==1){
        			$.dialog({
        				msg: "删除成功",
        				type: "success",
        				close_handler:function(){
                        location.href=location.href;
        				 }
        			  })
        		}else{
                     $.dialog({
                    	msg: "删除失败",
                    	type: "error" 
                       })
                     }
        	  }
        }) 
}