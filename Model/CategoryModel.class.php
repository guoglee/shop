<?php
  //栏目分类模型
  class CategoryModel extends RelationModel{
  	 public $table="category";
      public $join=array(
           "brand_category"=>array(
             "type"=>HAS_MANY,
             "foreign_key"=>"cid",
             "parent_key"=>"cid"
            )
        );
      //获得树状栏目 
  	 public function get_tree_data(){
            $category=F("category",FALSE,CATEGORY_CACHE_PATH);
           if(!$category){
           	  $category=$this->update_cache();
           }

           return Data::tree($category,"cname","cid");
  	 }

      public function update_cache(){
      	   $category=$this->all();
      	   $data=array();
      	   if (!empty($category)){
	      	   	  foreach ($category as $k => $v) {
	      	   	  	if($v['cat_type']==1){
	      	   	  		$v['disabled']="disabled='disabled'";
	      	   	  	}else{
	      	   	  		 $v['disabled']="";
	      	   	  	}

      	   	  	     $data[$v['cid']]=$v;
      	   	       }
      	   	     
      	   }
            F("category",$data,CATEGORY_CACHE_PATH);
      }
        //魔术方法，执行添加之后自动更新缓存  
      function __after_add(){
      	$this->update_cache();
      }
     
       //魔术方法，执行修改之后自动更新缓存  
      function __after_update(){
        $this->update_cache();
      }

      //魔术方法，执行删除之后自动更新缓存  
      function __after_del(){
        $this->update_cache();
      }
  }
?>