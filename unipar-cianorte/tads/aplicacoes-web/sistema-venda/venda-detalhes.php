<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msgOk = array();
$msgAviso = array();

if (!isset($_GET['idvenda'])) {
  header('location:vendas.php');
  exit;
}

$idvenda = (int) $_GET['idvenda'];

$sql = "Select
	v.idvenda,
	v.data,
	c.nome clienteNome,
	u.nome usuarioNome
From venda v
Inner Join cliente c
	On (c.idcliente = v.idcliente)
Inner Join usuario u
	On (u.idusuario = v.idusuario)
Where
    (v.idvenda = $idvenda)
    And (v.status = " . VENDA_FECHADA . ")";
$consulta = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($consulta);

if (!$venda) {
  header('location:vendas.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes da venda</title>

    <?php headCss(); ?>
  </head>
  <body>
      
<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-shopping-cart"></i> Detalhes da venda #<?php echo $idvenda; ?></h1>
</div>

<?php if ($msgOk) { msgHtml($msgOk, 'success'); } ?>
<?php if ($msgAviso) { msgHtml($msgAviso, 'warning'); } ?>

<form class="form-horizontal" method="post" action="venda-fechar.php">
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Fechamento da venda</h3>
  </div>
  
  <div class="panel-body">
    
    <div class="form-group">
      <label for="fcliente" class="col-sm-2 control-label">Código:</label>
      <div class="col-sm-2">
        <p class="form-control-static"><?php echo $idvenda; ?></p>
      </div>
      
      <label for="fcliente" class="col-sm-2 control-label">Data:</label>
      <div class="col-sm-2">
          <p class="form-control-static"><?php echo date('d/m/Y', strtotime($venda['data'])); ?></p>
      </div>
      
      <label for="fcliente" class="col-sm-2 control-label">Total:</label>
      <div class="col-sm-2">
        <p class="form-control-static">R$ <?php echo number_format($vendaTotal, 2, ',', '.'); ?></p>
      </div>
    </div>
    
    <div class="form-group">
      <label for="fcliente" class="col-sm-2 control-label">Cliente:</label>
      <div class="col-sm-4">
        <p class="form-control-static"><?php echo $venda['clienteNome']; ?></p>
      </div>
      
      <label for="fcliente" class="col-sm-2 control-label">CPF:</label>
      <div class="col-sm-4">
        <p class="form-control-static">{{CPF do cliente}}</p>
      </div>
    </div>
    
    <div class="form-group">
      <label for="fcliente" class="col-sm-2 control-label">Vendedor:</label>
      <div class="col-sm-4">
        <p class="form-control-static"><?php echo $venda['usuarioNome']; ?></p>
      </div>
    </div>
    
  </div>
</div>
</form>
  
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Produtos da venda</h3>
  </div>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Qtd.</th>
        <th>Produto</th>
        <th>Preço unitário</th>
        <th>Preço total</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $sql = "Select
	v.idproduto,
	p.produto,
	v.precopago,
	v.qtd
From vendaitem v
Inner Join produto p
	On (p.idproduto = v.idproduto)
Where (v.idvenda = $idvenda)";
        $consulta = mysqli_query($con, $sql);
        
        $vendaTotal = 0;
        
        while($produto = mysqli_fetch_assoc($consulta)) {
            $total = $produto['qtd'] * $produto['precopago'];
            $vendaTotal += $total;
        ?>
      <tr>
        <td><?php echo $produto['qtd']; ?></td>
        <td><?php echo $produto['produto']; ?></td>
        <td>R$ <?php echo number_format($produto['precopago'], 2, ',', '.'); ?></td>
        <td>R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
      </tr>
        <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th colspan="2">Total da venda</th>
        <th>R$ <?php echo number_format($vendaTotal, 2, ',', '.'); ?></th>
      </tr>
    </tfoot>
  </table>
</div>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>