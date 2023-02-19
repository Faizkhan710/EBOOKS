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

session_start();
$i = $_GET["n"];
if (in_array($i , $_SESSION["mycart"]) == true){
    $_SESSION["msg"] = "product already exist in cart";
} else {
    array_push($_SESSION["mycart"], $i);
    $_SESSION["msg"] = "product added to cart successfully";
}

header("location:alldata.php");

?>
</body>
</html>