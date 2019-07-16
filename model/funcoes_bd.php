<?php 
	function conectarBD(){
		if(!defined('HOST')){
			define('HOST', 'localhost');
		}
		if(!defined('USER')){
			define('USER', 'root');
		}
		if(!defined('PASS')){
			define('PASS', '');
		}
		if(!defined('BD')){
			define('BD', 'projeto_biblioteca');
		}
		$dsn = "mysql:host=".HOST.";dbname=".BD;


		try{
			$conn = new PDO($dsn, USER, PASS);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		}catch(PDOException $e){
			echo "Erro ao conectar ao banco".$e->getMessage();
		}
	}

	function buscaTodosUsers(){
		$pdo = conectarBD();
		try{
			$usuario = $pdo->query('SELECT * FROM usuario');
			$usuario->execute();

			if ($usuario->rowCount()>0) {
				return $usuario->fetchAll(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar todos os usuários!".$e->getMessage();
		}

	}

	function buscaTotal($tabela){
		$pdo = conectarBD();
		try{
			$dados = $pdo->prepare('CALL buscaTotal("'.$tabela.'");');
			$dados->execute(array(':tabela' => $tabela));

			if ($dados->rowCount()>0) {
				return $dados->fetchAll(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar todos os dados!".$e->getMessage();
		}
	}

	function buscaTotalsemInativos($tabela){
		$pdo = conectarBD();
		try{
			$dados = $pdo->prepare('SELECT * FROM '.$tabela.' WHERE inativo = 0;');
			$dados->execute(array(':tabela' => $tabela));

			if ($dados->rowCount()>0) {
				return $dados->fetchAll(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar todos os dados!".$e->getMessage();
		}
	}

	function buscaPadraoString($tabela, $atributo, $parametro){
		$pdo = conectarBD();
		try{
			$resultado = $pdo->prepare('CALL buscaPadraoString(:tabela , :atributo, :parametro)');
			$resultado->bindValue(":tabela", $tabela);
			$resultado->bindValue(":atributo", $atributo);
			$resultado->bindValue(":parametro", $parametro);
			$resultado->execute();
			if ($resultado->rowCount()>0) {
				return $resultado->fetch(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar no Banco de Dados!".$e->getMessage();
		}

	}

	function buscaPadraoInt($tabela, $atributo, $parametro){
		$pdo = conectarBD();
		try{
			$resultado = $pdo->prepare('CALL buscaPadraoInt(:tabela , :atributo, :parametro)');
			$resultado->bindValue(":tabela", $tabela);
			$resultado->bindValue(":atributo", $atributo);
			$resultado->bindValue(":parametro", $parametro);
			$resultado->execute();
			if ($resultado->rowCount()>0) {
				return $resultado->fetch(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar no Banco de Dados!".$e->getMessage();
		}

	}
	
	function buscaPendencia($id_locatario){
		$pdo = conectarBD();
		try{
			$resultado = $pdo->prepare('SELECT * FROM `buscaemprestimospendentes` WHERE emp_locatario_id = :parametro AND current_date()>emp_dt_entrega');
			$resultado->bindValue(":parametro", $id_locatario);
			$resultado->execute();
			if ($resultado->rowCount()>0) {
				return $resultado->fetch(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar no Banco de Dados!".$e->getMessage();
		}
	}

	function buscaLivroEmprestado($id_livro){
		$pdo = conectarBD();
		try{
			$resultado = $pdo->prepare('SELECT COUNT(*) AS qnt FROM `buscaemprestimospendentes` WHERE emp_livro_id = :parametro');
			$resultado->bindValue(":parametro", $id_livro);
			$resultado->execute();
			if ($resultado->rowCount()>0) {
				return $resultado->fetch(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar no Banco de Dados!".$e->getMessage();
		}
	}

	function buscaQuantidadePendente($id_locatario){
		$pdo = conectarBD();
		try{
			$resultado = $pdo->prepare('SELECT COUNT(*) AS qnt FROM `buscaemprestimospendentes` WHERE emp_locatario_id = :parametro');
			$resultado->bindValue(":parametro", $id_locatario);
			$resultado->execute();
			if ($resultado->rowCount()>0) {
				return $resultado->fetch(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar no Banco de Dados!".$e->getMessage();
		}
	}

	function buscaMulta($id_locatario){
		$pdo = conectarBD();
		try{
			$resultado = $pdo->prepare('SELECT * FROM buscaMulta WHERE emp_locatario_id = :parametro');
			$resultado->bindValue(":parametro", $id_locatario);
			$resultado->execute();
			if ($resultado->rowCount()>0) {
				return $resultado->fetch(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar no Banco de Dados!".$e->getMessage();
		}
	}


	function deletePadrao($tabela, $atributo, $parametro){
		$pdo = conectarBD();
		try{
			$resultado = $pdo->prepare('CALL deletePadrao(:tabela , :atributo, :parametro)');
			$resultado->bindValue(":tabela", $tabela);
			$resultado->bindValue(":atributo", $atributo);
			$resultado->bindValue(":parametro", $parametro);
			$resultado->execute();
			if ($resultado->rowCount()>0) {
				return $resultado->fetch(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			echo "Erro ao buscar no Banco de Dados!".$e->getMessage();
		}

	}


	function cadastraUser($nome, $cpf, $senha, $endereco, $telefone, $sexo){
		$pdo = conectarBD();
		try{	
			//$pdo->query('INSERT INTO `usuario` (`usuario_id`, `usuario_cpf`, `usuario_senha`, `usuario_nome`, `usuario_telefone`, `usuario_endereco`, `usuario_sexo`) VALUES (NULL, "'.$cpf.'", "'.$senha.'", "'.$nome.'", "'.$telefone.'", "'.$endereco.'", "'.$sexo.'");');
			$stmt = $pdo->prepare('INSERT INTO `usuario` (`usuario_id`, `usuario_cpf`, `usuario_senha`, `usuario_nome`, `usuario_telefone`, `usuario_endereco`, `usuario_sexo`) VALUES (NULL, :cpf, :senha, :nome, :telefone, :endereco, :sexo);');
			$stmt->execute(array(
    				':cpf' => $cpf,
    				':senha' => $senha,
    				':nome' => $nome,
    				':telefone' => $telefone,
    				':endereco' => $endereco,
    				':sexo' => $sexo
 				));

		}catch(PDOException $e){
			echo "Erro ao cadastrar usuario!".$e->getMessage();
		}

	}

	function cadastraLocatario($nome, $matricula, $tipo, $endereco, $telefone, $sexo){
		$pdo = conectarBD();
		try{	
			//$pdo->query('INSERT INTO `usuario` (`usuario_id`, `usuario_cpf`, `usuario_senha`, `usuario_nome`, `usuario_telefone`, `usuario_endereco`, `usuario_sexo`) VALUES (NULL, "'.$matricula.'", "'.$tipo.'", "'.$nome.'", "'.$telefone.'", "'.$endereco.'", "'.$sexo.'");');
			$stmt = $pdo->prepare('INSERT INTO `locatario` (`locatario_id`, `locatario_matricula`, `locatario_tipo`, `locatario_nome`, `locatario_telefone`, `locatario_endereco`, `locatario_sexo`) VALUES (NULL, :matricula, :tipo, :nome, :telefone, :endereco, :sexo);');
			$stmt->execute(array(
    				':matricula' => $matricula,
    				':tipo' => $tipo,
    				':nome' => $nome,
    				':telefone' => $telefone,
    				':endereco' => $endereco,
    				':sexo' => $sexo
 				));

		}catch(PDOException $e){
			echo "Erro ao cadastrar usuario!".$e->getMessage();
		}

	}

	function cadastraLivro($isbn, $nome, $autor, $categoria, $quantidade, $ano, $quantidadeAlugada, $editora, $descricao){
		$pdo = conectarBD();
		try{	
			$stmt = $pdo->prepare('INSERT INTO `livro` (`livro_id`, `livro_isbn`, `livro_nome`, `livro_autor`, `livro_categoria`, `livro_quantidade`, `livro_ano`, `livro_quantidadeAlugada`, `livro_editora`, `livro_descricao`) VALUES (NULL, :isbn, :nome, :autor, :categoria, :quantidade, :ano, :quantidadeAlugada, :editora, :descricao);');
			$stmt->execute(array(
    				':isbn' => $isbn,
    				':nome' => $nome,
    				':autor' => $autor,
    				':categoria' => $categoria,
    				':quantidade' => $quantidade,
    				':ano' => $ano,
    				':quantidadeAlugada' => $quantidadeAlugada,
    				':editora' => $editora,
    				':descricao' => $descricao,
 				));

		}catch(PDOException $e){
			echo "Erro ao cadastrar usuario!".$e->getMessage();
		}
	}

	function cadastraEmprestimo($usuario, $locatario, $livro){
		$pdo = conectarBD();
		try{	
			$stmt = $pdo->prepare('CALL cadastroEmprestimo(:usuario, :locatario, :livro)');
			$stmt->execute(array(
    				':usuario' => $usuario,
    				':locatario' => $locatario,
    				':livro' => $livro
 				));

		}catch(PDOException $e){
			echo "Erro ao cadastrar emprestimo!".$e->getMessage();
		}
	}

	function alteraLivro($id,$isbn, $nome, $autor, $categoria, $quantidade, $quantidadeAlugada, $ano, $editora, $descricao){
		$pdo = conectarBD();
		try{	
			$stmt = $pdo->prepare('UPDATE `livro` SET `livro_isbn` = :isbn, `livro_autor` = :autor, `livro_nome` = :nome, `livro_quantidade`= :quantidade, `livro_categoria` = :categoria, `livro_quantidadeAlugada` = :quantidadeAlugada,`livro_ano` = :ano, `livro_editora` = :editora, `livro_descricao` = :descricao WHERE `livro_id` = :id;');
					$stmt->execute(array(
    				':isbn' => $isbn,
    				':autor' => $autor,
    				':nome' => $nome,
    				':quantidade' => $quantidade,
    				':categoria' => $categoria,
    				':quantidadeAlugada' => $quantidadeAlugada,
    				':ano' => $ano,
    				':editora' => $editora,
    				':descricao' => $descricao,
    				':id' => $id
 				));
		}catch(PDOException $e){
			echo "Erro ao cadastrar livro!".$e->getMessage();
		}
	}


	function alteraUser($id, $nome, $cpf, $senha, $endereco, $telefone, $sexo){
		$pdo = conectarBD();
		try{	
			if($senha==NULL){
				$stmt = $pdo->prepare('UPDATE `usuario` SET `usuario_cpf` = :cpf, `usuario_nome` = :nome, `usuario_telefone`= :telefone, `usuario_endereco` = :endereco, `usuario_sexo` = :sexo WHERE `usuario_id` = :id;');
					$stmt->execute(array(
    				':cpf' => $cpf,
    				':nome' => $nome,
    				':telefone' => $telefone,
    				':endereco' => $endereco,
    				':sexo' => $sexo,
    				':id' => $id
 				));
			}else{
				$stmt = $pdo->prepare('UPDATE `usuario` SET `usuario_cpf` = :cpf, `usuario_senha` = :senha, `usuario_nome` = :nome, `usuario_telefone`= :telefone, `usuario_endereco` = :endereco, `usuario_sexo` = :sexo WHERE `usuario_id` = :id;');
					$stmt->execute(array(
    				':cpf' => $cpf,
    				':senha' => $senha,
    				':nome' => $nome,
    				':telefone' => $telefone,
    				':endereco' => $endereco,
    				':sexo' => $sexo,
    				':id' => $id
 				));
			}
		}catch(PDOException $e){
			echo "Erro ao cadastrar usuario!".$e->getMessage();
		}

	}

	function alteraLocatario($id, $nome, $matricula, $tipo, $endereco, $telefone, $sexo){
		$pdo = conectarBD();
		try{	
				$stmt = $pdo->prepare('UPDATE `locatario` SET `locatario_matricula` = :matricula, `locatario_tipo` = :tipo, `locatario_nome` = :nome, `locatario_telefone`= :telefone, `locatario_endereco` = :endereco, `locatario_sexo` = :sexo WHERE `locatario_id` = :id;');
					$stmt->execute(array(
    				':matricula' => $matricula,
    				':tipo' => $tipo,
    				':nome' => $nome,
    				':telefone' => $telefone,
    				':endereco' => $endereco,
    				':sexo' => $sexo,
    				':id' => $id
 				));
		}catch(PDOException $e){
			echo "Erro ao cadastrar locatario!".$e->getMessage();
		}

	}	

 ?>