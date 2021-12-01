<?php
class Home extends Controller{
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
            "page"=>"home",
            "catogory"=>$BT->loaibantin()
            
        ]);
    }
    public function detail(){
        //Model
        $tin=$this->BanTinModel;
        $BT=$this->BanTinModel;

        //View
        $this->view("home",[
            "page"=>"detail",
            "catogory"=>$BT->loaibantin(),
            "tin"=>$tin->bantin()
        ]);
    }

}

?>