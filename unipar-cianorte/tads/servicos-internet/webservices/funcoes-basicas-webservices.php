<?php

/**
  Carrega um arquivo, seja local ou via protocolos como HTTP e FTP

  @name file_get_contents
  @link http://www.php.net/function.file-get-contents
*/

// Carregar um arquivo local
$a = file_get_contents('/home/unipar/arquivo.txt');

// Carregar um arquivo via HTTP
$a = file_get_contents('http://unipar.br');

// Carregar arquivos via HTTP usando método POST
// http://stackoverflow.com/questions/2445276/how-to-post-data-in-php-using-file-get-contents
// http://angelitomg.com/blog/enviando-dados-via-post-com-file_get_contents-em-php/
$postdata = http_build_query(
    array(
        'nome' => 'Alisson Chiquitto',
        'email' => 'chiquitto@gmail.com'
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('http://example.com/submit.php', false, $context);