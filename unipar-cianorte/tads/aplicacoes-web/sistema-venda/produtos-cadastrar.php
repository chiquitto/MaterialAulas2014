<?php

require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();
$descricao = '';
$preco = '';
$ativo = PRODUTO_ATIVO;
$idcategoria = 0;
$saldo = 0;

if ($_POST) {
  // Pegar informações
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $saldo = (int) $_POST['saldo'];
  $idcategoria = (int) $_POST['idcategoria'];

  if(isset($_POST['ativo'])){
    $ativo = PRODUTO_ATIVO;
  } else {
    $ativo = PRODUTO_INATIVO;
  }
    
  // Validar informações
  if ($descricao == ''){
    $msg[] = 'Informe a descrição do produto';
  }
  
  if ($idcategoria <= 0){
    $msg[] = 'Selecione a categoria';
  }
  // Inserir
  if (!$msg){
    $sql = "Insert Into produto
        (produto, preco, status, idcategoria, saldo)
        Values 
        ('$descricao', '$preco', '$ativo', $idcategoria, $saldo)";
    
    $resultado = mysqli_query($con, $sql);

    // Testar se foi inserido
    if (!$resultado) {
      $msg[] = 'Nao foi possivel inserir o registro.';
      $msg[] = mysqli_error($con); 
    } else {
      $idproduto = mysqli_insert_id($con);
      $url = 'produtos-editar.php?idproduto=' . $idproduto;
      $mensagem = 'Produto cadastrado!';

      javascriptAlertFim($mensagem, $url);
    }

  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar produtos</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-headphones"></i> Cadastrar produtos</h1>
</div>

<?php if ($msg) { msgHtml($msg); } ?>

<form role="form" method="post" action="produtos-cadastrar.php">
    
  <div class="form-group">
    <label for="fdescricao">Descrição</label>
    <input type="text" class="form-control" id="fdescricao" name="descricao" placeholder="Descrição do produto" value="<?php echo $descricao; ?>">
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
        <option value="0">Selecione a categoria</option>
        <?php 
$sql = 'Select idcategoria,categoria from categoria where (status = 1)';
$exec = mysqli_query($con, $sql);
while($r = mysqli_fetch_assoc($exec)){

        ?>
        <option value="<?php echo $r['idcategoria']; ?>" <?php if($idcategoria == $r['idcategoria']){?> selected <?php } ?>><?php echo $r['categoria'];?></option>
       <?php } ?>
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