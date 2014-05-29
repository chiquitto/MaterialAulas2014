<?php

require './config.php';
require './lib/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>

    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/estilos.css" rel="stylesheet">
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1>Clientes</h1>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Email</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>