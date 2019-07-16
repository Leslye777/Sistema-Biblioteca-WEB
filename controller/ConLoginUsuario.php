<?php 
	include 'Usuario.php';
	$user = new Usuario($_POST['login'],$_POST['senha']);
	$user->realizarLogin();

?>