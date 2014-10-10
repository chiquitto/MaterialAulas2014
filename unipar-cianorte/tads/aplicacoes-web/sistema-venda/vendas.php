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
    <title>Vendas</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-camera"></i> Vendas</h1>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Vendas</div>
  <div class="panel-body">
    <form class="form-inline" role="form" method="get" action="">
      <div class="form-group">
        <label class="sr-only" for="fq">Pesquisa</label>
        <input type="search" class="form-control" id="fq" name="q" placeholder="Pesquisa" value="<?php echo $q; ?>">
      </div>
      <button type="submit" class="btn btn-default">Pesquisar</button>
    </form>
  </div>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th></th>
        <th>Data</th>
        <th>Cliente</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>
          <span class="label label-success">fechada</span>
          <span class="label label-warning">aberta</span>
        </td>
        <td>10/10/2014</td>
        <td>Zé da silva</td>
        <td>R$ 1.000,00</td>
        <td>
          <a href="#" title="Continuar venda"><i class="fa fa-play fa-lg"></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>