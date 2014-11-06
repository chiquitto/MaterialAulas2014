<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$periodo = (int) $_GET['periodo'];

$sql = 'Select
v.idvenda,
c.idcliente,
v.data vendaData,
c.nome cliente,
vi.preco,
vi.precopago,
vi.qtd
From venda v
Inner Join cliente c
On c.idCliente = v.idCliente
Inner Join vendaitem vi
On vi.idvenda = v.idvenda';

// Where
$where = array();
$where[] = "(v.status = '" . VENDA_FECHADA . "')";

# http://php.net/manual/en/function.strtotime.php
# http://php.net/manual/en/datetime.formats.relative.php
// $periodo = 1;
// $where[] = "(v.data >='" . date('Y-m-d', $periodo) . "')";


$sql .= "\nWhere ".join(' and ',$where);

// Group By

echo '<pre>' . $sql . '</pre>';

exit;

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compras - Valor de venda x Valor pago</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-reorder"></i> Compras - Valor de venda x Valor pago</h1>
</div>

<div class="panel panel-default">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Cliente</th>
        <th>Data</th>
        <th>Valor de venda</th>
        <th>Valor pago</th>
        <th>Diferença</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $consulta = mysqli_query($con,$sql);
        while($resultado = mysqli_fetch_assoc($consulta)){
          $vendaData = strtotime($resultado['data']);
          $vendaDifValores = 0;
      ?>
      <tr>
        <td><?php echo $resultado['idvenda']; ?></td>
        <td><?php echo $resultado['clienteNome']; ?></td>
        <td><?php echo $vendaData; ?></td>
        <td>R$ <?php echo number_format($resultado['valorVenda'], 2, ",", "."); ?></td>
        <td>R$ <?php echo number_format($resultado['valorPago'], 2, ",", "."); ?></td>
        <td>R$ <?php echo number_format($vendaDifValores, 2, ",", "."); ?></td>
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