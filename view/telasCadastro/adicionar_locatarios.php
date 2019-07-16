<h1>Cadastrar Locarários</h1>
<form action="../controller/ConCadastraLocatario.php" method="POST">
    
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required>
    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" required>
    <label for="matricula">Matricula:</label>
    <input type="text" name="matricula" class="matricula"required >
    <label for="sexo">Sexo:</label>
    <input type="radio" name="sexo" value="M" checked> Masculino
  	<input type="radio" name="sexo" value="F" > Feminino
    <label for="tipo">Tipo:</label>
    <input type="radio" name="tipo" value="P" required > Professor
    <input type="radio" name="tipo" value="A" required > Aluno
  	<div class="centro">
    	<input type="submit" value="Cadastrar">
    </div>
</form>