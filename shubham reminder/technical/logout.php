
<?php
session_start();
include"connect.php";
session_destroy();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
header("Location:login.php");
?>
