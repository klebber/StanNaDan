<?php 
require("init.php");
$_SESSION['status'] = false;
$_SESSION['id'] = -1;
$_SESSION['username'] = "";
$_SESSION['email'] = "";
$_SESSION['role'] = "";

header("Location:index.php");

?>