<?php



//Attr属性操作模型
class AttrModel extends RelationModel {

    public $table = "attr_class";
    public $join = array(
        "attr_value" => array(
            "type" => HAS_MANY,
            "foreign_key" => "attr_class_ac_id",
            "parent_key" => "ac_id"
        )
    );

}
?>

