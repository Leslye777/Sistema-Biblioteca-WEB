<?php  
	class Pessoa{
		protected $nome;
		protected $telefone;
		protected $endereco;
		public $sexo;
		function __construct($nome,$telefone,$endereco, $sexo){
				$this->nome = $nome;
				$this->telefone = $telefone;
				$this->endereco = $endereco;
				$this->sexo = $sexo;
			}
		function setNome($nome){
			if(is_string($nome)){
					$this->nome = $nome;
			}
		}
		function getNome(){
				return $this->nome;
		}

		function setTelefone($telefone){
			if(is_string($telefone)){
				$this->telefone = $telefone;
			}
		}
		function getTelefone(){
				return $this->telefone;
		}
		function setEndereco($endereco){
			if(is_string($endereco)){
				$this->endereco = $endereco;
			}
		}
		function getEndereco(){
				return $this->endereco;
		}
	}
?>