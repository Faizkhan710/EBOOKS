<?php
require_once("../Connection.php");
$id = $_GET["id"];
$run = mysqli_query($con,"delete from category where Id = $id");
header("location:category.php");

?>