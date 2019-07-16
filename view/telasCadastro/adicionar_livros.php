<h1>Cadastrar Livros</h1>
<form action="../controller/ConCadastraLivro.php" method="POST">
    
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" required>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" required>
    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" class="categoria"required >
    <label for="quantidade">Quantidade:</label>
    <input type="number" name="quantidade" min="1" required>
    <label for="ano">Ano:</label>
    <input type="number" name="ano" max="2017" required>
    <label for="editora">Editora:</label>
    <input type="text" name="editora" >
    <label for="descricao">Descricao:</label>
    <input type="text" name="descricao" >
    <div class="centro">
    	<input type="submit" value="Cadastrar">
    </div>
</form>