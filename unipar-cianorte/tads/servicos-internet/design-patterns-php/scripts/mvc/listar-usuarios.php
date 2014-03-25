<?php

include 'config.php';
include 'lib/Conexao.php';
include 'lib/Dao.php';
include 'lib/Dao/Usuario.php';
include 'lib/Vo.php';
include 'lib/Vo/Usuario.php';
include 'lib/Controller.php';
include 'lib/Controller/Usuario.php';
include 'lib/View.php';

$controller = new Controller_Usuario();
$controller->listar();