var  sp={
	 spec_attr:{},//记录当前栏目的规格与属性
   //修改商品时用的规格与属性
   edit_data:{},
   //编辑商品时的价格、库存、货号
   stock_price_sn_data:{},
   //当更改库存或价格时，修改商品表GOODS中的价格与库存
   updateTotalStock:function(){
   	 $("[stock=stock]").live("blur",function(){
   	 	 var total_Stock=0;
   	 	 $("[stock=stock]").each(function(){
   	 	 	 var s=$(this).val();
   	 	 	 if(s){
   	 	 	 	total_Stock+=parseInt(s);
   	 	 	 }
   	 	 	
   	 	 })
   	 	 
   	 	 $("[name=total_stock]").val(total_Stock);
   	 })
   },
    updatePriceStock:function(){
   	 $("[name*=price][sp]").live("blur",function(){
   	 	 var _price=[];
   	 	 $("[name*=price][sp]").each(function(){
   	 	 	 var s=$(this).val();
   	 	 	 if(s){
   	 	 	 	_price.push(parseInt(s));
   	 	 	 	return;
   	 	 	 }
   	 	 	
   	 	 })
   	 	  _price=_price.sort(function(a,b){return a-b>1});
   	 	 $("[name=price]").val(_price.shift());
   	 })
   }
};
 sp.updateTotalStock();
 sp.updatePriceStock();
//获得规格与属性
/**
  @param object obj 选择栏目的对象
  @param int cid  编辑商品时的商品栏目ID
**/
sp.getAttrSpec=function(obj,gid){
     
      
$.post(CONTROL + "&m=getSpecAttr", {cid:$(obj).val(), gid: gid}, function(data) {
     // 将规格属性压入对象sp.spec_attr储存
     sp.spec_attr=data;
     //创建属性表单
     sp.createAttrFrom();
     //创建商品规格
     sp.createSpecFrom();
     //如果是编辑商品，设置规格属性
     if(gid && data.edit_data.attr){
       sp.setAttr();
     	 sp.setSpec();
     }
    }, "json");
}
 //编辑商品时设置
 sp.setAttr=function(){
    var attr=sp.spec_attr.edit_data.attr;

    $(attr).each(function(i){
      // 表单对象
      //alert(attr[i].attr_value);
      var inputObj=$("[attr_value_av_id='"+attr[i].attr_value_av_id+"']");
      if(inputObj.attr('type')=='text'){
        inputObj.val(att[i].attr_value);
      }else{//如果是CHECKBOX
           inputObj.attr("checked","checked");
        }
    })
 }
//修改商品时产生原商品库存表单
sp.setSpec = function() {
    
    var spec = sp.spec_attr.edit_data.spec;
    var goods_list = {};
    for (var i in spec) {
        var sp_name = "sp_";
        for (var n in spec[i].attr) {
            sp_name += spec[i].attr[n].attr_value_av_id;
            //编辑商品的属性id
            var attr_value_av_id = spec[i].attr[n].attr_value_av_id;
            $("input[av_id='" + attr_value_av_id + "']").attr("checked", "checked");
        }
        //储存编辑商品的库存信息
        sp.stock_price_sn_data[sp_name] = spec[i];

   // $.post(CONTROL + "&m=pstock", { data: sp.stock_price_sn_data}, function(data) {},'json');
    }
    //创建库存表单

    sp.createStock();
}
//创建属性表单
sp.createAttrFrom=function(){
	//商品类型的属性
	var attr=sp.spec_attr.attr;
	if(!attr)return;
    
	var html="<h3>属性</h3>";
	for (var i=0; i<attr.length; i++) {
		
		//属性名称 如：适应人群
		html+="<dl><dt>"+attr[i].attr_name+"</dt>";
		html+="<dd>"; 
		var attr_value=attr[i].attr_value;
		$(attr_value).each(function(n){
            //属性值ID
            var attr_value_av_id=attr_value[n].av_id;
            //属性值
            var value=attr_value[n].attr_value;
            //配置NAME名
            var name="goods_attr["+attr_value_av_id+"]";
            //显示类型
            var show_type=attr[i].show_type;
            if(show_type==1){//文本框
               html+='<lable><input type="text" name="'+name+'" value="'+value+'" attr_value_av_id="'+attr_value_av_id+'"/></lable>'
            }else if(show_type==2){//复选框
                html+='<lable>'+value+'<input type="checkbox" name="'+name+'" value="'+value+'" attr_value_av_id="'+attr_value_av_id+'"/></lable>'
            }
            

		})
       html+="</dd></dl>";
	}
     
	$("div.attribute").empty().append(html);
}

