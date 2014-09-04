<?php
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();
if (isset($_GET['idusuario'])) {
    $idusuario = (int) $_GET['idusuario'];
} else {
    $idusuario = (int) $_POST['idusuario'];
}

$sql = "Select * From usuario Where idusuario  = $idusuario";

$consulta = mysqli_query($con, $sql);
$retorno = mysqli_fetch_assoc($consulta);

if (!$retorno) {
    echo "Usuário inexistente";
    exit;
}

$nome = $retorno['nome'];
$email = $retorno['email'];
$ativo = $retorno['status'];

if ($_POST) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    if (isset($_POST['ativo'])) {
        $status = USUARIO_ATIVO;
    } else {
        $status = USUARIO_INATIVO;
    }
    
    if ($nome == '') {
        $msg[] = "Insira um nome";
    }
    if (strlen($nome) < 3) {
        $msg[] = "O campo Nome deve conter no minimo 3 caracteres";
    }
    if ($email == '') {
        $msg[] = "Insira um endereço de email correto";
    }
    
    if (!$msg) {
        $sql = "Update usuario set nome = '$nome', email = '$email', status = $status where idusuario = $idusuario";
        $gravou = mysqli_query($con, $sql);
        if ($gravou) {
            $msg[] = "Registro atualizado";
        } else {
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
        <title>Alterar cadastro de usuário</title>

<?php headCss(); ?>
    </head>
    <body>
        
<?php include 'nav.php'; ?>

<div class="container">

    <div class="page-header">
        <h1><i class="fa fa-user"></i> Editar usuário</h1>
    </div>
        
    <?php if ($msg) { msgHtml($msg); } ?>

    <form role="form" method="post" action="usuarios-editar.php">
        <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">    

        <div class="form-group">
            <label for="fnome">Nome</label>
            <input type="text" class="form-control" id="fnome" name="nome" placeholder="Nome completo do usuário" value="<?php echo $nome; ?>">
        </div>

        <div class="form-group">
            <label for="femail">Email</label>
            <input type="email" class="form-control" id="femail" name="email" placeholder="Endereço de email" value="<?php echo $email; ?>">
        </div>

        <div class="checkbox">
            <label for="fativo">
                <input type="checkbox" name="ativo" id="fativo" <?php if ($ativo == USUARIO_ATIVO) { ?>checked<?php } ?>> Usuário ativo
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </form>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>