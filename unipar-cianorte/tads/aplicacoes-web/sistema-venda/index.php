<?php

require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TecInfo Unipar</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="jumbotron">
  <div class="container">
    <h1>TecInfo Unipar</h1>
    <p>Bem vindo Alisson Chiquitto</p>
    <p>
      <div class="btn-group">
        <a class="btn btn-primary btn-lg" role="button" href="clientes.php">
          <i class="fa fa-heart fa-lg"></i> Clientes
        </a>
      </div>

      <div class="btn-group">
        <a class="btn btn-primary btn-lg" role="button" href="produtos.php">
          <i class="fa fa-headphones fa-lg"></i>  Produtos
        </a>
      </div>

      <div class="btn-group">
        <a class="btn btn-primary btn-lg" role="button" href="vendas.php">
          <i class="fa fa-dashboard fa-lg"></i>  Vendas
        </a>
      </div>

      <div class="btn-group">
        <a class="btn btn-primary btn-lg" role="button" href="usuarios.php">
          <i class="fa fa-user fa-lg"></i>  Usuários
        </a>
      </div>

      <div class="btn-group">
        <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bar-chart-o fa-lg"></i>  Relatórios <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="rel-clientes.php">Clientes</a></li>
          <li><a href="rel-produtos.php">Produtos</a></li>
          <li><a href="rel-vendas.php">Vendas</a></li>
        </ul>
      </div>
    </p>
  </div>
</div>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>