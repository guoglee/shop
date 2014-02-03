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


 
