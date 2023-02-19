<?php
require_once("../Connection.php");
$id = $_GET["id"];
$run = mysqli_query($con,"delete from author where Id = $id");
header("location:author.php");

?>