<?php 
	include 'Livro.php';
	$livro = new Livro($_POST['isbn'],$_POST['nome'], $_POST['autor'],$_POST['categoria'],$_POST['quantidade'], $_POST['ano'], $_POST['editora'], $_POST['descricao']);
	$livro->cadastrarLivro();

 ?>