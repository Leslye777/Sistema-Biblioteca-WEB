<?php 
	include '../model/funcoes_bd.php';
	include 'Usuario.php';

  	$user = new Usuario($_POST['cpf'], NULL, $_POST['nome'], $_POST['telefone'],$_POST['endereco'], $_POST['sexo'], $_POST['id']);
  	$user->alterarUsuario();
  	echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=alterar_usuarios&id=".$user->getId()."'/>
  	<script type='text/javascript'> alert('Cadastro alterado com sucesso!')</script>";
  
 ?>