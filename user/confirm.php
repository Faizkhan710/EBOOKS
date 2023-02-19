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
        require_once("Header.php");
        echo $_SESSION["us_id"];
    ?>
 <div class="container">
 <form action="" method="post">
    <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
            
    <label for="exampleInputEmail1">Customer Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=<?php echo $_SESSION["us_name"];?> name="name" readonly>
  </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Bill</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Rs <?php echo $_SESSION['total'];?>" name="emial" readonly>
  </div>
        </div>

</div>
  <button type="submit" class="btn btn-primary" name="btn">Confirm</button>
 </form>
 </div>
 <?php
    if (isset($_POST["btn"])) {
        $name = $_SESSION["us_id"];
        $em = $_POST["emial"];


        $q = "INSERT INTO `orders`(`CustomerId`, `Bill`) VALUES ('$name','$em')";
        mysqli_query($con,$q);
        echo "<script>
            alert('Your Order Has Been Placed');
            window.location.href='Home.php';
        </script>";

    }



?>
    <?php
        require_once("Footer.php");
    ?>
</body>
</html>