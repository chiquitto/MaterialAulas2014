<?php
// arquivo1.php

session_start();

$_SESSION['nome'] = 'Chiquitto Teste';
$_SESSION['idade'] = 18;
$_SESSION['hora'] = time();
$_SESSION['data'] = '10/10/2013';