<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msgOk = array();
$msgAviso = array();

if (!isset($_SESSION['idvenda'])) {
  header('location:vendas.php');
  exit;
}

$idvenda = $_SESSION['idvenda'];

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
    And (v.status = " . VENDA_ABERTA . ")";
$consulta = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($consulta);

if (!$venda) {
  header('location:vendas.php');
  exit;
}

/*
Valores para acao
1 = Incluir produto na venda
2 = Remover produto na venda
*/
$acao = 0;
if (isset($_GET['acao'])) {
  $acao = (int) $_GET['acao'];
}
elseif (isset($_POST['acao'])) {
  $acao = (int) $_POST['acao'];
}

if ($acao == 1) {
    $idproduto = (int) $_POST['idproduto'];
    
    $sql = "Select * From produto Where (idproduto = $idproduto)";
    $consulta = mysqli_query($con, $sql);
    $produto = mysqli_fetch_assoc($consulta);
    
    $precoProduto = $produto['preco'];
    $precoPago = $_POST['preco'];
    $qtd = $_POST['qtd'];
    
    $sql = "INSERT INTO vendaitem
(idproduto, idvenda, preco, precopago, qtd)
VALUES
($idproduto, $idvenda, $precoProduto, $precoPago, $qtd)";
    $inserir = mysqli_query($con, $sql);
    
    if ($inserir) {
        $msgOk[] = "Adicionado $qtd x " . $produto['produto'];
    }
    else {
        $msgAviso[] = "Erro para inserir o produto na venda: " . mysqli_error($con);
    }
}

if ($acao == 2) {
    $idproduto = (int) $_GET['idproduto'];
    
    $sql = "Delete From vendaitem Where (idproduto = $idproduto)";
    $consulta = mysqli_query($con, $sql);
    
    $msgOk[] = "Produto removido da venda";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos da venda</title>

    <?php headCss(); ?>
  </head>
  <body>
      
<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-shopping-cart"></i> Andamento da venda #<?php echo $idvenda; ?></h1>
</div>

<?php if ($msgOk) { msgHtml($msgOk, 'success'); } ?>
<?php if ($msgAviso) { msgHtml($msgAviso, 'warning'); } ?>

<form role="form" method="post" action="venda-produto.php">
  
  <input type="hidden" name="acao" value="1">
  
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Adicionar produto</h3>
    </div>

    <div class="panel-body">

      <div class="container-fluid">
        <div class="row">

          <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="form-group">
              <label for="fidproduto">Produto</label>
              <select id="fidproduto" name="idproduto" class="form-control" required>
                <option value="">Selecione um produto</option>
                <?php
                $sql = 'Select * From produto Where status=' . PRODUTO_ATIVO;
                $result = mysqli_query($con,$sql);
                while($linha = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $linha['idproduto']; ?>"><?php echo $linha['produto'];?> (R$ <?php echo number_format($linha['preco'], 2, ",", "."); ?>)</option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-xs-12 col-sm-3 col-md-2">
            <div class="form-group">
              <label for="fqtd">Quantidade</label>
              <input type="number" class="form-control" id="fqtd" value="0" name="qtd" min="1" required>
            </div>
          </div>

          <div class="col-xs-12 col-sm-3 col-md-2">
            <div class="form-group">
              <label for="fpreco">Preço unitário</label>
              <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" class="form-control" id="fpreco" name="preco" required>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="panel-footer">
      <button type="submit" class="btn btn-primary">Inserir</button>
      <button type="reset" class="btn btn-danger">Limpar</button>
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
        <th></th>
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
        <td><a href="venda-produto.php?acao=2&idproduto=<?php echo $produto['idproduto']; ?>" title="Remover produto da venda"><i class="fa fa-times fa-lg"></i></a></td>
      </tr>
        <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th colspan="2">Total da venda</th>
        <th>R$ <?php echo number_format($vendaTotal, 2, ',', '.'); ?></th>
        <th></th>
      </tr>
    </tfoot>
  </table>
</div>
  
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
  
  <div class="panel-footer">
    <button type="submit" class="btn btn-success">Fechar venda</button>
  </div>
</div>
</form>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>