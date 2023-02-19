<?php
require_once("../Connection.php");
$id = $_GET["id"];
$run = mysqli_query($con,"delete from subcategory where Id = $id");
header("location:subcategory.php");

?>