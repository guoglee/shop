
//添加主图JS
function add_pic(obj){
   var html=' <tr>\
              <th class="w100"></th>\
              <td><input type="file" name="content_pic[]" id=""  class="w200"/>\
              <a href="javascript:;" onclick="del_pic(this)">删除[-]</a></td>\
            </tr>';
  $(obj).parents("table").eq(0).append(html);
}
//添加商品的时候 删除主图上传的TR行
function del_pic(obj){
  
   $(obj).parents("tr").eq(0).remove();
}
//编辑时 删除主图缩略图片
function del_smallpic(obj){
  var pic_id=$(obj).siblings("img").eq(0).attr("pid");
  $.post(CONTROL+"&m=del_goods_pic&pic_id="+pic_id,function(stat){
    if(stat==1){
       $(obj).parent('li').remove();
    }else{
       alert("删除失败，请检测upload目录权限");
    };
  })

}
