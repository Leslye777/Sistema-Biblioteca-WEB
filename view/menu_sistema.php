<header>
	<div id="divLogo">
		<img src="image/logo.png">
	</div>

	<input type="checkbox" id="control-nav" />
	<label for="control-nav" class="control-nav"></label>
	<label for="control-nav" class="control-nav-close"></label>

	<nav>
		<ul class="ulMenu">
			<li><a href="?pg=home">Usuário</a>
				<ul>
					<li><a href="?pg=adicionar_usuarios">Cadastro Usuário</a></li>
					<li><a href="?pg=consulta_usuarios">Consulta Usuário</a></li>
					<li><a href="?pg=trocar_senha">Alterar Senha</a></li>
				</ul>
			</li>
			<li><a href="?pg=home">Livros</a>
				<ul>
					<li><a href="?pg=adicionar_livros">Cadastro Livros</a></li>
					<li><a href="?pg=consulta_livros">Consulta Livros</a></li>
				</ul>
			</li>
			<li><a href="?pg=servico">Empréstimos</a>
				<ul>
					<li><a href="?pg=adicionar_emprestimo">Cadastro Empréstimo</a></li>
					<li><a href="?pg=consulta_emprestimo">Consulta Empréstimo</a></li>
				</ul>
			</li>
			<li><a href="?pg=contato">Locatário</a>
				<ul>
					<li><a href="?pg=adicionar_locatarios">Cadastro Locatário</a></li>
					<li><a href="?pg=consulta_locatarios">Consulta Locatário</a></li>
				</ul>
			</li>
			<li><a href="?op=logout">Sair</a>
		</ul>
	</nav>
</header>

<?php 

	if(isset($_GET['op']) && $_GET['op'] == 'logout'){
		expulsaVisitante();
	}
 ?>