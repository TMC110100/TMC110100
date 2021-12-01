<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blur login</title>
   <base href="http://localhost/website/">
   <link href="./public/css/stylelogin.css" rel="stylesheet" type="text/css" >
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;600&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
   
</head>
<body >
   <div class="overlay" ></div>
   <div class=" login-container">
      <div>
         <div class="logo">
            <i class="fas fa-hat-wizard"></i>
            <span>TMC Blog</span>
         </div>
         <div class="register">
            <div>Have an account!</div>
            <p>Register to access all the features of our services. Manage your business in one place. It's free</p>
            <div class="social">
               <a data-toggle="tooltip" title="Facebook" href=""><i class="fab fa-facebook-f"></i></a>
               <a data-toggle="tooltip" title="Google" href=""><i class="fab fa-google"></i></a>
               <a data-toggle="tooltip" title="Pinterest" href=""><i class="fab fa-pinterest-p"></i></a>
               <a data-toggle="tooltip" title="Github" href=""><i class="fab fa-github"></i></a>
            </div>
         </div>
      </div>

      <div class="form-login">
         <form action="./Login/XuLyDangNhap" method="POST" class="form" id="form-2">
            <h3 class="heading" style="text-align:center">Login</h3>      
            <div class="spacer"><?php
              if(isset($data["result"])){
                  if($data["result"]==true)
                  {
                     
                  }
                  else{?>
                      <h5><?php
                        echo "Dang nhap that bai";
                      ?></h5>

                    <?php
                  }
              }
            ?></div>
            
            <div class="form-group">
              <label for="username" class="form-label">UserName</label>
              <input id="username" name="username" type="text" placeholder="VD: Trần Minh Cường" class="form-control">
              <span class="form-message"></span>
            </div>
      
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input id="password" name="password" type="password" placeholder="Enter password" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group f-term">
               <input id="agree" name="agree" type="checkbox" class="form-control">
               <label for="agree" class="form-label">I agree to the all statements in <a href="">Terms of service</a></label>               
               <span class="form-message"></span>
             </div>
      
            <div class="sign-up">
               <div>
                  <button class="form-submit" name="btnLogin">Login</button>
                  <i class="fas fa-chevron-right"></i>
               </div>
               <div style="float:left">
               <a href="signup">Chưa có tài khoản?</a>
               <div style="height: 15px"></div>
               <a href="home">Trang chủ</a>
              </div>
               
            </div>
           
          </form>
      </div>
   </div>


   <script src="./public/js/style.js"></script>

</body>
</html>