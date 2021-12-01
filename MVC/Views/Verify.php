<base href="http://localhost/website/">
<?php

include "./PHPMailer/src/PHPMailer.php";
include "./PHPMailer/src/Exception.php";
include "./PHPMailer/src/OAuth.php";
include "./PHPMailer/src/POP3.php";
include "./PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    $email=$data["email"];//$_POST["email"];
    $token=$data["token"];//$_POST["token"];
    $username=$data["username"];
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tranminhcuong1101@gmail.com';                 // SMTP username
        $mail->Password = 'gyjrfutztrropuca';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('tranminhcuong1101@gmail.com', 'Cuong Minh');
        $mail->addAddress($email);               // Name is optional
        // $mail->addCC('cuongtm.it@gmail.com');
        //$mail->addReplyTo('tmc110100@gmail.com', 'Information');
        
        
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Mail xác nhận tài khoản";//$title;
        $mail->Body    ="Link xac nhận tài khoản <a href='localhost/website/verification?token=$token&un=$username'>tmc</a>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        if($mail->send()){
            echo ' Đã send email xác nhận tài khoản tời email: '.$email.' ';
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Thank You </div>
    <a href="./Home">Home</a>
</body>
</html>