<?php 
	include_once("../model/funcoes_bd.php");
	include_once 'Pessoa.php';
	// Variaveis globais para Banco de Dados
	$_SG_user['tabela'] = "usuario";
	$_SG_user['cpf'] = "usuario_cpf";
	$_SG_user['id'] = "usuario_id";

	class Usuario extends Pessoa
	{
		private $id;
		private $cpf;
		private $senha;


		//MÉTODOS
		function __construct($cpf=NULL,$senha=NULL,$nome=NULL,$telefone=NULL,$endereco=NULL, $sexo=NULL, $id=NULL)
		{
			$this->id = $id;
			$this->cpf = $cpf;
			if($senha!=NULL){
				$this->setSenha($senha);
			}else{
				$this->senha = $senha;
			}

			parent::__construct($nome,$telefone,$endereco, $sexo);

		}

		function setId($id){
			if(is_numeric($id)){
				$this->id = $id;
			}
		}
		function getId(){
			return $this->id;
		}

		function setCpf($cpf){
			if(is_string($cpf)){
				$this->cpf = $cpf;
			}
		}
		function getCpf(){
			return $this->cpf;
		}

		function setSenha($senha){
			$senha = md5($senha);
			if(is_string($senha)){
				$this->senha = $senha;
			}
		}
		function getSenha(){
			return $this->senha;
		}

		

		function cadastrarUsuario(){
			global $_SG_user;
			if(($this->cpf != "") && ($this->senha != "") && ($this->nome != "") && ($this->telefone != "") && ($this->endereco != "")){
				if(($this->nome != NULL) && ($this->telefone != NULL) && ($this->endereco != NULL)){
						$user = buscaPadraoString($_SG_user['tabela'], $_SG_user['cpf'], $this->cpf);
						if($user == NULL){
							$this->senha = addslashes($this->senha);
							$this->cpf = addslashes($this->cpf);
							$this->nome = addslashes($this->nome);
							$this->endereco = addslashes($this->endereco);
							$this->telefone = addslashes($this->telefone);

							cadastraUser($this->nome, $this->cpf, $this->senha, $this->endereco, $this->telefone, $this->sexo);
							echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_usuarios'/>
							<script type='text/javascript'> alert('Cadastro realizado com sucesso!')</script>";
						}else{
							echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_usuarios'/>
							<script type='text/javascript'> alert('CPF já está cadastrado no Sistema!')</script>";
						}
				}
			}
		}



		function realizarLogin(){
			global $_SG_user;



			if($this->cpf == ""){
			echo "
					<meta http-equiv='refresh' content='0; url=../'/>
					<script type='text/javascript'> alert('Campo usuario vazio!')</script>
					";
			}else{
				$user = buscaPadraoString($_SG_user['tabela'], $_SG_user['cpf'], $this->cpf);
				if($user == NULL){
					
					echo "
						<meta http-equiv='refresh' content='0; url=../index.php'/>
						<script type='text/javascript'> alert('Usuario não cadastrado!')</script>
						";
				}else{
					if($this->senha != $user['usuario_senha']){
						echo "
						<meta http-equiv='refresh' content='0; url=../index.php'/>
						<script type='text/javascript'> alert('Senha incorreta!')</script>
						";
					}else{
						session_start();
						$_SESSION['loginUsuario'] = $user['usuario_cpf'];
						$_SESSION['senhaUsuario'] = $user['usuario_senha'];
						$_SESSION['usuarioID'] = $user['usuario_id'];
						$_SESSION['usuarioNome'] = $user['usuario_nome'];
						header("Location: ../View/painel.php");
					}
				}
			}
		}

		function consultarTodosUsuarios(){
			global $_SG_user;
			return buscaTotalsemInativos($_SG_user['tabela']);
		}

		function consultarUsuario(){
			global $_SG_user;
			$dados = buscaPadraoInt($_SG_user['tabela'], $_SG_user['id'], $this->getId());
			$this->setCpf($dados['usuario_cpf']);
			$this->setNome($dados['usuario_nome']);
			$this->setTelefone($dados['usuario_telefone']);
			$this->sexo = $dados['usuario_sexo'];
			$this->setEndereco($dados['usuario_endereco']);
		}

		function excluirUsuario(){
			global $_SG_user;
			deletePadrao($_SG_user['tabela'], $_SG_user['id'], $this->getId());
		}

		function alterarUsuario(){
			alteraUser($this->id, $this->nome, $this->cpf, $this->senha, $this->endereco, $this->telefone, $this->sexo);
		}

		function alterarSenha($novaSenha1, $novaSenha2){
			global $_SG_user;
			$user = buscaPadraoString($_SG_user['tabela'], $_SG_user['id'], $this->id);
			if($this->senha != $user['usuario_senha']){
					echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=trocar_senha'/>
						<script type='text/javascript'> alert('Senha atual diferente!')</script>
						";
			}else{
				if ($novaSenha1 == $novaSenha2) {
					$this->setSenha($novaSenha1);
					$this->alterarUsuario();
					echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=trocar_senha'/>
						<script type='text/javascript'> alert('Senha Alterada com sucesso!')</script>
						";
				}else{
					echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=trocar_senha'/>
						<script type='text/javascript'> alert('As senhas novas digitadas são diferentes')</script>
						";
				}

			}

		}
	}

 ?>