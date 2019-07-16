<body id="login">
	<div class="conteudo">
		<section class="centro">
			<img src="view/image/logo.png" title="Logo OpenLib" alt="Logo OpenLib">
		</section>
		<div id="mensagemLogin" style="text-align: center; color: red; height: 20px"></div>
		<form method="post" id="form-login" action="controller/ConLoginUsuario.php" name="formulario" onSubmit="return validaLogin(this);">
			<label for="login">CPF:</label>
	    	<input class="input_style" type="text" name="login" exige="sim"  placeholder="Login">
	    	<label for="senha">Password:</label>
	    	<input class="input_style" type="password" name="senha" exige="sim"  placeholder="Password">
	    	
	    	<a href="esqueceuSenha.php">Esqueceu sua senha?</a>
	    	<section class="centro">
	    		<input class="botao" type="submit" value="Entrar" id="submit" name="submit">
	    	</section>	
		</form>
	</div>
</body>