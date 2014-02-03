//通过异步传输删除类型
function del(gt_id){
	$.ajax({
		url: CONTROL + "&m=del&gt_id="+gt_id,
		success: function(stat){
			if(stat == 1){
				$.dialog({
					msg:"删除成功！",
					type:"success",
					close_handler: function() {
                        location.href = location.href;
                    }
                  })
			}else{
				$.dialog({
					msg:"删除失败！",
					type:"error",
					
                  })
			}
		}
	})
}