<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();
if (isset($_GET['idcategoria'])){
$idcategoria = $_GET['idcategoria'];  

}else{
  $idcategoria = $_POST['idcategoria'];
}


$sql = "select * from categoria where idcategoria  = $idcategoria";

$consulta = mysqli_query($con,$sql);
$retorno = mysqli_fetch_assoc($consulta);

if (!$retorno){
  echo "categoria não existe";
  exit;
}
$categoria = $retorno['categoria'];
$ativo = $retorno['status'];

if ($_POST) {
    $categoria = trim($_POST['categoria']);

    if(isset($_POST['ativo'])){
        $status = 1;

    }else{
        $status = 0;
    }
    if($categoria =='' ){
        $msg[] = "Insira uma categoria";
    }
    if(strlen($categoria)<3){
        $msg[] = "O campo deve conter no minimo 3 caracteres";
    }
    if(!$msg){
        $sql = "update categoria set categoria = '$categoria', status = $status where idcategoria = $idcategoria";
        $gravou = mysqli_query($con,$sql);
        if($gravou){
            $msg[] = "Registro atualizado";
        }else{
            $msg[] = "Falha ao atualizar dados";
            $msg[] = mysqli_error($con);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterar categoria</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-cubes"></i> Cadastrar categorias</h1>
</div>

<?php if ($msg) { msgHtml($msg); } ?>

<form role="form" method="post" action="categorias-editar.php">
<input type="hidden" name="idcategoria" value="<?php echo $idcategoria; ?>">    
 
 <div class="form-group">
    <label for="fcategoria">Categoria</label>
    <input type="text" class="form-control" id="fcategoria" name="categoria" placeholder="Nome da categoria" value="<?php echo $categoria; ?>">
  </div>

  <div class="checkbox">
    <label for="fativo">
      <input type="checkbox" name="ativo" id="fativo" <?php if ($ativo == 1){?>checked<?php } ?>> Categoria ativa
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