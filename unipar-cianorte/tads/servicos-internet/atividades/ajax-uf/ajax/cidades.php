<?php

require '../config.php';

$con = Conexao::getInstance();

$uf = $_GET['uf'];

$sqlCidades = "
				select * from cidade
				where iduf = :uf
			";


$statement = $con->prepare($sqlCidades);
$statement->bindValue(':uf', $uf, PDO::PARAM_STR);
$statement->execute();

$row = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($row); 

//