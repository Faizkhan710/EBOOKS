
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once("Header.php"); ?>
    <?php

    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = array();
    }
    unset($_SESSION["qty"]);

?>
    <?php if (isset($_SESSION["msg"])) {?>
        <div class="container">
    <div class="alert alert-primary" role="alert">
 <?php 
    
        echo $_SESSION["msg"];

        unset($_SESSION["msg"]);
    }
  
  ?>
</div></div>
    <div class="container">
        <div class="mt-4 row">
            <?php
            require_once("../Connection.php");
            $d = $_GET["id"];
              $d = "select * from book where AUTHOR_ID= $d";
              $go = mysqli_query($con, $d);
              $num = mysqli_num_rows($go);
              if ($num > 0) {
                  while ($d = mysqli_fetch_array($go)) {
                     echo  '<div class="col-md-4">
                          <div class="card">
                              <img src="'.$d[9].'" alt="Not Available" class="card-img-top">
                              <div class="card-body">
                                  <h5 class="card-title">'. $d[1].'</h5>
                                  <h5 class="card-text text-right">Rs '. $d[7].'</h5>
                                  <button class="btn btn-dark"><a href="addtocart.php?Id='. $d[0] .'" class="text-primary">Add to Cart</a></button>
                              </div>
                          </div>
                      </div>';
                  }
              } else {
              ?> 
                  <div class="alert alert-danger col-md-12" role="alert">
                      No Product Found
                  </div>
              <?php  
                
            }
            ?>
         
        </div>
    </div>

    <?php require_once("Footer.php"); ?>
</body>

</html>