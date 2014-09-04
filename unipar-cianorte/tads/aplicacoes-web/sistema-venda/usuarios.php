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
    <title>Usuários</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-user"></i> Usuários</h1>
</div>

<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">Usuários</h3>
    
    <div class="btn-group pull-right">
      <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bars fa-lg"></i>
      </button>
      <ul class="dropdown-menu slidedown">
        <li>
            <a href="usuarios-cadastrar.php">
                <i class="fa fa-plus fa-fw"></i> Novo usuário
            </a>
        </li>
      </ul>
    </div>
  </div>
  
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
        <th>Nome</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "Select idusuario, nome, email, status from usuario";
        $array = array();
        if($q != ''){
          $array[] = "((nome like '%$q%') or (email like '%$q%'))";
        }
        if($array){
          $sql .= " Where ".join(' or ', $array);   
        }
        
        $consulta = mysqli_query($con,$sql);
        while( $resultado = mysqli_fetch_assoc($consulta)){
      ?>
      <tr>
        <td><?php echo $resultado['idusuario'];   ?></td>
        <td>
          <?php if($resultado['status'] == USUARIO_ATIVO){  ?>
          <span class="label label-success">ativo</span>
          <?php } else { ?>
          <span class="label label-warning">inativo</span>
          <?php } ?>
        </td>
        <td><?php echo $resultado['nome'];?></td>
        <td><?php echo $resultado['email'];?></td>
        <td>
            <a href="usuarios-editar.php?idusuario=<?php echo $resultado['idusuario'];?>" title="Editar produto"><i class="fa fa-edit fa-lg"></i></a>
            <a href="usuarios-senha.php?idusuario=<?php echo $resultado['idusuario'];?>" title="Alterar senha"><i class="fa fa-lock fa-lg"></i></a>
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