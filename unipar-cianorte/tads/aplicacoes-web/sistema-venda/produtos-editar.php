<?php

require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

if ($_POST) {
  $idproduto = (int) $_POST['idproduto'];
}
else {
  $idproduto = (int) $_GET['idproduto'];
}

$sql = "Select * From produto
Where (idproduto = $idproduto)";

$r = mysqli_query($con, $sql);

if ($r->num_rows == 0) {  
    $url = 'produtos.php';
    $msg = "Registro inexistente.";
    javascriptAlertFim($msg, $url);
}

$produto = mysqli_fetch_assoc($r);

$descricao = $produto['produto'];
$preco = $produto['preco'];
$saldo = $produto['saldo'];
$ativo = $produto['status'];

if ($_POST) {
  // Pegar informações
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $saldo = (int) $_POST['saldo'];

  if(isset($_POST['ativo'])){
    $ativo = PRODUTO_ATIVO;
  } else {
    $ativo = PRODUTO_INATIVO;
  }
    
  // Validar informações
  if ($descricao == ''){
    $msg[] = 'Informe a descrição do produto';
  }
    
  // Inserir
  if (!$msg){
    $sql = "Update produto
        Set produto = '$descricao',
            preco = '$preco',
            status = '$ativo',
            idcategoria = 1,
            saldo = $saldo
        Where (idproduto = $idproduto)";
    
    $r = mysqli_query($con, $sql);

    if (!$r) {
      $msg[] = 'Erro para atualizar o registro';
      $msg[] = mysqli_error($con);
    }
    else {
      $url = 'produtos-editar.php?idproduto=' . $idproduto;
      $msg = "Produto $idproduto alterado.";

      javascriptAlertFim($msg, $url);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar produtos</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-headphones"></i> Editar produtos</h1>
</div>

<?php if ($msg) { msgHtml($msg); } ?>

<form role="form" method="post" action="produtos-editar.php">
  
  <input type="hidden" name="idproduto" value="<?php echo $idproduto; ?>">
    
  <div class="form-group">
    <label for="fdescricao">Descrição</label>
    <input type="text" class="form-control" id="fdescricao" name="descricao" placeholder="Descrição do produto" value="<?php echo $descricao; ?>" required>
  </div>
    
  <div class="form-group">
    <label for="fpreco">Preço</label>
    <div class="input-group">
      <span class="input-group-addon">R$</span>
      <input type="text" class="form-control" id="fpreco" name="preco" placeholder="Preço" value="<?php echo $preco; ?>" required>
    </div>
  </div>
    
  <div class="form-group">
    <label for="fcategoria">Categoria</label>
    <select id="fcategoria" name="idcategoria" class="form-control" required>
        <option value="0">Selecine a categoria</option>
        <option value="1">Calça</option>
        <option value="2">Camiseta</option>
        <option value="3">Shorts</option>
    </select>
  </div>
    
  <div class="form-group">
    <label for="fsaldo">Saldo</label>
    <input type="number" class="form-control" id="fsaldo" name="saldo" placeholder="Estoque" value="<?php echo $saldo; ?>" required>
  </div>

  <div class="checkbox">
    <label for="fativo">
      <input type="checkbox" name="ativo" id="fativo" <?php if ($ativo == 1){?>checked<?php } ?>> Produto ativo
    </label>
  </div>
    
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>
</form>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>