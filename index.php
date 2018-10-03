<?php
$page = "Login!";
include ("includes/header.php");

if(isset($logado)){
	include("view/home.php");
}else{
	include("view/login.php");
}
?>

