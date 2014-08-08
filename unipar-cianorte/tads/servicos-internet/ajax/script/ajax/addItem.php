<?php

// sleep(3);

require '../config.php';

$con = Conexao::getInstance();

$retorno = array("codigo" => 0, "mensagem" => '');

$codProd = $_POST['codProduto'];
$qtdeProd = $_POST['qtd'];

if($qtdeProd <= 0){
    $retorno['codigo'] = 1;
    $retorno['mensagem'] = 'A quantidade não pode ser igual a zero';
    echo json_encode($retorno);
    exit;
}

$sql = 'select saldo from produto where idproduto = :codProd AND'
        . ' saldo >= :qtdeProd';
$statement = $con->prepare($sql);
$statement->bindValue(':codProd', $codProd, PDO::PARAM_INT);
$statement->bindValue(':qtdeProd', $qtdeProd, PDO::PARAM_INT);
$statement->execute();


    if($statement->rowCount() != 1){
        $retorno['codigo'] = 2;
        $retorno['mensagem'] = 'Quantidade maior que o estoque';
        echo json_encode($retorno);
        exit;
    }
    



$sql = 'update produto set saldo = saldo - :qtde 
		where idproduto = :COD';

$statement = $con->prepare($sql);
$statement->bindValue(':qtde', $qtdeProd, PDO::PARAM_INT);
$statement->bindValue(':COD', $codProd, PDO::PARAM_INT);
$statement->execute();

echo json_encode($retorno);

?>