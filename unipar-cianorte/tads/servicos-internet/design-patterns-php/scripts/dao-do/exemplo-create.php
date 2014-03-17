<?php

require 'lib/Conexao.php';
require 'lib/Vo.php';
require 'lib/Vo/Usuario.php';
require 'lib/Dao.php';
require 'lib/Dao/Usuario.php';

$vo = new Vo_Usuario();
$vo->setNome('Alisson Chiquitto');
$vo->setEmail('chiquitto@gmail.com');
$vo->setLogin('chiquitto');
$vo->setSenha('123456');

$dao = new Dao_Usuario();
echo $dao->create($vo);
