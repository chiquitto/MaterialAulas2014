<?php

define('DIRETORIO', '/home/unipar/Trabalho/MaterialAulas2014/unipar-cianorte/tads/servicos-internet/atividades/ajax-uf');

define('DIRETORIO_AUTOLOAD', DIRETORIO . '/lib');

define('CLIENTE_INATIVO', '0');
define('CLIENTE_ATIVO', '1');

define('PRODUTO_INATIVO', '0');
define('PRODUTO_ATIVO', '1');
define('PRODUTO_MANUTENCAO', '2');

/**
 * Auto load de classes
 *
 * @link https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
 * @param string $className
 */
function __autoload($className) {
    $className = ltrim($className, '\\');
    $fileName = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require DIRETORIO_AUTOLOAD . '/' . $fileName;
}