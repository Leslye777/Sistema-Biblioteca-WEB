<?php
    include '../controller/Locatario.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $locatario = new Locatario(NULL, NULL, NULL, NULL, NULL, NULL, $id);
        $locatario->consultarLocatario();
    }
?>
<h1>Cadastro Usuário</h1>
<form action="../controller/ConAlteraLocatario.php" method="POST" class="telasAlteracao">
    <label for="id">Código do usuário:</label>
    <input type="text" name="id" value="<?php echo $locatario->getId(); ?>" readonly>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $locatario->getNome()?>" required >
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="<?php echo $locatario->getTelefone()?>" required>
    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" value="<?php echo $locatario->getEndereco()?>" required>
    <label for="mat">Matricula:</label>
    <input type="text" name="mat" value="<?php echo $locatario->getMat()?>" required readonly>
    <label for="sexo">Sexo:</label>
    <input type="radio" name="sexo" value="M" <?php if($locatario->sexo == 'M'){echo "checked";}?>> Masculino
        <input type="radio" name="sexo" value="F" <?php if($locatario->sexo == 'F'){echo "checked";}?>> Feminino
    <div class="centro">
    <label for="tipo">Tipo:</label>
    <input type="radio" name="tipo" value="A" <?php if($locatario->getTipo() == 'A'){echo "checked";}?>> Aluno
        <input type="radio" name="tipo" value="P" <?php if($locatario->getTipo() == 'P'){echo "checked";}?>> Professor
    <div class="centro">
        <input type="submit"  value="Alterar Cadastro">
    </div>
</form> 