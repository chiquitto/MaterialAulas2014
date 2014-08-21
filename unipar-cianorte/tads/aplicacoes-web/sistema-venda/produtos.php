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
    <title>Produtos</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-headphones"></i> Produtos</h1>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Produtos</div>
  <div class="panel-body">
    <form class="form-inline" role="form" method="get" action="">
      <div class="form-group">
        <label class="sr-only" for="fq">Pesquisa</label>
        <select class="form-control" name="idcategoria">
            <option value="0">Categoria</option>
        </select>
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
        <th>Categoria</th>
        <th>Nome</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "Select * From produto";
        if($q != ''){
          $sql .= " Where (produto like '%$q%')";
        }
      
        $consulta = mysqli_query($con,$sql);
        while( $resultado = mysqli_fetch_assoc($consulta)){
      ?>
      <tr>
        <td><?php echo $resultado['idproduto'];   ?></td>
        <td>
          <?php if($resultado['status'] == PRODUTO_ATIVO){  ?>
          <span class="label label-success">ativo</span>
          <?php } else { ?>
          <span class="label label-warning">inativo</span>
          <?php } ?>
        </td>
        <td>{categoria}</td>
        <td><?php echo $resultado['produto']; ?></td>
        <td>
          <a href="produtos-editar.php?idproduto=<?php echo $resultado['idproduto'];?>" title="Editar produto"><i class="fa fa-edit fa-lg"></i></a>
          <a href="produtos-apagar.php?idproduto=<?php echo $resultado['idproduto'];?>" title="Remover produto"><i class="fa fa-times fa-lg"></i></a>
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