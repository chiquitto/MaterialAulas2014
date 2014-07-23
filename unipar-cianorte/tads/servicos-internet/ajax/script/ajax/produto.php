<?php

// sleep(3);

require '../config.php';

$con = Conexao::getInstance();

$sql = "Select
    produto,preco,saldo
    From produto
    Where (idproduto = :idproduto)";

$statement = $con->prepare($sql);
$statement->bindValue(':idproduto', $_GET['id'], PDO::PARAM_INT);
$statement->execute();

if ($statement->rowCount() != 1) {
    header("HTTP/1.0 404 Not Found");
    exit;
}

$produto = $statement->fetch(PDO::FETCH_ASSOC);

echo json_encode($produto);