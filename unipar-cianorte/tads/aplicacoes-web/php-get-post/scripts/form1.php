<!DOCTYPE html>
<html>
<head>
  <title>Tela de login</title>
  <meta charset="utf-8">
</head>
<body>

	<h1>Tela de login</h1>

	<form action="form2.php" method="post" name="frm1">
		<fieldset>
			<legend>Informações para login</legend>
			<p>
				Email:
				<input type="email" name="email">
			</p>
			<p>
				Senha:
				<input type="password" name="senha">
			</p>
			<p>
				Manter-se logado:
				<input type="checkbox" name="logado" value="1">
			</p>
			<p>
				<input type="submit" name="entrar" value="Entrar">
			</p>
		</fieldset>
	</form>

</body>
</html>

