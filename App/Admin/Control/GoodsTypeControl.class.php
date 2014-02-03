<?php
   class GoodsTypeControl extends AuthControl{
   	   // 数据模型对象
   	   private $db;
      
   	   //构造函数
   	   public  function __init(){
   	   	  //调用父类控制器
   	   	  parent::__init();
              $this->db = K("GoodsType");
             
   	   }
   	  public function index(){
       $type=$this->db->all();
       $this->assign("type",$type);
       $this->display();   
    
    }
     //添加栏目
    public function add(){
       if(IS_POST){
          if($this->db->add()){
            $this->success("添加类型成功！","index");
         }else{
            $this->error("添加类型失败！");
         }
         }else{
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
       
        
          $gt_id=Q("get.gt_id",NULL,"intval");
          $field=$this->db->find($gt_id);
          $this->assign("field",$field);
          $this->display();
       }
      
    }

    //删除栏目 
    public function del(){
       $gt_id=Q("get.gt_id",NULL,"intval");
      if($this->db->del($gt_id)){
            $this->_ajax(1);
            }
      }
 }
?>  