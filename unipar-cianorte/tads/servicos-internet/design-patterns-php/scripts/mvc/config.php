<?php

define('DIRETORIO', '/home/alisson/Trabalho/MaterialAulas2014/unipar-cianorte/tads/servicos-internet/design-patterns-php/scripts/mvc');

define('DIRETORIO_AUTOLOAD', DIRETORIO . '/lib');

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