<?php

require 'lib/Conexao.php';
require 'lib/Vo.php';
require 'lib/Vo/Usuario.php';
require 'lib/Dao.php';
require 'lib/Dao/Usuario.php';

$dao = new Dao_Usuario();

// Exemplo para cadastrar um Vo
/*
$vo = new Vo_Usuario();
$vo->setNome('Jose da Silva');
$vo->setEmail('chiquitto@gmail.com');
$vo->setLogin('chiquitto');
$vo->setSenha('123456');
var_dump($dao->create($vo));
 */

// Exemplo para apagar registros
// $dao->delete('id = 2');

// Exemplo para atualizar registros
$vo = new Vo_Usuario();
$vo->id = 4;
$vo->nome = 'Testando 123';
$dao->update($vo);

// Exemplo para selecionar objetos
$usuarios = $dao->request('id = 4');
print_r($usuarios[0]->getAll());