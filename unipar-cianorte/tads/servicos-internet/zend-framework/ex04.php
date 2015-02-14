4) (1,0) Criar um script utilizando as classes do ZF para que atenda o fluxo abaixo:

a) Selecionar um registro (id=10) da tabela produto;
b) Se o registro existir, fazer um update neste registro: alterar o valor das colunas nome e dataAlteracao;
c) Se o registro não existir, então cadastra o novo produto (id,nome,dataAlteracao);


<?php

$produtoTb = new Application_Model_DbTable_Produto();
$produto = $produtoTb->fetchRow('id=10');

if ($produto !== null) {
	$produtoTb->update(array(
	  'nome' => $nome,
	  'dataAlteracao' => $data
	), 'id=10');
}
else {
	$produtoTb->insert(array(
	  'nome' => $nome,
	  'dataAlteracao' => $data
	));
}














