<?php

$msg = '';
$email = '';
$logado = false;

if ($_POST) {
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	if (isset($_POST['logado'])) {
		$logado = true;
	}

	if ($email == '') {
		$msg .= 'Informe o seu email. ';
	}
	if ($senha == '') {
		$msg .= 'Informe a sua senha. ';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tela de login</title>
  <meta charset="utf-8">
</head>
<body>

	<h1>Tela de login</h1>

	<?php if ($msg != ''){ ?>
	<p><?php echo $msg; ?></p>
	<?php } ?>

	<form action="form3.php" method="post" name="frm1">
		<fieldset>
			<legend>Informações para login</legend>
			<p>
				Email:
				<input type="email" name="email" value="<?php echo $email; ?>">
			</p>
			<p>
				Senha:
				<input type="password" name="senha">
			</p>
			<p>
				Manter-se logado:
<input type="checkbox" name="logado" value="1"<?php if($logado){ ?> checked<?php } ?>>
			</p>
			<p>
				<input type="submit" name="entrar" value="Entrar">
			</p>
		</fieldset>
	</form>

</body>
</html>

