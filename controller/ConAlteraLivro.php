<?php 
	include '../model/funcoes_bd.php';
	include 'Livro.php';

  	$livro = new Livro($_POST['isbn'], $_POST['nome'], $_POST['autor'], $_POST['categoria'], $_POST['quantidade'], $_POST['ano'], $_POST['editora'], $_POST['descricao'], $_POST['quantidadeAlugada'], $_POST['id']);
  	$livro->alterarLivro();
  	echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=alterar_livros&id=".$livro->getId()."'/>
  	<script type='text/javascript'> alert('Cadastro alterado com sucesso!')</script>";
  
 ?>