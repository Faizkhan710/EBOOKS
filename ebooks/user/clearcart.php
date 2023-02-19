<?php
session_start();
unset($_SESSION["mycart"]);
$_SESSION["msg"] = "your cart has been cleared";
header("location:alldata.php");

?>