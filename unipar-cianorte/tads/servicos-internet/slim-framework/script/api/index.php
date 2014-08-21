<?php

require '../config.php';

require DIRETORIO_SLIM . '/Slim/Slim.php';

// \Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/', function() use ($app) {
    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->write(json_encode('Método não implementado'));
});

$app->get(
        '/estados', function () use ($app) {
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
        '/cidades/:iduf', function ($iduf) use ($app) {

    $con = Conexao::getInstance();
    $sql = 'SELECT * FROM cidade where iduf = :iduf';

    $statement = $con->prepare($sql);
    $statement->bindValue(':iduf', $iduf, PDO::PARAM_STR);
    $statement->execute();

    $cidades = $statement->fetchAll(PDO::FETCH_ASSOC);

    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->write(json_encode($cidades));
}
);

$app->get(
        '/cidade/:idcidade', function ($idcidade) use ($app) {

    $con = Conexao::getInstance();
    $sql = 'SELECT * FROM cidade WHERE idcidade = :idcidade';

    $statement = $con->prepare($sql);
    $statement->bindValue(':idcidade', $idcidade, PDO::PARAM_INT);
    $statement->execute();

    $cidade = $statement->fetch(PDO::FETCH_ASSOC);

    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->write(json_encode($cidade));
}
);

$app->post('/cidade', function () {
    $saida = array(
        'cod' => 0,
        'msg' => '',
    );
    
    $app = \Slim\Slim::getInstance();
    $app->response->setStatus(200);

    $vo = new Vo_Cidade();
    $vo->setIduf($app->request->params('estado'));
    $vo->setPopulacao($app->request->params('populacao'));
    $vo->setCidade($app->request->params('cidade'));
    
    $modelo = new Model_Cidade();
    try {
        $modelo->cadastrar($vo);
        $saida['idcidade'] = $vo->getIdcidade();
    } catch (Exception $exc) {
        $saida['cod'] = $exc->getCode();
        $saida['msg'] = $exc->getMessage();
        $app->response->setStatus(400);
    }
    
    
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->write(json_encode($saida));
});

$app->run();
sleep(1);
