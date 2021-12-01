
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <base href="http://localhost/website/">
    <link href="./Public/css/style.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="./public/bootstrap/css/bootstrap.min.css" type="text/css">
</head>
<body>
    <?php
        if(isset($data["Permission"])){
            if($data["Permission"]==true){
                ?>
                <a href="">Admin</a>
                <?php
            }
        }
    ?>
    <div><a href="Admin">Home</a></div>

    <?php
        if(isset($_SESSION["id"])){
            ?>
                <a href="Admin/Logout">Logout</a>
            <?php
        }
        else{
            header("location:login");
        }
            
    ?>

    <div class="container ">
        <form class="border" action="./Admin/XuLyUploads" method="POST" enctype="multipart/form-data">
            <table class="table">  
                <tr>
                    <th style="text-align: center" colspan="2"><h3>Thêm mới bản tin:</h3></th>
                </tr>
                <tr>
                    <td>Tên bản tin:</td>
                    <td><input type="text" name="tenBT"></td>
                </tr>
                <tr>
                    <td>Chọn loại bản tin:</td>
                    <td>
                        <select name="IDLoaiBT" >
                            <?php
                                while($row=mysqli_fetch_array($data["LoaiBT"])){?>
                                    <option value="<?php echo $row['id']?>" ><?php echo $row["tenloai"]?></option>
                                <?php }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mô tả bản tin:</td>
                    <td><textarea type="text" name="motaBT"></textarea></td>
                </tr>
                <tr>
                    <td>File hình:</td>
                    <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                </tr>
                <tr>
                    <td style="text-align: center" colspan="2"><input type="submit" value="Upload" name="submit"></td>
                </tr>
            </table>
            <?php
              if(isset($data["result"])) { ?>
            <h3><?php
              if($data["result"]==true){
                echo '<script language="javascript">';
                echo 'alert("Thêm bản tin mới thành công")';
                echo '</script>';

                 // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="./Admin/Home"';
                echo '</script>';
              }
              else
              {
                echo '<script language="javascript">';
                echo 'alert("Thêm thất bại")';
                echo '</script>';

                 // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="./Admin/Home"';
                echo '</script>';
              }
            ?></h3>
            <?php } ?> 
            
            
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>