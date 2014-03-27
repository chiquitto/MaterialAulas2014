<?php
if (isset($this->dados['erro'])) {
   
?>

<p><?php echo $this->dados['erro']; ?></p>

<?php  
}
?>

<form action="cadastrar-usuarios.php" method="POST">
    <p>
        Nome: <input type="text" name="nome">
    </p>
    <p>
        Email: <input type="email" name="email">
    </p>
    <p>
        Login: <input type="text" name="login">
    </p>
    <p>
        Senha: <input type="password" name="senha">
    </p>
    
    <input type="submit" value="Cadastrar">
</form>