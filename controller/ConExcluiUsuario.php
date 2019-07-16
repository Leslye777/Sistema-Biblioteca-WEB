<?php 
	include '../model/funcoes_bd.php';
	include 'Usuario.php';

  	$user = new Usuario(NULL, NULL, NULL, NULL, NULL, NULL, $_GET['id']);
  	$user->excluirUsuario();
  	echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=consulta_usuarios'/>
  	<script type='text/javascript'> alert('Cadastro excluido com sucesso!')</script>";
  
 ?>