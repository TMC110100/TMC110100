<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost/website/">
    <link href="./Public/css/style.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="./public/bootstrap/css/bootstrap.min.css" type="text/css">
    
</head>
<body>
<!-- Header -->
    <div class="container ">
        <?php  require_once "./mvc/views/blocks/header.php" ?>
    </div>
<!-- Category -->
    <div class="container">
        <div class="border col-12">
            <?php  require_once "./mvc/views/blocks/menu.php" ?>
        </div>
    </div>
<!-- Main -->
    <div class="container pt-3 ">
        
        <div class="left col-sm-12 col-md-12 col-lg-2">
            <p>Left Menu</p>  
            <?php  require_once "./mvc/views/blocks/menu.php" ?>
                
           
             
        </div>

        <div class="main col-sm-12 col-md-12 col-lg-8">
            <p>Main Content</p>
            <?php require_once "./mvc/views/pages/".$data["page"].".php" ?>
            
        </div>
            
        <div class="right col-sm-12 col-md-12 col-lg-2">
            <p>Right Content</p>
            
        </div>
    </div>

<!-- Footer -->
    <div class="container">
        <div class="footer col-sm-12 col-md-12 col-lg-12  ">
            <?php  require_once "./mvc/views/blocks/footer.php" ?>
        
        </div>
    </div>

<!-- Script -->
    <script src="./public/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./public/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>