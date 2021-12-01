<?php
class Admin extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    public function SayHi(){
        $LoaiBT=$this->BanTinModel->ShowLoaiBT();
        $un=$_SESSION["username"];
        $Permission=$this->UserModel->CheckPermissionUser($un);
        $this->view("Admin/home",[
            "page"=>"home",
            "LoaiBT"=>$LoaiBT,
            "Permission"=>$Permission
        ]);
    }

    

    public function XuLyUploads(){
        $kiemtra='';
        $target_dir = "./Public/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            if($_FILES["fileToUpload"]["name"]=="" || $_POST["tenBT"]=='' ||$_POST["motaBT"]=='' ){
                echo '<script language="javascript">';
                echo 'alert("Vui lòng điền đầy đủ thông tin và chọn file hình")';
                echo '</script>';
                 // Refresh lại page Admin
                 echo '<script language="Javascript">';
                 echo 'window.location="Admin"';
                 echo '</script>';
                return false;
                
            }

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $kiemtra="File is not an image.";
                $uploadOk = 0;
                
                
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $kiemtra= "Sorry, file already exists.";
                $uploadOk = 0;
               
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 1000000) {
                $kiemtra= "Sorry, your file is too large.";
                $uploadOk = 0;
                
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $kiemtra="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                
                
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $kiemtra=".$kiemtra. Sorry, your file was not uploaded.";
                echo '<script language="javascript">';
                echo 'alert("'.$kiemtra.'")';
                echo '</script>';
                // Refresh lại page Admin
                echo '<script language="Javascript">';
                echo 'window.location="./Admin"';
                echo '</script>';
                return false;
                
                
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
            }
            

            $tenBT=$_POST["tenBT"];
            $IDLoaiBT=$_POST["IDLoaiBT"];
            $mota=$_POST["motaBT"];
            $image=$_FILES["fileToUpload"]["name"];
            //Upload BT vao DB
            $qr=$this->BanTinModel->UploadBT($tenBT,$IDLoaiBT,$mota,$image);
            $LoaiBT=$this->BanTinModel->ShowLoaiBT();
            $this->view("admin/home",[
                "page"=>"home",
                "LoaiBT"=>$LoaiBT,
                "result"=>$qr
                

            ]);
        }
    }

    

    public function Logout(){
        unset($_SESSION["id"]);
        session_destroy();
        $this->view("Login",[
            "page"=>"home"
            ]);
    }


}

?>