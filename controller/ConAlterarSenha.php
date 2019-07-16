<?php 
	include '../model/funcoes_bd.php';
	include 'Usuario.php';

	$dados = buscaPadraoString("usuario", "usuario_id", 1);
  	$user = new Usuario($dados['usuario_cpf'], $_POST['senhaAtual'], $dados['usuario_nome'], $dados['usuario_telefone'],$dados['usuario_endereco'], $dados['usuario_sexo'], $dados['usuario_id']);
  	$user->alterarSenha($_POST['senhaNova1'], $_POST['senhaNova2']);
 ?>