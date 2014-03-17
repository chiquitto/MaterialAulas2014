<?php

require 'lib/Conexao.php';
require 'lib/Vo.php';
require 'lib/Vo/Usuario.php';
require 'lib/Dao.php';
require 'lib/Dao/Usuario.php';

$dao = new Dao_Usuario();
$usuarios = $dao->request();

print_r($usuarios);