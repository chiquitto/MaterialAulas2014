<?php

require './config.php';
require './lib/conexao.php';

$msg = array();

// clientes-editar.php?idcliente=1

if ($_POST) {
  $idcliente = (int) $_POST['idcliente'];
}
else {
  $idcliente = (int) $_GET['idcliente'];
}

$sql = "Select * From cliente
Where (idcliente = $idcliente)";

$r = mysqli_query($con, $sql);

if ($r->num_rows == 0) {
  echo 'Registro inexistente';
  exit;
}

$cliente = mysqli_fetch_assoc($r);

$nome = $cliente['nome'];
$email = $cliente['email'];
$ativo = $cliente['ativo'];

if ($_POST) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  if (!isset($_POST['ativo'])) {
    $ativo = CLIENTE_INATIVO;
  }
  else {
    $ativo = CLIENTE_ATIVO;
  }

  // Validar informacoes
  if ($nome == '') {
    $msg[] = 'Informe o nome completo';
  }
  if ($email == '') {
    $msg[] = 'Informe um endereço de email';
  }

  if (!$msg) {
    // Salvar informacoes
    $sql = "Update cliente Set
    nome = '$nome',
    email = '$email',
    ativo = '$ativo'
    Where (idcliente = $idcliente)";

    $r = mysqli_query($con, $sql);

    if (!$r) {
      $msg[] = 'Erro para inserir o registro';
      $msg[] = mysqli_error($con);
    }
    else {
      echo "Cadastrou";
      exit;
    }
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar clientes</title>

    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/estilos.css" rel="stylesheet">
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1>Cadastrar clientes</h1>
</div>

<?php if ($msg) { msgHtml($msg); } ?>

<form role="form" method="post" action="clientes-editar.php">

  <input name="idcliente" value="<?php echo $idcliente; ?>" type="hidden">

  <div class="form-group">
    <label for="fnome">Nome</label>
    <input type="text" class="form-control" id="fnome" name="nome" placeholder="Nome completo" value="<?php echo $nome; ?>">
  </div>
  <div class="form-group">
    <label for="femail">Email</label>
    <input type="email" class="form-control" id="femail" name="email" placeholder="email@email.com" value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <label for="ffoto">Foto do cliente</label>
    <input type="file" id="ffoto" name="foto">
    <p class="help-block">Somente foto em JPG.</p>
  </div>
  <div class="checkbox">
    <label for="fativo">
      <input type="checkbox" name="ativo" id="fativo"<?php if ($ativo == CLIENTE_ATIVO) { ?> checked<?php } ?>> Cliente ativo
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>
</form>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>