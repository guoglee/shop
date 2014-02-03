    //表单验证
    $(function() {
    $("form").validation({
        username: {
            rule: {
                required: true
            },
            error: {
                required: "用户名不能为空"
            }
        },
           password: {
            rule: {
                required: true
            },
            error: {
                required: "密码不能为空"
            }
        },
          code: {
            rule: {
                required: true,
                ajax:CONTROL+"&m=check_code"
            },
            error: {
                required: "验证码不能为空",
                ajax:"验证码输入错误"
            }
            
        }
    })
})

  //修改验证码图片
function alter_code(){
  
   $("#code").attr("src",CONTROL+"&m=code&_"+Math.random())
}