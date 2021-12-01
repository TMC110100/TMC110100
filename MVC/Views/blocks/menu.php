
<?php
    while($row=mysqli_fetch_array($data["catogory"])){?>
    
        <b><a class="nav-link text-dark " style="display:inline" href="home/detail?id=<?php echo $row["id"] ?>"><?php echo $row["tenloai"] ?></a></b>

    <?php
    }
    
?>
