<?php
    include '../controller/Emprestimo.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $emprestimo = new Emprestimo($id);
        $emprestimo->consultarEmprestimo();
    }
?>
<h1>Cadastro Usuário</h1>
<form action="../controller/ConAlteraEmprestimo.php" method="POST" class="telasAlteracao">
    <label for="id">Código do Emprestimo:</label>
    <input type="text" name="id" value="<?php echo $emprestimo->getId(); ?>" readonly>
    <label for="nome">Nome do Locatario:</label>
    <input type="text" name="nome" value="<?php echo $emprestimo->locatario->getNome()?>" required readonly >
    <label for="mat">Matricula:</label>
    <input type="text" name="mat" value="<?php echo $emprestimo->locatario->getMat()?>" required readonly>
    <label for="nome">Nome do Livro:</label>
    <input type="text" name="nome" value="<?php echo $emprestimo->livro->getNome()?>" required readonly >
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" value="<?php echo $emprestimo->livro->getIsbn()?>" required readonly>
    <label for="dt_locacao">Data do Empréstimo:</label>
    <input type="date" name="dt_locacao" value="<?php echo $emprestimo->getDt_locacao()?>" required readonly>
    <label for="dt_entrega">Data para Devolver:</label>
    <input type="date" name="dt_entrega" value="<?php echo $emprestimo->getDt_entrega()?>" required readonly>
    <label for="dt_devolucao">Data de Devolução:</label>
    <input type="date" name="dt_devolucao" value="<?php echo $emprestimo->getDt_devolucao()?>" required readonly>
    <label for="status">Status:</label>
    <input type="text" name="status" value="<?php echo $emprestimo->status; ?>" required readonly>
    <label for="multa">Multa:</label>
    <input type="text" name="multa" value="<?php echo $emprestimo->multa; ?>" required readonly>


    <div class="centro">
        <input type="submit"  value="Devolver Livro">
    </div>
</form> 