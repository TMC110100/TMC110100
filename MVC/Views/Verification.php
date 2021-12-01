<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang xac nhan tk</title>
</head>
<body>
    <?php
    if(isset($data["result"])){
        if($data["result"]==true){
            echo "Xac nhan tai khoan thanh cong"; 
            echo "<a href='login'>Quay lai Login Page</a>";
            
        }else{
            echo "Tai khoan nay da duoc xac nhan roi!!";
            echo "<a href='login'>Quay lai Login Page</a>";
            
        }
    }
    ?>
</body>
</html>