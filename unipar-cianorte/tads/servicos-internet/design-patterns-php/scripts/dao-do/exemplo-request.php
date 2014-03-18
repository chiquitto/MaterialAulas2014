<?php

require 'lib/Conexao.php';
require 'lib/Vo.php';
require 'lib/Vo/Usuario.php';
require 'lib/Dao.php';
require 'lib/Dao/Usuario.php';

$dao = new Dao_Usuario();
$usuarios = $dao->request('id = 1');

print_r($usuarios);

//echo $usuarios[0]->getId();