<?php
class AdminModel extends Model {
      
    public $table = "admin";
    public $auto = array(
        array("username", "auto_username", 3, "method"),
    );

    //对用户名进行自动完成处理
    public function auto_username($v) {
        return htmlspecialchars(strip_tags($v));
    }

}
?>