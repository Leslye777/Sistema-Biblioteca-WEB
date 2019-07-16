<?php
    include '../controller/Livro.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $livro = new Livro();
        $livro->setId($id);
        $livro->consultarLivro();
    }
?>
<h1>Cadastro Livro</h1>
<form action="../controller/ConAlteraLivro.php" method="POST" class="telasAlteracao">
    <label for="id">Código do Livro:</label>
    <input type="text" name="id" value="<?php echo $livro->getId(); ?>" readonly>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $livro->getNome();?>" required >
    <label for="autor">Autor:</label>
    <input type="text" name="autor" value="<?php echo $livro->getAutor();?>" required >
    <label for="isbn">Isbn:</label>
    <input type="text" name="isbn" value="<?php echo $livro->getIsbn();?>" required readonly>
    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" value="<?php echo $livro->getCategoria()?>" required>
    <label for="quantidade">Quantidade:</label>
    <input type="number" name="quantidade" value="<?php echo $livro->getQuantidade()?>" required>
    <label for="quantidadeAlugada">QuantidadeAlugada:</label>
    <input type="number" name="quantidadeAlugada" value="<?php echo $livro->getQuantidadeAlugada();?>" required>
    <label for="ano">Ano:</label>
    <input type="Number" name="ano" value="<?php echo $livro->ano;?>" >
    <label for="editora">Editora:</label>
    <input type="text" name="editora" value="<?php echo $livro->editora;?>" >
    <label for="descricao">Descricao:</label>
    <input type="text" name="descricao" value="<?php echo $livro->descricao;?>" >

    <?php  ?>
    <div class="centro">
        <input type="submit"  value="Alterar Cadastro">
    </div>
</form> 