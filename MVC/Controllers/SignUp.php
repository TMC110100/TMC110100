<?php
class SignUp extends Controller{
    public $UserModel;


    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        
    }

    public function SayHi(){
        //View
        $this->view("signup");
    }

    // Create key random
    public function Verify($un){
        $key=md5($un).strftime(time());
        return $key;
    }

    public function XuLyDangKy(){
        //1. GET data tu khach hang
        $result_mess=false;
        if(isset($_POST["btnRegister"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $email = $_POST["email"];
            $hoten = $_POST["hoten"];
            $phone = $_POST["phone"];
            $token=$this->Verify($username);
            if(empty($_POST["username"])){
                    $this->view("signup",[
                        "result"=>$result_mess
                    ]);
                    return false;
            }else{
                $check=$this->UserModel->CheckUserName($username);
                if($check==true){
                $mes="Tai khoan nay da tồn tại!!!";
                $this->view("signup",[
                    "results"=>$mes
                ]);
                return false;
                }

            }

            //2. INSERT INTO vao DB
            $kq = $this->UserModel->InsertNewUser($username,$password,$email,$hoten,$phone,$token);
            
            //3. Thong bao True/False
            $this->view("Verify",[
                "username"=>$username,
                "email"=>$email,
                "token"=>$token
            ]);
            
            
        }

    }
    

    

}

?>