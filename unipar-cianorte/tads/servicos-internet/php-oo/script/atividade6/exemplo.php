<?php

require 'Aluno.php';
require 'Escola.php';

$aluno1 = new Aluno('José da Silva');
$aluno2 = new Aluno('Geraldo Santos');
$aluno3 = new Aluno('Arquibancada do Corinthians');

$escola = new Escola();
$escola->matricular($aluno1);
$escola->matricular($aluno2);
$escola->matricular($aluno3);

$escola->mostrarAlunos();