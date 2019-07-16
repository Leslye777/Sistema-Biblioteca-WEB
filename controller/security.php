<?php 
	include_once("../model/funcoes_bd.php");

	// Variaveis globais para a configuração de segurança
	$_SG['validaSempre'] = true;//valor para sempre validar quando carregar uma pagina interna do sistema
	$_SG['abreSessao'] = true;//valor para iniciar as sessions
	$_SG['paginaLogin'] = "../";



	if($_SG['validaSempre'] == true){
		session_start();
	}

	function validaUsuario($usuario, $senha) {
		global $_SG;

		$cpfusuario = addslashes($usuario);
		$nsenha = addslashes($senha);


		$resultado = buscaPadraoString("usuario", "usuario_cpf",$cpfusuario);

		if ($resultado==NULL) {
			return false;
		}else{
			if($nsenha != $resultado['usuario_senha']){
				return 0;
			}else{
				$_SESSION['usuarioID'] = $resultado['usuario_id'];
				$_SESSION['usuarioNome'] = $resultado['usuario_nome'];

				if ($_SG['validaSempre'] == true) {
					$_SESSION['loginUsuario'] = $usuario;
      				$_SESSION['senhaUsuario'] = $senha;
      			}
      			return true;
			}
		}
	}

	function protegePagina() {
		global $_SG;

		if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {

			expulsaVisitante();
		}else if (isset($_SESSION['usuarioID']) OR isset($_SESSION['usuarioNome'])) {

			if ($_SG['validaSempre'] == true) {

				if (!validaUsuario($_SESSION['loginUsuario'], $_SESSION['senhaUsuario'])) {

					expulsaVisitante();
				}
			}
		}
	}

	function expulsaVisitante() {
		global $_SG;

		unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['loginUsuario'], $_SESSION['senhaUsuario']);

		header("Location: ".$_SG['paginaLogin']);

	}
 ?>