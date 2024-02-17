<?php


setcookie('Email', NULL , time() - 3600,'/');
setcookie('Id', NULL , time() - 3600,'/');
setcookie("Name", NULL, time() - 3600,'/');
header("Location: ./LogIn/logIn.php");

?>