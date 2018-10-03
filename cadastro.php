<?php
include ("includes/header.php");

if(isset($logado)){
	include("view/cadastro.php");
}else{
	include("view/login.php");
}
?>

