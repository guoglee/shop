<?php
class GoodsModel extends RelationModel {

    public $table = "goods";
    // public $join = array(
    //     "attr_value" => array(
    //         "type" => HAS_MANY,
    //         "foreign_key" => "attr_class_ac_id",
    //         "parent_key" => "ac_id"
    //     )
    // );
      public $join = array(
        "category" => array(
            "type" => BELONGS_TO,
            "foreign_key" => "category_cid",
            "parent_key" => "cid"
        )
    );
    public $auto=array(
            array("addtime","_addtime",3,3,"method"),
            array("flag","_flag",3,3,"method")
    );
    //addtime表单自动完成
    public function _addtime($v){
        return empty($v)?time():strtotime($v);
    }

    //flag 表单自动完成
    public function _flag($v){
         return empty($v)?$v:implode(",", $v);
    }
    //添加与修改商品时，对商品首页和列表页的处理
    public function edit_goods_pic(){
          $gid=Q('post.gid');
          if(!($_FILES['pic']['name'])==""){
            $field=M("goods")->field("pic,index_pic,list_pic")->find($gid);
            is_file($field['pic'])and unlink($field['pic']);
            is_file($field['index_pic'])and unlink($field['index_pic']);
            is_file($field['list_pic'])and unlink($field['list_pic']);
          }
        //图片处理
             $upload= new Upload();
             $file=$upload->upload('pic');
             if(!empty($file)){
                $pic=pathinfo($file[0]['path']);
                $img=new Image();
                $index_pic=$pic['dirname'].'/'.$pic['filename']."index.".$pic["extension"];
                $list_pic=$pic['dirname'].'/'.$pic['filename']."list.".$pic["extension"];
                $img->thumb($file[0]['path'],$index_pic,C("index_pic_width"),C("index_pic_height"));
                $img->thumb($file[0]['path'],$list_pic,C("list_pic_width"),C("list_pic_height"));
                $this->data['pic']=$file[0]['path'];
                $this->data['index_pic']=$index_pic;
                $this->data['list_pic']=$list_pic;

             }
      }
     //修改内容页主图图片
     public function edit_content_pic(){
            $gid=Q('post.gid')?Q('post.gid'):$this->result['goods'];
            $upload= new Upload();
            $file=$upload->upload("content_pic");
             if(!empty($file)){
                 $img=new Image();
                 $db=M("goods_pic");
                foreach ($file as $f) {
                //中图
                $info=pathinfo($f['path']);
                // p($info);exit;
                $medium=$info['dirname'].'/'.$info['filename'].'medium.'.$info['extension'];
                $img->thumb($f['path'],$medium,C("medium_width"),C("medium_height"));
                //小图
               
                $small=$info['dirname'].'/'.$info['filename'].'small.'.$info['extension'];
                $img->thumb($f['path'],$small,C("small_width"),C("small_height"));
                $db->add(array(
                    "big"=>$f['path'],
                    "medium"=>$medium,
                    "small"=>$small,
                    "goods_gid"=>$gid
                ));
             }

             }
     }
     //修改编辑器上传的图片（即当前商品在upload表中的图片）
     public function edit_goods_xiangqing_pic(){
           p($_SESSION['upload']);exit;
           $gid=Q('post.gid')?Q('post.gid'):$this->result['goods'];
           if(isset($_SESSION['upload']) && is_array($_SESSION['upload'])){
              $db=M("upload");
              foreach ($_SESSION['upload'] as $id) {
                 $db->save(array("id"=>$id,"gid"=>$gid));
              }
           }

     }
    public function __before_add(){
        unset($_SESSION['upload']);
        $this->edit_goods_pic();
    }

    public function __before_update(){
        unset($_SESSION['upload']);
        $this->edit_goods_pic();
    }

    public function __after_add(){
        $this->edit_content_pic();
        $this->edit_goods_xiangqing_pic();
    }

     public function __after_update(){
        $this->edit_content_pic();
        $this->edit_goods_xiangqing_pic();
    }
}
?>