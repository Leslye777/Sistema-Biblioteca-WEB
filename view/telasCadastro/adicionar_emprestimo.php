<h1>Cadastrar Empréstimo</h1>
<form action="../controller/ConCadastraEmprestimo.php" method="POST">
    
    <label for="matricula">Matricula:</label>
    <input type="text" name="matricula" class="matricula"required >
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" required>
  	<div class="centro">
    	<input type="submit" value="Cadastrar">
    </div>
</form>