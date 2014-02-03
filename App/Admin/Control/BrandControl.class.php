<?php
   class BrandControl extends AuthControl{
   	   // 数据模型对象
   	   private $db;
      
   	   //构造函数
   	   public  function __init(){
   	   	  //调用父类控制器
   	   	  parent::__init();
              $this->db = K("Brand");
             
   	   }
   	  public function index(){
       $brand=$this->db->all();
       $this->assign("brand",$brand);
       $this->display();   
    }

    //添加品牌
    public function add(){
       if(IS_POST){
       	 $upload=new Upload();
       	 $files=$upload->upload();
         if(!empty($files)){
         	$_POST['logo']=$files[0]['path'];
         }
         if($this->db->add()){
            $this->success("添加品牌成功！","index");
            }else{
            $this->error("添加品牌失败！");
            }
         }else{
           $this->display();
         }
      }

      //编辑品牌
    public function edit(){
       if(IS_POST){
         $upload=new Upload();
         $files=$upload->upload();
         if(!empty($files)){
          $_POST['logo']=$files[0]['path'];
         }
         if($this->db->where('bid'==$_POST['bid'])->save()){
            $this->success("修改成功！","index");
         }else{
            $this->error("修改失败！");
         }
       }else{
       
        
          $bid=Q("get.bid",NULL,"intval");
          $field=$this->db->find($bid);
          $this->assign("field",$field);
          $this->display();
       }
      
    }

  }
 ?>