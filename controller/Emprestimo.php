<?php 
	include_once("../model/funcoes_bd.php");
	include_once 'Usuario.php';
	include_once 'Locatario.php';
	include_once 'Livro.php';
	
	$_SG_emprestimo['tabela'] = "emprestimo";
	$_SG_emprestimo['id'] = "emp_id";

	class Emprestimo
	{
		private $id;
		private $dt_locacao;
		private $dt_devolucao;
		private $dt_entrega;
		public $locatario;
		public $livro;
		public $usuario;
		public $status;
		public $multa;

		function __construct($id = NULL, $id_locatario = NULL,$id_livro = NULL,$id_usuario = NULL,$dt_locacao = NULL,$dt_devolucao = NULL,$dt_entrega = NULL, $status = NULL, $multa = NULL)
		{
			$this->id = $id;
			$this->locatario = new Locatario(NULL, NULL, NULL, NULL, NULL, NULL, $id_locatario);
			$this->livro = new Livro(NULL, NULL, NULL,  NULL, NULL,  NULL,  NULL,  NULL,  NULL, $id_livro);
			$this->usuario =  new Usuario(NULL, NULL, NULL, NULL, NULL, NULL, $id_usuario);
			$this->dt_locacao = $dt_locacao;
			$this->dt_devolucao = $dt_devolucao;
			$this->dt_entrega = $dt_entrega;
			$this->status = $status;
			$this->multa = $multa;
			if($id_locatario!=NULL){
				$this->locatario->consultarLocatario();
			}
			if($id_livro!=NULL){
				$this->livro->consultarLivro();
			}
			if($id_usuario!=NULL){
				$this->usuario->consultarUsuario();
			}
		}

		function setId($id){
			if(is_numeric($id)){
				$this->id = $id;
			}
		}
		function getId(){
			return $this->id;
		}

		function setDt_locacao($dt_locacao){
			$this->dt_locacao = $dt_locacao;
		}
		function getDt_locacao(){
			return $this->dt_locacao;
		}

		function setDt_devolucao($dt_devolucao){
			$this->dt_devolucao = $dt_devolucao;
		}
		function getDt_devolucao(){
			return $this->dt_devolucao;
		}

		function setDt_entrega($dt_entrega){
			$this->dt_entrega = $dt_entrega;
		}
		function getDt_entrega(){
			return $this->dt_entrega;
		}


		function cadastrarEmprestimo(){
			cadastraEmprestimo($this->usuario->getId(), $this->locatario->getId(), $this->livro->getId());			
		}

		function consultarEmprestimo(){
			global $_SG_emprestimo;
			$dados = buscaPadraoInt($_SG_emprestimo['tabela'], $_SG_emprestimo['id'], $this->getId());
			$this->__construct($this->getId(), $dados['emp_locatario_id'],$dados['emp_livro_id'], $dados['emp_usuario_id'], $dados['emp_dt_locacao'], $dados['emp_dt_devolucao'], $dados['emp_dt_entrega'], $dados['emp_status'], $dados['emp_multa']);
		}

		function consultarTodosEmprestimos(){
			global $_SG_emprestimo;
			return buscaTotal($_SG_emprestimo['tabela']);
		}
	}
 ?>