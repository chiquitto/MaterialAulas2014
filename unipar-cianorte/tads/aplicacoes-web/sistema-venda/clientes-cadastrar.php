<?php

require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

$nome = '';
$email = '';
$ativo = CLIENTE_ATIVO;

if ($_POST) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  if (!isset($_POST['ativo'])) {
    $ativo = CLIENTE_INATIVO;
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
    $sql = "Insert into cliente
    (nome, email, ativo) Values
    ('$nome', '$email', '$ativo')";

    $r = mysqli_query($con, $sql);

    if (!$r) {
      $msg[] = 'Erro para inserir o registro';
      $msg[] = mysqli_error($con);
    }
    else {
      $idcliente = mysqli_insert_id($con);

      $url = 'clientes-editar.php?idcliente=' . $idcliente;
      $msg = "Cliente $idcliente criado.";

      javascriptAlertFim($msg, $url);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar clientes</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-heart"></i> Cadastrar clientes</h1>
</div>

<?php if ($msg) { msgHtml($msg); } ?>

<form role="form" method="post" action="clientes-cadastrar.php">
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