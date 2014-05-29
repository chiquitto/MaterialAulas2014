<?php

require './config.php';
require './lib/conexao.php';

if ($_POST) {
  // Validar informacoes
  // Salvar informacoes
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

<form role="form" method="post" action="cadastrar-cliente.php">
  <div class="form-group">
    <label for="fnome">Nome</label>
    <input type="text" class="form-control" id="fnome" name="nome" placeholder="Nome completo">
  </div>
  <div class="form-group">
    <label for="femail">Email</label>
    <input type="email" class="form-control" id="femail" name="email" placeholder="email@email.com">
  </div>
  <div class="form-group">
    <label for="ffoto">Foto do cliente</label>
    <input type="file" id="ffoto" name="foto">
    <p class="help-block">Somente foto em JPG.</p>
  </div>
  <div class="checkbox">
    <label for="fativo">
      <input type="checkbox" name="ativo" id="fativo" checked> Cliente ativo
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