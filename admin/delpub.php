<?php
require_once("../Connection.php");
$id = $_GET["id"];
$run = mysqli_query($con,"delete from publisher where Id = $id");
header("location:publisher.php");

?>