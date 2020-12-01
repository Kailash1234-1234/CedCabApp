<?php
session_start();
unset($_SESSION['user_name']);
unset($_SESSION["name"]);
session_destroy();
header("Location:home.php");
?>