<?php

// sleep(3);

require '../config.php';

$con = Conexao::getInstance();

$codProd = $_POST['codProduto'];
$qtdeProd = $_POST['qtd'];

$sql = 'update produto set saldo = saldo - :qtde 
		where idproduto = :COD';

$statement = $con->prepare($sql);
$statement->bindValue(':qtde', $qtdeProd, PDO::PARAM_INT);
$statement->bindValue(':COD', $codProd, PDO::PARAM_INT);
$statement->execute();

echo '{}';

?>