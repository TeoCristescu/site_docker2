<?php
session_start();
session_destroy();
unset($_SESSION['u_id']);
unset($_SESSION['u_user']);
unset($_SESSION['u_name']);
unset($_SESSION['u_email']);
unset($_SESSION['u_pwd']);
unset($_SESSION['u_addr']);
unset($_SESSION['shopping_cart']);

header("location:proiect.php");

?>