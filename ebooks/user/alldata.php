<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once("header.php");
    ?>


    <?php
    if(!isset($_SESSION["mycart"])){
        $_SESSION["mycart"] = array();
    }

    unset($_SESSION["quant"]);
    
    ?>

    <div class="container">
    <?php  if (isset($_SESSION["msg"])){?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">

    <?php echo $_SESSION["msg"] ?>

    <button type="button" class="class" data-dismiss="alert" ariel-label="close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>

    <?php  unset($_SESSION["msg"]);
    } ?>
    </div>





<div class="container">
    <div class="row">
    <?php
    $query = "select * from book";
    $run =  mysqli_query($con,$query);
    $check = mysqli_num_rows($run);
    if ($check > 0) {
     while($x = mysqli_fetch_array($run)){?>
    <div class="col-md-4">
    <div class="card">
         <img src="<?php echo $x[10] ?>" alt="image not available" class="card-img-top">
         <div class="card-body">
         <b><p class="card-title text-uppercase"><?php echo $x[1] ?></p></b>
         
         <p class="card-text text-danger">RS.<?php echo $x[8] ?></p>
         <a href="addtocart.php?n=<?php echo $x[8]; ?>"><button class= "btn btn-primary">add to cart</button></a>
         </div>
    </div>
</div>
    <?php }}
    else {
        echo "<option value='0'>Nothing to Show</option>";
    }

    require_once("footer.php");
?>
</div>
     </div>
</body>
</html>