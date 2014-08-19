<?php

require '../config.php';

$con = Conexao::getInstance();

$idCidade = $_GET['id'];

$sqlCidade = "
	select * from cidade
	where idcidade = :cidade
";


$statement = $con->prepare($sqlCidade);
$statement->bindValue(':cidade', $idCidade, PDO::PARAM_INT);
$statement->execute();

if($statement -> rowCount() != 1){
	header("HTTP/1.0 404 Not found");
	exit();
}

$row = $statement->fetch(PDO::FETCH_ASSOC);



echo json_encode($row);



