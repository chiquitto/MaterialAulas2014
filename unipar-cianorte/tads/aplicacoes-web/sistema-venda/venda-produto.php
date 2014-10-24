<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msgOk = array();
$msgAviso = array();

$idvenda = $_SESSION['idvenda'];

$sql = "Select
	venda.data,
	cliente.nome clienteNome,
	usuario.nome usuarioNome
From venda
Inner Join cliente
  On venda.idcliente = cliente.idcliente
Inner Join usuario
  On venda.idusuario = usuario.idusuario
Where venda.idvenda = $idvenda";

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

if ($acao == 1){
  $idproduto = $_POST['idproduto'];
  $precoPago = $_POST['preco'];
  $qtd = $_POST['qtd'];
  
  
  $consulta = "Select preco from produto where idproduto = $idproduto";
  $executa = mysqli_query($con, $consulta);
  $resultado = mysqli_fetch_assoc($executa);
  
  $preco = $resultado['preco'];
  
  $sql = "Insert into vendaitem values($idproduto,$idvenda,$preco, $precoPago, $qtd)";
  
  $executa = mysqli_query($con, $sql);
  
  $msgOK[] = "Produto inserido com sucesso!";
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
  <h1><i class="fa fa-shopping-cart"></i> Andamento da venda #<?php echo $_SESSION['idvenda']; ?></h1>
</div>

<?php if ($msgOk) { msgHtml($msgOk, 'success'); } ?>
<?php if ($msgAviso) { msgHtml($msgAviso, 'warning'); } ?>

<form role="form" method="post" action="venda-produto.php">
  
  <input type="hidden" name="acao" value="1">
  
  <div class="panel panel-default">
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
  
<div class="panel panel-default">
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
      $consulta = "select vendaitem.qtd, produto.produto, vendaitem.preco, vendaitem.precopago, produto.idproduto from vendaitem inner join produto on vendaitem.idproduto = produto.idproduto where vendaitem.idvenda = {$_SESSION['idvenda']}";

$executa = mysqli_query($con, $consulta);
$vendaTotal = 0;
while($resultado = mysqli_fetch_assoc($executa)){
  $produtoTotal = $resultado['precopago']* $resultado['qtd'];
  $vendaTotal += $produtoTotal;
      ?>
      <tr>
        <td><?php echo $resultado['qtd'];?></td>
        <td><?php echo $resultado['produto'];?></td>
        <td><?php echo $resultado['precopago'];?></td>
        <td><?php echo $produtoTotal;?></td>
        <td><a href="venda-produto.php?acao=2&idproduto=<?php $resultado['idproduto']?>" title="Remover produto da venda"><i class="fa fa-times fa-lg"></i></a></td>
      </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th colspan="2">Total da venda</th>
        <th>R$ <?php echo $vendaTotal; ?></th>
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
      
      <?php
      $dtVenda = strtotime($venda['data']);
      ?>
      
      <label for="fcliente" class="col-sm-2 control-label">Data:</label>
      <div class="col-sm-2">
        <p class="form-control-static">
          <?php echo date('d/m/Y', $dtVenda); ?>
        </p>
      </div>
      
      <label for="fcliente" class="col-sm-2 control-label">Total:</label>
      <div class="col-sm-2">
        <p class="form-control-static"><?php echo $vendaTotal; ?></p>
      </div>
    </div>
    
    <div class="form-group">
      <label for="fcliente" class="col-sm-2 control-label">Cliente:</label>
      <div class="col-sm-4">
        <p class="form-control-static">{{Nome do cliente}}</p>
      </div>
      
      <label for="fcliente" class="col-sm-2 control-label">CPF:</label>
      <div class="col-sm-4">
        <p class="form-control-static">{{CPF do cliente}}</p>
      </div>
    </div>
    
    <div class="form-group">
      <label for="fcliente" class="col-sm-2 control-label">Vendedor:</label>
      <div class="col-sm-4">
        <p class="form-control-static">{{Nome do vendedor}}</p>
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