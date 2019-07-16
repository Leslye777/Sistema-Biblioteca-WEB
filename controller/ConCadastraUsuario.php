<?php 
	include 'Usuario.php';
	$user = new Usuario($_POST['cpf'],$_POST['senha'], $_POST['nome'],$_POST['telefone'],$_POST['endereco'], $_POST['sexo']);
	$user->cadastrarUsuario();
	//header("Location: ../View/painel.php?pg=adicionar_usuarios");

 ?>