<?php   
    while($row=mysqli_fetch_array($data["tin"])){?>
        
            <div class="nameBT col-sm-12 col-md-12 col-lg-12 border-top"  style="display:block"><?php echo $row["tenbantin"] ?></div>  
            <div class="imageBT col-sm-12 col-md-12 col-lg-5"><img style="width:200px ;height:220px"  src="./Public/images/<?php echo $row["image"] ?>" alt=""></div>
            <div class="motaBT col-sm-12 col-md-12 col-lg-7"><?php echo $row["mota"] ?></div>
            
    <?php
    }
            
?> 