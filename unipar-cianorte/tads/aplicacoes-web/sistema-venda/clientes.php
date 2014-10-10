<?php

require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$q ='';
if(isset($_GET['q'])){
  $q =trim($_GET['q']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-heart"></i> Clientes</h1>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Clientes</div>
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
        <th>Nome</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "select * from cliente";
        if($q != ''){
          $sql .= " where nome like '%$q%'"; 
        }
      
        $consulta = mysqli_query($con,$sql);
        while( $resultado = mysqli_fetch_assoc($consulta)){
      ?>
      <tr>
        <td><?php echo $resultado['idcliente'];   ?></td>
        <td>
          <?php if($resultado['ativo'] == CLIENTE_ATIVO){  ?>
          <span class="label label-success">ativo</span>
          <?php } else { ?>
          <span class="label label-warning">inativo</span>
          <?php } ?>
        </td>
        <td><?php echo $resultado['nome']; ?></td>
        <td>
          <a href="clientes-editar.php?idcliente=<?php echo $resultado['idcliente'];?>" title="Editar cliente"><i class="fa fa-edit fa-lg"></i></a>
          <a href="clientes-apagar.php?idcliente=<?php echo $resultado['idcliente'];?>" title="Remover cliente"><i class="fa fa-times fa-lg"></i></a>
          <a href="venda-nova.php?idcliente=<?php echo $resultado['idcliente'];?>" title="Nova Venda"><i class="fa fa-camera fa-lg"></i></a>
        </td>
      </tr><?php
    }
      ?>
    </tbody>
  </table>
</div>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>