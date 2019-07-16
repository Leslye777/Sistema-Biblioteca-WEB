<?php 
	include 'Locatario.php';
	$locatario = new Locatario($_POST['matricula'],$_POST['tipo'], $_POST['nome'],$_POST['telefone'],$_POST['endereco'], $_POST['sexo']);
	$locatario->cadastrarLocatario();

 ?>