//创建商品规格
sp.createSpecFrom=function(){
	//当前商品类型的规格
	var spec=sp.spec_attr.spec;
	if(!spec)return;
 	var html="<h3>规格</h3>";
	for(var i=0;i<spec.length;i++){
		html+="<dl class='spec_list'>";
		//规格的名称 如：颜色、尺码
		html+="<dt>"+spec[i].attr_name+"</dt>";
		html+="<dd><ul>";
		//规格的值 比如颜色有 红 绿 蓝
		var attr_value=spec[i].attr_value;
		$(attr_value).each(function(n){
			//属性类型ID
			var attr_class_ac_id=attr_value[n]['attr_class_ac_id'];
			//属性ID
			var av_id=attr_value[n]['av_id'];
			//属性值
			var value=attr_value[n]['attr_value'];
			html+='<li><lable><input type="checkbox" lab="spec" attr_class_ac_id="'+attr_class_ac_id+'" av_id="'+av_id+'"/>';
			html+='<span av_id="'+av_id+'">'+value+' </span>';
			html+="</lable></li>";

		})
        html+="</ul></dd></dl>";
	}
    $("div.spec").empty().append(html);
    //为checkbox添加事件，用于配置库存
    $("[lab='spec']").live("click",sp.createStock);

}
//点击规格时，产生库存表单
sp.createStock=function(){

     //如果有任意一个规格没有选中，不进行操作
     if(!sp.checkSpecIscheck()){
     	 $("div.spec_field").remove();
     	return;
     }else{
     	$("[name=total_stock]").attr("readonly","readonly").css("color","#999");
     	$("[name=price]").attr("readonly","readonly").css("color","#999");
     }
      
	//获得选中的规格 每个规格为一个数组 如：[{红，蓝}，{x ,l}]
	var spec_id=[];
	$("dl.spec_list input:checked").each(function(){
		var attr_class_ac_id=$(this).attr("attr_class_ac_id");
		if(!spec_id[attr_class_ac_id]){
			spec_id[attr_class_ac_id]=[];
		}
			
		spec_id[attr_class_ac_id].push($(this).attr("av_id"));
		})
		//根据笛卡尔运算产生库存属性
		var descarteData=descarte(spec_id);
		var specData={};
		for(var i=0;i<descarteData.length;i++){
            //得到库存NAME名
            var name=sp.getStockFieldName(descarteData[i]);
            specData[name]=descarteData[i];
		}
	//当点击规格时 移除掉不使用的规格，比如说：原来点击了绿色，现在绿色取消了，就要清除所以绿色的库存
	 sp.removeStockFrom(specData);
	//创建库存表单
	
	sp.createStockFrom(specData);
}
   //移除不使用的规格
    sp.removeStockFrom=function(specData){
    	//获得所有已经存在的库存表单
    	$("div.spec_field input[name*=price]").each(function(){
    		var sp=$(this).attr("sp");
    		if(!specData[sp]){
    			$(this).parents("tr").eq(0).remove();
    		}
    	})
    }
  //检测有没有规格没有选中的
  sp.checkSpecIscheck=function(){
  	 var stat=true;
  	 $("dl.spec_list").each(function(){
  	 	if($("input:checked",this).length==0){
  	 		stat=false;
           }
  	 })
       return stat;
  }
//获得库存表单NAME名
sp.getStockFieldName=function(attr){
   var name="sp_";
   for(var i=0; i<attr.length;i++){
   	  name+=attr[i];
   };
   return name;
}
// 创建库存表单
sp.createStockFrom=function(specData){
	 var html="";

	//创建表头
	if($("div.spec_field").length==0){
		html+="<div class='spec_field'>";
		html+="<dl><dt>库存</dt><dd>";
		html+="<table class='table2'>";
		html+="<thead><tr>";
		//为表头加上规格名 如：颜色 尺寸
		$("dl.spec_list dt").each(function(){
			html+="<td>"+$(this).text()+"</td>";
		})
		html+="<td>价格</td><td>库存</td><td>商品货号</td>";
		html+="</tr></thead>";
		html+="<tbody></tbody></table>";
		html+="</dd></dl>";

		$("div.spec").append(html);
	}
	//================产生货号、价格、库存列表=================
	 for(var i in specData){
	 	//库存表单已经存在时就不再添加了
        if($("div.spec_field input[sp='"+i+"']").length)continue;
	 	var name="stock["+i+"]";
	 	var html="<tr>";
	 	for(var n=0;n<specData[i].length;n++){
	 		//属性值ID
	 		var av_id=specData[i][n];
	 		var attr_value=$("dl.spec_list span[av_id='"+av_id+"']").text();
	 		html+="<td>";
	 		html+="<input type='hidden' name='"+name+"[av_id]["+av_id+"]' value='"+attr_value+"'/>";
	 		html+=attr_value+"</td>";
	 	}
	 	
	 	//顺序为：价格 库存数量 货号 库存ID
	 	var price_value=stock_value=goods_sn_value=stock_st_id="";
    if (sp.stock_price_sn_data[i]) {
            price_value = sp.stock_price_sn_data[i].price;
            goods_sn_value = sp.stock_price_sn_data[i].goods_sn;
            stock_value = sp.stock_price_sn_data[i].stock;
            stock_st_id = sp.stock_price_sn_data[i].st_id;
        }
        //库存ID
	 	html+="<td><input type='hidden' sp='"+i+"'name='"+name+"[st_id]' value='"+stock_st_id+"'/></td>";
	 	//价格
	 	html+="<td><input type='text' sp='"+i+"'name='"+name+"[price]' value='"+price_value+"'/></td>";
	 	//库存数量
	 	html+="<td><input type='text' stock='stock' sp='"+i+"'name='"+name+"[stock]' value='"+stock_value+"'/></td>";
	 	//商品货号
	 	html+="<td><input type='text' sp='"+i+"'name='"+name+"[goods_sn]' value='"+goods_sn_value+"'/></td>";
	 	html+="</tr>";
	 	$(".spec_field table tbody").append(html);
	 }

}