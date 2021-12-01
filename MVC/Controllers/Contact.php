<?php
class Contact extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    
    public function SayHi(){
        
        //Model
        $BT=$this->BanTinModel;
        
        //View
        $this->view("home",[
            "page"=>"contact",
            "catogory"=>$BT->loaibantin()
            
        ]);
    }

    
}
?>