<?php
   class CategoryControl extends AuthControl{
   	   // 数据模型对象
   	   private $db;
       //栏目缓存
       private $category;
   	   //构造函数
   	   public  function __init(){
   	   	  //调用父类控制器
   	   	  parent::__init();
              $this->db = K("Category");
              $this->category =F("category",false,CATEGORY_CACHE_PATH);
   	   }
   	  public function index(){
       $category=$this->db->get_tree_data();
       $this->assign("category",$category);
       $this->display();   
    
    }
     //添加栏目
    public function add(){
       if(IS_POST){
         if($this->db->add()){
            $this->success("添加栏目成功！","index");
         }else{
            $this->error("添加栏目失败！");
         }
       }else{
            //获得商品类型
          $goods_type=$this->db->table("goods_type")->all();
          $this->assign("goods_type",$goods_type);
          $this->assign("brand",$this->db->table('brand')->all());
          $pid=Q("get.pid",NULL,"intval");
          $this->assign("category",$this->db->get_tree_data()); 
          $this->display();
       }
      
    }
     //编辑栏目
    public function edit(){
       if(IS_POST){
         if($this->db->save()){
            $this->success("修改成功！","index");
         }else{
            $this->error("修改失败！");
         }
       }else{

          $cid=Q("get.cid",NULL,"intval");
          $field=$this->db->find($cid);
          $this->assign("field",$field);
          $this->assign("brand",$this->db->table('brand')->all());
          $this->assign("category",$this->db->get_tree_data()); 
          $this->display();
       }
      
    }

    //删除栏目 
    public function del(){
       $cid=Q("get.cid",NULL,"intval");
       if($this->db->where(array("pid"=>$cid))->find()) {
          $this->error("请先删除子栏目");
         }else{
            if($this->db->del($cid)){
            $this->success("删除成功！","index");
            }else{
            $this->error("删除失败！");
            }

         }
          
    }
    //更新缓存
    public function update_cache(){
         $this->db->update_cache();
         $this->success("更新缓存","index");
    }
 }
?>  