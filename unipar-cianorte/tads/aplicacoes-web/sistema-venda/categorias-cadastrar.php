<?php

require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

if ($_POST) {
  // Pegar os dados informados pelo usuario
  $categoria = $_POST['categoria'];
  if(!isset($_POST['ativo']))
  {
    $ativo = 0;
  }else
  {
    $ativo = 1;
  }
    // Validar os dados
  if ($categoria == '')
  {
    $msg[] = 'Informe a Categoria';
  }
  // Se os dados estiverem corretos, salvar no BD
  if (!$msg)
  {
    $sql = "INSERT into categoria
    (categoria, status)values
    ('$categoria','$ativo')";
  
  $r = mysqli_query($con, $sql);
  if (!$r){
    $msg[] = 'Erro ao Salvar';
    $msg[] = mysqli_error($con);
  }else{
    $registrook = 'sua categoria foi salva';
    $registroid = mysqli_insert_id($con);

    $url = 'categorias-editar.php?idcategoria='.$registroid;

    javascriptAlertFim($registrook, $url);
  }
  }

  // Se os dados foram salvos, mostrar mensagem pro usuario
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar categorias</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-cubes"></i> Cadastrar categorias</h1>
</div>

<?php if ($msg) { msgHtml($msg); } ?>

<form role="form" method="post" action="categorias-cadastrar.php">
    
  <div class="form-group">
    <label for="fcategoria">Categoria</label>
    <input type="text" class="form-control" id="fcategoria" name="categoria" placeholder="Nome da categoria">
  </div>

  <div class="checkbox">
    <label for="fativo">
      <input type="checkbox" name="ativo" id="fativo"> Categoria ativa
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