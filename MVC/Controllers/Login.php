<?php
class Login extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    public function SayHi(){
        //View
        $this->view("Login");
    }

    public function XuLyDangNhap()
    {   
        $result_mess=false;
        $LoaiBT=$this->BanTinModel->ShowLoaiBT();
        if(isset($_POST["btnLogin"])){
            $un=$_POST["username"];
            $ps=$_POST["password"];
            
            if(empty($_POST["username"])||empty($_POST["password"])){

                $this->view("login",[
                    "result"=>"$result_mess"
                ]);
            }
            $result= $this->UserModel->CheckLogin($un);
            $Permission=$this->UserModel->CheckPermissionUser($un);
            $checkStatus=$this->UserModel->CheckStatus($un);
            if($checkStatus==true){
                if(mysqli_num_rows($result)){
                    while($row=mysqli_fetch_array($result))
                    {
                        $id=$row["id"];
                        $username=$row["username"];
                        $password=$row["password"];
                    }
                    if(password_verify($ps,$password)){
                        
                        $_SESSION["id"]=$id;
                        $_SESSION["username"]=$username;
                        
                        $this->view("admin/home",[
                            "page"=>"home",
                            "LoaiBT"=>$LoaiBT,
                            "Permission"=>$Permission
                        ]);
                    }
                    else{
                        $this->view("login",[
                            "result"=>$result_mess
                        ]);
                    }
    
                }
                else{
                    $this->view("login",[
                        "result"=>$result_mess
                    ]);
                }
            }else{
                $token=$this->UserModel->SendTokenVerify($un);
                $email=$this->UserModel->SendEmailVerify($un);
                $this->view("Verify",[
                    "token"=>$token,
                    "email"=>$email,
                    "username"=>$un
                ]);
            }
            
            

        }
                
        
    }

    
    

}

?>