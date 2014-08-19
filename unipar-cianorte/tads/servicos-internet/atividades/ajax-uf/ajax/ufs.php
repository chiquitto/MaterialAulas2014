<?php

require '../config.php';

$con = Conexao::getInstance();

$sqlUf = "
			Select * from uf
		";

$row = $con->query($sqlUf);

$linha = $row->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($linha);

sleep(2);
