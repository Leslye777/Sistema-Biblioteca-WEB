<?php
    include '../controller/Usuario.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $user = new Usuario(NULL, NULL, NULL, NULL, NULL, NULL, $id);
        $user->consultarUsuario();
    }
?>
<h1>Cadastro Usuário</h1>
<form action="../controller/ConAlteraUsuario.php" method="POST" class="telasAlteracao">
    <label for="id">Código do usuário:</label>
    <input type="text" name="id" value="<?php echo $user->getId(); ?>" readonly>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $user->getNome()?>" required >
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="<?php echo $user->getTelefone()?>" required>
    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" value="<?php echo $user->getEndereco()?>" required>
    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" class="cpf" maxlength="11" onpaste="return false" value="<?php echo $user->getCpf()?>" required readonly>
    <label for="sexo">Sexo:</label>
    <?php  ?>
    <input type="radio" name="sexo" value="M" <?php if($user->sexo == 'M'){echo "checked";}?>> Masculino
        <input type="radio" name="sexo" value="F" <?php if($user->sexo == 'F'){echo "checked";}?>> Feminino
    <div class="centro">
        <input type="submit"  value="Alterar Cadastro">
    </div>
</form> 