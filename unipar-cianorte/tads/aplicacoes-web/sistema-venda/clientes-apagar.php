<?php

require './protege.php';
require './config.php';
require './lib/conexao.php';
require './lib/funcoes.php';

if(isset($_GET['idcliente'])){
    $idcliente= (int) $_GET['idcliente'];
}
else{
    echo 'Código invalido';
    exit;
}
$sql = "delete from cliente where idcliente = $idcliente";
$deletar = mysqli_query($con, $sql);

if(mysqli_affected_rows($con)==1){
    $msg = "Registro $idcliente eliminado" ;
}
else{
    $msg = 'Registro não encontrado';
}
$url = 'clientes.php';

javaScriptAlertFim($msg, $url);
?>



