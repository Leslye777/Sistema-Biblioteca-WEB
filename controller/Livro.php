<?php 
	include_once("../model/funcoes_bd.php");
	// Variaveis globais para Banco de Dados
	$_SG_livro['tabela'] = "livro";
	$_SG_livro['isbn'] = "livro_isbn";
	$_SG_livro['id'] = "livro_id";

	class Livro
	{
		private $id;
		private $isbn;
		private $nome;
		private $autor;
		private $categoria;
		private $quantidade;
		private $quantidadeAlugada;
		public $ano;
		public $editora;
		public $descricao;



		//MÉTODOS
		function __construct($isbn=NULL, $nome=NULL, $autor=NULL, $categoria=NULL, $quantidade=NULL, $ano=NULL, $editora=NULL, $descricao=NULL, $quantidadeAlugada=NULL, $id=NULL)
		{
			$this->id = $id;
			$this->isbn = $isbn;
			$this->nome = $nome;
			$this->autor = $autor;
			$this->categoria = $categoria;
			$this->quantidade = $quantidade;
			$this->ano = $ano;
			$this->quantidadeAlugada = $quantidadeAlugada;
			$this->editora = $editora;
			$this->descricao = $descricao;
		}

		function setId($id){
			if(is_numeric($id)){
				$this->id = $id;
			}
		}
		function getId(){
			return $this->id;
		}
		
		function setIsbn($isbn){
			if(is_numeric($isbn)){
				$this->isbn = $isbn;
			}
		}
		function getIsbn(){
			return $this->isbn;
		}
		
		function setNome($nome){
			if(is_string($nome)){
				$this->nome = $nome;
			}
		}
		function getNome(){
			return $this->nome;
		}
		
		function setAutor($autor){
			if(is_string($autor)){
				$this->autor = $autor;
			}
		}
		function getAutor(){
			return $this->autor;
		}
		
		function setCategoria($categoria){
			if(is_string($categoria)){
				$this->categoria = $categoria;
			}
		}
		function getCategoria(){
			return $this->categoria;
		}
		
		function setQuantidade($quantidade){
			if(is_numeric($quantidade)){
				$this->quantidade = $quantidade;
			}
		}
		function getQuantidade(){
			return $this->quantidade;
		}
		
		function setQuantidadeAlugada($quantidadeAlugada){
			if(is_numeric($quantidadeAlugada)){
				$this->quantidadeAlugada = $quantidadeAlugada;
			}
		}
		function getQuantidadeAlugada(){
			return $this->quantidadeAlugada;
		}


		function cadastrarLivro(){
			global $_SG_livro;
			if(($this->isbn != "") && ($this->nome != "") && ($this->autor != "") && ($this->categoria != "") && ($this->quantidade != "")){
				if(($this->isbn != NULL) && ($this->nome != NULL) && ($this->autor != NULL) && ($this->categoria != NULL) && ($this->quantidade != NULL)){
						$livro = buscaPadraoString($_SG_livro['tabela'], $_SG_livro['isbn'], $this->isbn);
						if($livro == NULL){
							$this->isbn = addslashes($this->isbn);
							$this->nome = addslashes($this->nome);
							$this->autor = addslashes($this->autor);
							$this->categoria = addslashes($this->categoria);
							$this->quantidade = addslashes($this->quantidade);
							$this->editora = addslashes($this->editora);
							$this->descricao = addslashes($this->descricao);
							
							cadastraLivro($this->isbn, $this->nome, $this->autor, $this->categoria, $this->quantidade, $this->ano, 0, $this->editora, $this->descricao);
							echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_livros'/>
							<script type='text/javascript'> alert('Cadastro realizado com sucesso!')</script>";
						}else{
							echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_livros'/>
							<script type='text/javascript'> alert('ISBN já está cadastrada no Sistema!')</script>";
						}
				}
			}
		}


		function consultarTodosLivros(){
			global $_SG_livro;
			return buscaTotalsemInativos($_SG_livro['tabela']);
		}

		function consultarLivro(){
			global $_SG_livro;
			$dados = buscaPadraoInt($_SG_livro['tabela'], $_SG_livro['id'], $this->getId());
			$this->setIsbn($dados['livro_isbn']);
			$this->setNome($dados['livro_nome']);
			$this->setAutor($dados['livro_autor']);
			$this->setCategoria($dados['livro_categoria']);
			$this->setQuantidade($dados['livro_quantidade']);
			$this->setquantidadeAlugada($dados['livro_quantidadeAlugada']);
			$this->ano = $dados['livro_ano'];
			$this->editora = $dados['livro_editora'];
			$this->descricao = $dados['livro_descricao'];

		}

		function alterarLivro(){
			alteraLivro($this->getId(), $this->getIsbn(), $this->getNome(), $this->getAutor(), $this->getCategoria(), $this->getQuantidade(), $this->getQuantidadeAlugada(), $this->ano, $this->editora, $this->descricao);
		}

		function excluirLivro(){
			global $_SG_livro;
			$emprestimo = buscaLivroEmprestado($this->getId());
			if($emprestimo['qnt']==0){
				deletePadrao($_SG_livro['tabela'], $_SG_livro['id'], $this->getId());
				return true;
			}else{
				return false;
			}
		}
	}

 ?>