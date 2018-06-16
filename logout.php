<?php
session_start();
$_SESSION['is_logged_in'] = "logout";
// session_destroy();

// unset($_SESSION['is_logged_in']);
// echo $_SESSION['is_logged_in'];
header("Location:index.php");
 exit(0);