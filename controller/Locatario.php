<?php 
	include_once("../model/funcoes_bd.php");
	include_once 'Pessoa.php';
	// Variaveis globais para Banco de Dados
	$_SG_locatario['tabela'] = "locatario";
	$_SG_locatario['mat'] = "locatario_matricula";
	$_SG_locatario['id'] = "locatario_id";

	class Locatario extends Pessoa
	{
		private $id;
		private $mat;
		private $tipo;


		//MÉTODOS
		function __construct($mat=NULL,$tipo=NULL,$nome=NULL,$telefone=NULL,$endereco=NULL, $sexo=NULL, $id=NULL)
		{
			$this->id = $id;
			$this->mat = $mat;
			$this->tipo = $tipo;
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

		function setMat($mat){
			$this->mat = $mat;
		}
		function getMat(){
			return $this->mat;
		}
		function setTipo($tipo){
			if(is_string($tipo)){
				$this->tipo = $tipo;
			}
		}
		function getTipo(){
			return $this->tipo;
		}

		

		function cadastrarLocatario(){
			global $_SG_locatario;
			if(($this->mat != "") && ($this->tipo != "") && ($this->nome != "") && ($this->telefone != "") && ($this->endereco != "")){
				if(($this->nome != NULL) && ($this->telefone != NULL) && ($this->endereco != NULL)){
						$locatario = buscaPadraoString($_SG_locatario['tabela'], $_SG_locatario['mat'], $this->mat);
						if($locatario == NULL){
							$this->tipo = addslashes($this->tipo);
							$this->mat = addslashes($this->mat);
							$this->nome = addslashes($this->nome);
							$this->endereco = addslashes($this->endereco);
							$this->telefone = addslashes($this->telefone);

							cadastraLocatario($this->nome, $this->mat, $this->tipo, $this->endereco, $this->telefone, $this->sexo);
							echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_locatarios'/>
							<script type='text/javascript'> alert('Cadastro realizado com sucesso!')</script>";
						}else{
							echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_locatarios'/>
							<script type='text/javascript'> alert('Matricula já está cadastrada no Sistema!')</script>";
						}
				}
			}
		}


		function consultarTodosLocatarios(){
			global $_SG_locatario;
			return buscaTotalsemInativos($_SG_locatario['tabela']);
		}

		function excluirLocatario(){
			global $_SG_locatario;
			$pendencia = buscaQuantidadePendente($this->getId());
			$multa = buscaMulta($this->getId());
			if($pendencia['qnt']==0 && $multa['multa']==0){
				deletePadrao($_SG_locatario['tabela'], $_SG_locatario['id'], $this->getId());
				return true;
			}else{
				return false;
			}
		}

		function consultarLocatario(){
			global $_SG_locatario;
			$dados = buscaPadraoInt($_SG_locatario['tabela'], $_SG_locatario['id'], $this->getId());
			$this->setMat($dados['locatario_matricula']);
			$this->setNome($dados['locatario_nome']);
			$this->setTelefone($dados['locatario_telefone']);
			$this->setTipo($dados['locatario_tipo']);
			$this->sexo = $dados['locatario_sexo'];
			$this->setEndereco($dados['locatario_endereco']);
		}

		function alterarLocatario(){
			alteraLocatario($this->id, $this->nome, $this->mat, $this->tipo, $this->endereco, $this->telefone, $this->sexo);
		}
	}

 ?>