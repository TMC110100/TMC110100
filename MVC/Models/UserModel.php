<?php

class UserModel extends DB{
    public function CheckUserName($un)
    {
        $qr = "SELECT id FROM user WHERE username='$un'";
        $rows = mysqli_query($this->con,$qr);
        $kq = false;
        
        if(mysqli_num_rows($rows) > 0)
        {
            $kq =true ;
        }
        return $kq;
    }

    public function InsertNewUser($username,$password,$email,$hoten,$phone,$token)
    {   
        $qr = "INSERT INTO user values(null,'$username','$password','$email','$hoten','$phone',0,'$token',0)";
        
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
            
        }
        return json_encode($result); //Trả vê JSON
    }
    
    

    public function SendTokenVerify($username){
        $qr="SELECT token FROM user Where username='$username'";
        $row=mysqli_query($this->con,$qr);
        $rows=mysqli_fetch_array($row);
        $token=$rows["token"];
        return $token;
    }

    public function SendEmailVerify($username){
        $qr="SELECT email FROM user Where username='$username'";
        $row=mysqli_query($this->con,$qr);
        $rows=mysqli_fetch_array($row);
        $email=$rows["email"];
        return $email;
    }

    public function CheckUser($un)
    {
        $qr = "SELECT id FROM user WHERE username='$un'";
        $rows = mysqli_query($this->con,$qr);
        $kq = "Tên tài khoản hợp lệ";
        
        if(mysqli_num_rows($rows) > 0)
        {
            $kq ="Tài khoản này đã có người dùng!" ;
        }
        return $kq;
    }
    public function CheckLogin($un)
    {
        $qr = "SELECT * FROM user WHERE username='$un'";
        
        return mysqli_query($this->con, $qr) ;
         
    }

    public function CheckPermissionUser($un){
        $qr = "SELECT * FROM user where  username='$un' and permission=1 ";
        $row= mysqli_query($this->con, $qr);
        $result = false;
        if(mysqli_num_rows($row) == 1){
            $result = true;
        }
        return $result;
    }

    public function CheckStatus($un){
        $qr = "SELECT * FROM user where  username='$un' and status=1 ";
        $row= mysqli_query($this->con, $qr);
        $result = false;
        if(mysqli_num_rows($row) == 1){
            $result = true;
        }
        return $result;
    }

    public function CheckStatusUser($token){
        $qr = "SELECT * FROM user where token='$token' and status=0 ";
        $row= mysqli_query($this->con, $qr);
        $result = false;
        if(mysqli_num_rows($row) == 1){
            $qr = "UPDATE user SET status=1 WHERE token='$token' ";
            $row= mysqli_query($this->con, $qr);
            $result = true;
        }
        return $result;
    }


}

?>