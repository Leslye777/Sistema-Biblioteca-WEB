<?php 
	include '../model/funcoes_bd.php';
	include 'Locatario.php';

  	$locatario = new Locatario(NULL, NULL, NULL, NULL, NULL, NULL, $_GET['id']);
  	$teste = $locatario->excluirLocatario();
  	if($teste == true){
	  	echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=consulta_locatarios'/>
	  	<script type='text/javascript'> alert('Cadastro excluido com sucesso!')</script>";
	}else{
	  	echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=consulta_locatarios'/>
		<script type='text/javascript'> alert('Locatario possui pendencias!')</script>";
	}
  
 ?>