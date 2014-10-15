<?php

require './protege.php';
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
    <title>Vendas</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-shopping-cart"></i> Vendas</h1>
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
        <?php
        $sql = "Select
	v.idvenda,
	v.data,
	c.nome clienteNome,
    v.status vendaStatus,
	(Select Sum(vi.preco * vi.qtd) From vendaitem vi Where (vi.idvenda = v.idvenda)) precoTotal
From venda v
Inner Join cliente c
	On (c.idcliente = v.idcliente)
Inner Join usuario u
	On (u.idusuario = v.idusuario)";
        
        $array = array();
        if($q != ''){
          $array[] = "(c.nome like '%$q%')";
        }
        if($q != ''){
          $array[] = "(u.nome like '%$q%')";
        }
        
        if($array){
          $sql .= " Where ".join(' or ', $array);   
        }
      
        $consulta = mysqli_query($con,$sql);
        while($resultado = mysqli_fetch_assoc($consulta)){
            $vendaData = strtotime($resultado['data']);
      ?>
      <tr>
        <td><?php echo $resultado['idvenda']; ?></td>
        <td>
          <?php if($resultado['vendaStatus'] == VENDA_FECHADA) { ?>
          <span class="label label-success">fechada</span>
          <?php } else { ?>
          <span class="label label-warning">aberta</span>
          <?php } ?>
        </td>
        <td><?php echo date('d/m/Y', $vendaData); ?></td>
        <td><?php echo $resultado['clienteNome']; ?></td>
        <td>R$ <?php echo number_format($resultado['precoTotal'], 2, ",", "."); ?></td>
        <td>
          <?php if($resultado['vendaStatus'] == VENDA_FECHADA) { ?>
          <a href="venda-detalhes.php?idvenda=<?php echo $resultado['idvenda']; ?>" title="Detalhes da venda"><i class="fa fa-align-justify fa-lg"></i></a>
          <?php } else { ?>
          <a href="venda-continuar.php?idvenda=<?php echo $resultado['idvenda']; ?>" title="Continuar venda"><i class="fa fa-play fa-lg"></i></a>
          <?php } ?>
        </td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
</div>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>