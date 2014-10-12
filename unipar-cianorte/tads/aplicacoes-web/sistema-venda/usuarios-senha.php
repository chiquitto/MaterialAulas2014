<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

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

if ($_POST) {
    $senha = trim($_POST['senha']);
    $senha2 = trim($_POST['senha2']);
    
    if ($senha == '') {
        $msg[] = "Insira uma senha para o usuário";
    }
    if ($senha != $senha2){
        $msg[] = "As senhas não coferem digite novamente";
    }
    
    if (!$msg) {
        $sql = "Update usuario set senha = '$senha' where idusuario = $idusuario";
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
        <title>Alterar senha de usuário</title>

        <?php headCss(); ?>
    </head>
    <body>

        <?php include 'nav.php'; ?>

        <div class="container">

            <div class="page-header">
                <h1><i class="fa fa-lock"></i> Alterar senha do usuário <?php echo $idusuario; ?></h1>
            </div>

            <?php if ($msg) { msgHtml($msg); } ?>

            <form role="form" method="post" action="usuarios-senha.php">
        <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">   
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-6">
                        <label for="fsenha">Senha</label>
                        <input type="password" class="form-control" id="fsenha" name="senha" placeholder="Senha do usuário">
                    </div>

                    <div class="form-group col-xs-6">
                        <label for="fsenha2">Repita a senha</label>
                        <input type="password" class="form-control" id="fsenha2" name="senha2" placeholder="Confirme a senha">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>

        </div>

        <script src="./lib/jquery.js"></script>
        <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>