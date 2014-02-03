$(function(){
	$("form").validation({
		 cname:{
		 	rule:{
		 		required:true
		 	},
		 	error:{
                  required:"栏目名不能为空"
		 	},
		 	message:"可以输入中文"
		 }
	})

	$("#brand li").click(function(){
		$(this).next('input').attr("checked","checked");
	})
})

