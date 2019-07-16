<h1>Trocar Senha</h1>
<form action="../controller/ConAlterarSenha.php" method="POST">
    <label for="senhaAtual">Senha Atual:</label>
    <input type="password" name="senhaAtual" required>
    <label for="senhaNova1">Nova Senha:</label>
    <input type="password" name="senhaNova1" required>
    <label for="senhaNova2">Digite Novamente:</label>
    <input type="password" name="senhaNova2" required>
  	<div class="centro">
    	<input type="submit" value="Trocar Senha">
    </div>
</form>