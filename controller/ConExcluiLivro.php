<?php 
	include 'Livro.php';

  	$livro = new Livro(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $_GET['id']);
  	$teste = $livro->excluirlivro();
  	if($teste == true){
	  	echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=consulta_livros'/>
	  	<script type='text/javascript'> alert('Cadastro excluido com sucesso!')</script>";
	}else{
	  	echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=consulta_livros'/>
		<script type='text/javascript'> alert('Contém livros emprestados!')</script>";
	}
  
 ?>