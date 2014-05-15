<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

if (isset($_POST['logado'])) {
	$logado = 'Permanecer logado';
}
else {
	$logado = 'Não permanecer logado';
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tela de informações</title>
  <meta charset="utf-8">
</head>
<body>

	<h1>Informações informadas</h1>

	<p>Email: <?php echo $email; ?></p>
	<p>Senha: <?php echo $senha; ?></p>
	<p>Permanecer logado: <?php echo $logado; ?></p>

</body>
</html>