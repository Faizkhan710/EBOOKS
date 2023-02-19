
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
    ?>
 <div class="container">
 <form action="" method="post">
    <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION["us_name"] ;?>" readonly name="name">
  </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION["us_email"] ;?>" readonly name="emial">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
        </div>
    </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Purpose</label>
    <select name="purpose" id="exampleInputEmail1" class="form-control">
        <option value="">Select Purpose of Contact</option>
        <option value="Appreciation">Appreciation</option>
        <option value="Complain">Complain</option>
        <option value="Suggestion">Suggestion</option>
    </select>
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <textarea name="msg" id="exampleInputPassword1" class="form-control"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary" name="btn">Contact</button>
 </form>
 </div>
 <?php
    if (isset($_POST["btn"])) {
        $name = $_POST["name"];
        $em = $_POST["emial"];
        $pur = $_POST["purpose"];
        $msg = $_POST["msg"];

        $q = "INSERT INTO `contact`(`Name`, `Purpose`, `Email`, `Message`) 
        VALUES ('$name','$pur','$em','$msg')";
        mysqli_query($con,$q);
        echo "<script>
            alert('Thank you For Contact us');
        </script>";

    }



?>
    <?php
        require_once("Footer.php");
    ?>

   
</body>
</html>