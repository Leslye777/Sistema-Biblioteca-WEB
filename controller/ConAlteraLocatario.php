<?php 
	include '../model/funcoes_bd.php';
	include 'Locatario.php';

  	$user = new Locatario($_POST['mat'], $_POST['tipo'], $_POST['nome'], $_POST['telefone'],$_POST['endereco'], $_POST['sexo'], $_POST['id']);
  	$user->alterarLocatario();
  	echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=alterar_locatarios&id=".$user->getId()."'/>
  	<script type='text/javascript'> alert('Cadastro alterado com sucesso!')</script>";
  
 ?>