<?php
class Ajax extends Controller{
    public $UserModel;

    public function __construct(){
        $this->UserModel = $this->model("UserModel");
    }

    public function CheckUser(){
        $un = $_POST["un"];
        echo  $this->UserModel->CheckUser($un);
    }

}

?>