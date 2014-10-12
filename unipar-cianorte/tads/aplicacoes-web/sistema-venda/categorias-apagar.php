<?php

require './protege.php';
require './config.php';
require './lib/conexao.php';
require './lib/funcoes.php';

if(isset($_GET['idcategoria'])){
    $idcategoria = (int) $_GET['idcategoria'];
}
else{
    echo 'Categoria não encontrada';
    exit;
}

$sql = "select count(*) as quantidade from produto where idcategoria = $idcategoria";
$consulta = mysqli_query($con, $sql);
$resultado = mysqli_fetch_assoc($consulta);
if($resultado['quantidade'] >0){
    $msg = 'Não é possivel eliminar esta categoria pois existem produtos relacionados a ela';
}
else{
    $sql = "delete from categoria where idcategoria = $idcategoria";

    $deletar = mysqli_query($con, $sql);

    if(mysqli_affected_rows($con)==1){
        $msg = "Registro $idcategoria eliminado";
    }
    else{
        $msg = 'Registro não encontrado';
    }
}
$url = 'categorias.php';
javaScriptAlertFim($msg, $url);
?>