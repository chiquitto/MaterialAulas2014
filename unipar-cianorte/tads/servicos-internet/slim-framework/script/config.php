<?php

define('DIRETORIO', dirname(__FILE__));

define('DIRETORIO_SLIM', realpath(DIRETORIO . '/../Slim'));

define('DIRETORIO_AUTOLOAD', DIRETORIO . '/lib');

/**
 * Auto load de classes
 *
 * @link https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
 * @param string $className
 */
function __autoload($className) {
    if (substr($className, 0, 4) == 'Slim') {
        return \Slim\Slim::autoload($className);
    }

    $className = ltrim($className, '\\');
    $fileName = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= DIRETORIO_AUTOLOAD
            . '/'
            . str_replace('_', DIRECTORY_SEPARATOR, $className)
            . '.php'
    ;

    if (file_exists($fileName)) {
        require $fileName;
    } else {
        die("Arquivo $fileName nao encontrado");
    }
}
