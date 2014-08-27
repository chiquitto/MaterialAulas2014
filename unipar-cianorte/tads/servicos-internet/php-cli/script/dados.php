<?php

$con = new PDO('mysql:host=localhost;dbname=cidade', 'root', '123456');
$con->exec("SET CHARACTER SET utf8");

$tabelas = $con->query('SHOW TABLES');

$backup = '';

while ($tabela = $tabelas->fetch()) {
    $nomeTabela = $tabela[0];
    
    $resultado = $con->query("Show Create Table $nomeTabela");
    $criarTabela = $resultado->fetch();
    
    $backup .= $criarTabela[1] . ";" . PHP_EOL . PHP_EOL;
    
    $dados = $con->query("Select * From $nomeTabela");
    
    while ($dado = $dados->fetch(PDO::FETCH_ASSOC)) {
        $sql = "INSERT INTO $nomeTabela VALUES ('"
                . join("', '", $dado)
                . "');";
        $backup .= $sql . PHP_EOL;
    }
}

file_put_contents('backup.sql', $backup);