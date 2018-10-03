<?php
include ("includes/header.php");

if(isset($logado)){
	include("view/home.php");
}else{
	include("view/editar.php");
}
?>

