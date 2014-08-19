<?php

require '../config.php';

require DIRETORIO_SLIM . '/Slim/Slim.php';

// \Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get(
    '/estados',
    function () use ($app) {
        $con = Conexao::getInstance();
        
        $sql = 'Select * From uf';
        $ufQuery = $con->query($sql);
        $ufArray = $ufQuery->fetchAll(PDO::FETCH_ASSOC);
        
        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->write(json_encode($ufArray));
    }
);

$app->get(
    '/cidades/:iduf',
    function ($iduf) {
        echo $iduf;
    }
);

$app->get(
    '/cidade/:idcidade',
    function ($idcidade) {
        echo $idcidade;
    }
);

$app->run();
