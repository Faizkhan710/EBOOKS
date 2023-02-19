<?php
    session_start();
    unset($_SESSION["cart"]);
    $_SESSION['msg'] = 'Cart cleared successfully';
    header("location:allproducts.php");
?>