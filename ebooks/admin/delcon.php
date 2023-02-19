<?php
require_once("../Connection.php");
$id = $_GET["id"];
$run = mysqli_query($con,"delete from contact where Id = $id");
header("location:contact.php");

?>