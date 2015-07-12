<?php
session_start();
//logout
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['admin']);
unset($_SESSION['pwd']);
header("Location:../front/index.php");  



?>
