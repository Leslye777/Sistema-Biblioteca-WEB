<h1>Cadastrar Usuário</h1>
<form action="../controller/ConCadastraUsuario.php" method="POST">
    
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required>
    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" required>
    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" class="cpf" maxlength="11" onpaste="return false"  required >
    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>
    <label for="sexo">Sexo:</label>
    <input type="radio" name="sexo" value="M" checked> Masculino
  	<input type="radio" name="sexo" value="F" > Feminino
  	<div class="centro">
    	<input type="submit" value="Cadastrar">
    </div>
</form>