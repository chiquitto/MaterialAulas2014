<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

if (isset($_POST['logado'])) {
	$logado = true;
}
else {
	$logado = false;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tela de login</title>
  <meta charset="utf-8">
</head>
<body>

	<h1>Informações do formulário</h1>

	<p>Email: <?php echo $email; ?></p>
	<p>Senha: <?php echo $senha; ?></p>
	<p>Permanecer logado:
		<?php if($logado){ ?>
		Sim
		<?php } else { ?>
		Não
		<?php } ?>
	</p>

</body>
</html>