<?php
 //商品属性
 class AttrControl extends AuthControl{

 	protected $db;

 	public function __init(){
 		parent::__init();
 		$this->db = K("Attr");
 	}
     //显示属性列表
     public function index(){

       $gt_id=Q("gt_id",null,"intval");
       $attr = $this->db->where("goods_type_gt_id=$gt_id")->all();
       $this->assign("attr",$attr);
       $this->display();
    }

  
      //属性添加
    public function add(){
    	if(IS_POST){
          
          if($this->db->add()){
            $gt_id=$_POST['goods_type_gt_id'];
            $this->success("添加属性成功","index?gt_id=$gt_id");
          }else{
             $this->error("添加属性失败","index");
          }
    	}else{
    		$this->display();
    	}
    }
 

  // 删除属性
public function del(){
         $ac_id=Q("get.ac_id",null,"intval");
         if($this->db->del($ac_id)){
                $this->_ajax(1);
              }
         }
       
        //属性编辑
  public function edit(){
    if(IS_POST){
       
       
         if($this->db->save()){
          $gt_id=$_POST['goods_type_gt_id'];
          $this->success("修改成功！","index?gt_id=$gt_id");
          }else{
            $this->error("修改失败！");
         }

       }else{

          $ac_id=Q("get.ac_id",NULL,"intval");
          $field=$this->db->find($ac_id);
          $this->assign("field",$field);
           
          $this->assign("attr_value",$field["attr_value"]);
         
          $this->display();
       }
  }


  }
?>