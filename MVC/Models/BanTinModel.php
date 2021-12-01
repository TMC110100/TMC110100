<?php
class BanTinModel extends DB{
    public function GetSV(){
        return "Nguyen Van Tao";
    }
    public function Tong($m,$n){
        return $m+$n;
    }
    public function user(){
        $qr = "SELECT * FROM user";
        return mysqli_query($this->con,$qr);
    }
    public function loaibantin(){
        $qr= "SELECT * FROM loaibantin";
        return mysqli_query($this->con,$qr);;
        
    }
    public function AllBantin(){
        $qr="SELECT * FROM bantin";
        return mysqli_query($this->con,$qr);
    }

    public function bantin(){
        if(isset($_GET["id"])){
            $myid=intval($_GET['id']);
        }
        $qr="SELECT * FROM bantin WHERE id_loaibantin=$myid";
        return mysqli_query($this->con,$qr);
    }
    
    // Upload bản tin
    public function UploadBT($tenBT,$IDLoaiBT,$motaBT,$image){
        $qr ="INSERT INTO bantin values(null,'$tenBT','$IDLoaiBT',1,'$motaBT','$image')";
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
        }
        return json_encode($result); //Trả vê JSON

    }

    // Show Loai Ban tin
    public function ShowLoaiBT(){
        $qr = "SELECT * FROM loaibantin";
        return mysqli_query($this->con,$qr);
    }

}
?>