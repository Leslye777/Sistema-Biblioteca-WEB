<?php 
	include_once 'Emprestimo.php';
	include_once("../model/funcoes_bd.php");
	session_start();
	if($_POST['matricula']!=NULL || $_POST['isbn']!=NULL){
		$locatario = buscaPadraoString("locatario" , "locatario_matricula", $_POST['matricula']);
		if($locatario==NULL){
			echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_emprestimo'/>
				<script type='text/javascript'> alert('Matricula inexistente no Sistema!')</script>";
		}else{
			$livro = buscaPadraoString("livro" , "livro_isbn", $_POST['isbn']);
			if($livro==NULL){
				echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_emprestimo'/>
				<script type='text/javascript'> alert('ISBN inexistente no Sistema!')</script>";
			}else{
				$pendencia = buscaPendencia($locatario['locatario_id']);
				$quantidadeAlugada = buscaQuantidadePendente($locatario['locatario_id']);
				$multa = buscaMulta($locatario['locatario_id']);
				if($locatario['locatario_tipo']=='P' && $multa['multa']==0){
					if($pendencia==NULL){
						$emp = new Emprestimo(NULL,$locatario['locatario_id'], $livro['livro_id'], $_SESSION['usuarioID']);
						$emp->cadastrarEmprestimo();
					}else{
						echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_emprestimo'/>
						<script type='text/javascript'> alert('Locatario com multa ou pendencia!')</script>";
					}
				}elseif ($locatario['locatario_tipo']=='A') {
					if($pendencia==NULL && $quantidadeAlugada['qnt']<3 && $multa['multa']==0){
						$emp = new Emprestimo(NULL,$locatario['locatario_id'], $livro['livro_id'], $_SESSION['usuarioID']);
						$emp->cadastrarEmprestimo();
					}else{
						echo "<meta http-equiv='refresh' content='0; url=../View/painel.php?pg=adicionar_emprestimo'/>
						<script type='text/javascript'> alert('Locatario com multa, pendencia ou quantidade de livros emprestado excede!')</script>";
					}
				}

			}
		}
	}

 ?>