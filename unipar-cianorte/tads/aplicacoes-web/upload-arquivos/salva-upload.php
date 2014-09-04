<?php

/**
* Referencia de Upload de arquivos com PHP
* @link http://php.net/manual/pt_BR/features.file-upload.post-method.php
*/

//print_r($_FILES);

$uploadMaxSize = 1024 * 1024 * 2;
$uploadExtensoes = array('jpg', 'png', 'gif');

/**
* Verificar se o arquivo existe dentro de $_FILES
*/
if ( !isset($_FILES['arquivo']) ) {
	echo 'Envie um arquivo';
	exit;
}

/**
* Verificar se houve falhas no upload
*/
if ($_FILES['arquivo']['error'] != '0') {
	echo 'Houve uma falha no envio do arquivo';
	exit;
}

/**
* Verificar o tamanho do arquivo
*/

/**
* Verificar a extensão do arquivo
*/

/**
* Salvar o arquivo
* Pode ser usado o copy() ou move_uploaded_file()
*/
copy(
	$_FILES['arquivo']['tmp_name'],
	'upload/' . $_FILES['arquivo']['name']
);

/**
* Mostrar mensagem para o usuário
*/

echo 'O seu arquivo foi salvo';