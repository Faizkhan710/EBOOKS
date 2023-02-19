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
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <input type="text" class="col-md-9 form-control" name="dd" placeholder="Enter Product"/>
                <div class="col-md-1"></div>
                <button class="btn btn-primary col-md-2" name="btn">Search</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="mt-4 row">
            <?php
            require_once("../Connection.php");
            $c = $_GET["Id"];

            if (isset($_POST["btn"])) {
              $DD = $_POST["dd"];
              $d = "select * from book where SUBCATEGORY_ID = '$c' and Name like '%". $DD ."%'";
              $go = mysqli_query($con, $d);
              $num = mysqli_num_rows($go);
              if ($num > 0) {
                  while ($d = mysqli_fetch_array($go)) {
                     echo  '<div class="col-md-4">
                          <div class="card">
                              <img src="'.$d[9].'" alt="Not Available" class="card-img-top">
                              <div class="card-body">
                                  <h2 class="card-title">'. $d[1].'</h2>
                                  <h5 class="card-text">Rs '. $d[7].'</h5>
                                  <button class="btn btn-primary">Order</button>
                              </div>
                          </div>
                      </div>';
                  }
              } else {
              ?> 
                  <div class="alert alert-danger col-md-12" role="alert">
                      No Product Found
                  </div>
              <?php  }
  
  
              
          
          
            } else {
                $d = "select * from book where SUBCATEGORY_ID = '$c'";
                $go = mysqli_query($con, $d);
                $num = mysqli_num_rows($go);
                if ($num > 0) {
                    while ($d = mysqli_fetch_array($go)) {
                       echo  '<div class="col-md-4">
                            <div class="card">
                                <img src="'.$d[9].'" alt="Not Available" class="card-img-top">
                                <div class="card-body">
                                    <h2 class="card-title">'. $d[1].'</h2>
                                    <h5 class="card-text">Rs '. $d[7].'</h5>
                                    <button class="btn btn-primary">Order</button>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                ?> 
                    <div class="alert alert-danger col-md-12" role="alert">
                        No Product Found
                    </div>
                <?php  }
    
    
                
            }
            ?>
         
        </div>
    </div>

    <?php require_once("Footer.php"); ?>
</body>

</html>