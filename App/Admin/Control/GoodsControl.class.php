<?php
 //商品管理
 class GoodsControl extends AuthControl{

 	protected $db;

 	public function __init(){
 		parent::__init();
 		$this->db = K("Goods");
 	}
     //显示属性列表
     public function index(){
       $goods = $this->db->order('gid desc')->all();
       $this->assign("goods",$goods);
       $cat=K('Category');
       $category=$cat->get_tree_data();
       $this->assign('category',$category);
       $this->display();
    }
     
     //添加商品
    public function add(){
         if(IS_POST){
           if($this->db->create()){
             // p($this->db->data);exit;
             $result=$this->db->add();
             $gid=$result['goods'];
             //修改商品库存
             $this->alterStock($_POST['category_cid'],$gid);
             //修改商品属性
             $this->alterGoodsAttr($_POST['category_cid'],$gid);
             $this->success("添加商品成功！","index");
           }else{
            $this->error("添加商品失败！");
         }
           
            
         }else{
            $cat=K('Category');
            $category=$cat->get_tree_data();
            $this->assign('category',$category);
            $this->display();
         }

    }
      //修改商品
    public function edit(){
          if(IS_POST){
             $gid=Q("post.gid");
             if($this->db->create()){
               $this->db->save();
               //修改商品库存
             $this->alterStock($_POST['category_cid'],$gid);
             //修改商品属性
             $this->alterGoodsAttr($_POST['category_cid'],$gid);
             $this->success("修改商品成功！","index");
           }else{
            $this->error("修改商品失败！");
           }
             
              
          }else{
             $gid=Q('get.gid',null,"intval");
             //查找所有内容页图片
             $pics=$this->db->table("goods_pic")->field("small")->all("goods_gid=$gid");
             //p($pics);exit;
             $this->assign("pics",$pics);
             $cat=K('Category');
             $category=$cat->get_tree_data();
             $this->assign('category',$category);
             $goods = $this->db->where("gid=$gid")->all();
             $this->assign("goods",$goods);
             $this->display();
           
          }
    }
       //修改商品属性
    private function alterGoodsAttr($cid,$gid){
            $goods_attr=Q('post.goods_attr');
            if(empty($goods_attr))return;
            $db=M("goods_attr");
            //先把商品旧的属性删除掉
            if($gid){
              $db->where("goods_gid=$gid")->del(); 
            }
             
            foreach ($goods_attr as $k=>$v) {
                  $data=array();
                     $data["attr_value"]=$v;
                     $data["category_cid"]=$cid;
                     $data["goods_gid"]=$gid;
                     $data["attr_value_av_id"]=$k;
                     //写入数据库
                     $db->add($data);
            }
             

    }
    //修改商品库存
    private function alterStock($cid,$gid){
           $stock=Q('post.stock');
           if(empty($stock))return;
           $db=M("stock");
           //过渡掉填写不完整的库存信息
           $stockData=array();
           foreach ($stock as $s) {
                 if(empty($s['price'])||empty($s['stock'])||empty($s['goods_sn']))continue;
                 $stockData[]=$s;
           }
          //先删除之前的库存属性
           if($gid){

            ($db->table("stock_attr")->del("goods_gid=$gid"));
           }
           foreach($stockData as $s){
                  $Data=array(
                   "st_id"=>$s['st_id'],
                   "goods_gid"=>$gid,
                   "price"=>$s['price'],
                   "stock"=>$s['stock'],
                   "goods_sn"=>$s['goods_sn']
                  );
               
                //写入库存表
              $st_id=$db->replace($Data);
              //向库存属性表写入数据
              foreach ($s['av_id'] as $av_id => $attr_value) {
                   //规格属性写入商品属性
                    $_POST["goods_attr"][$av_id]=$attr_value;
                    $data=array();
                    $data['category_cid']=$cid;
                    $data['goods_gid']=$gid;
                    $data['attr_value_av_id']=$av_id;
                    $data['stock_st_id']=$st_id;
                    $db->table("stock_attr")->add($data);

              }
           }
    }
    //获得商品的规格与属性

    public function getSpecAttr(){
        //栏目的CID
        $cid=Q("post.cid",NULL,"intval");
        $db=M("category");
        
        //获得当前栏目的商品类型ID
       $categoryDate=$db->field("goods_type_gt_id")->where("cid=$cid")->find();

        $gt_id=$categoryDate["goods_type_gt_id"];
        
        //获得商品属性与规格
        $db=K("Attr");
        $data=array();
        $data["attr"]=$db->where("is_spec=2")->where("goods_type_gt_id=".$gt_id)->all();
        $data["spec"]=$db->where("is_spec=1")->where("goods_type_gt_id=".$gt_id)->all();
        //修改商品时获得原属性数据
        $gid=Q("post.gid");
        if($gid){
          //获得商品的属性
          $data['edit_data']['attr']=$db->table('goods_attr')->where("goods_gid=$gid")->all();
          //获得商品的库存信息
          $db=M("stock");
          $stock=$db->all("goods_gid=$gid");
          if($stock){
             foreach ($stock as $n =>$s) {
                    $stock[$n]['attr']=$db->table('stock_attr')->where("stock_st_id={$s['st_id']}")->order("sa_id ASC")->all();
              }
            $data['edit_data']['spec']=$stock;
          }
        }
        
        $this->_ajax($data);
       /*==========================================================*/
       //  $cid=Q("cid",null,"intval");
       //  //查找栏目信息
       //  $cat=$this->db->table('category')->field("goods_type_gt_id")->find($cid);
       // //当前栏目所属ID
       //  $goods_type_gt_id=$cat['goods_type_gt_id'];
       //  $data["attr"]=$this->db->table("attr_class")->where("goods_type_gt_id=$goods_type_gt_id")->where("is_spec=2")->all();
       //  foreach ($data["attr"] as $n => $v) {
         
       //     $data['attr'][$n]['attr_value']=$this->getAttrValue($v['ac_id']);
       //  }
       //  $data["spec"]=$this->db->table("attr_class")->where("goods_type_gt_id=$goods_type_gt_id")->where("is_spec=1")->all();
       //  //$data['attr_value']=$this->db->table("attr_value")->where("attr_class_ac_id= $data['attr']['ac_id']")->where("is_spec=1")->all();
       //  foreach ($data["spec"] as $n => $v){
         
       //     $data['spec'][$n]['attr_spec']=$this->getAttrSpec($v['ac_id']);
       //  }
        
       // $this->_ajax($data);

    }
        
    //获得属性值
    private function getAttrValue($ac_id){
         return $this->db->table("attr_value")->where("attr_class_ac_id=".$ac_id)->all();
        
    }

    //获得规格
    private function getAttrSpec($ac_id){
         return $this->db->table("attr_value")->where("attr_class_ac_id=".$ac_id)->all();
        
    }

    // public  function pstock(){
    //      $data=Q("post.data");
    //      p($data);
    // }
    //异步删除商品内容页主图图片
    public function del_goods_pic (){
        $pic_id=Q('get.pic_id',NULL,"intval");
         $pic=$this->db->table('goods_pic')->find($pic_id);
         //删除硬盘上的图片
         if($pic){
             @unlink($pic['big']);
             @unlink($pic['medium']);
             @unlink($pic['small']);
         }
         //删除goods_pic表数据
        if($pic_id){
           if($this->db->table('goods_pic')->del($pic_id)){
              $this->_ajax(1);
           }  
        }
    }
  }
?>