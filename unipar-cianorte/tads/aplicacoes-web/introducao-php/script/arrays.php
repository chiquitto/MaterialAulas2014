<?php

/*
Colchetes vazio = Pegar o maior índice numérico,
somar 1 e criar este indice com o valor informado.

Ex.: Maior indice numérico = 5
$a[] = X
ira resultar em
$a[Maior indice numérico + 1] = X
e o resultado final será como
$a[6] = X
*/

header('content-type:text/plain; charset=utf-8');

/*
1.
Criação simples
*/
$a = array();
$a[0] = 'A';
$a[1] = 'B';
echo '1:', print_r($a, true);

/*
Saida:
Array
(
    [0] => A
    [1] => B
)
/

/*
2.
Criação simples com
indices não sequenciais
*/
$a = array();
$a[0] = 'A';
$a[1] = 'B';
$a[5] = 'Z';
echo '2:', print_r($a, true);

/*
Saida:
Array
(
    [0] => A
    [1] => B
    [5] => Z
)
/

/*
3.
Criação com valores
*/
$a = array('A', 'B', 'C');
echo '3:', print_r($a, true);

/*
Saida:
Array
(
    [0] => A
    [1] => B
    [2] => C
)
/

/*
4.
Criação com valores
E adicionar valores
*/
$a = array('A', 'B', 'C');
$a[1] = 'X';
$a[9] = 'Z';
echo '4:', print_r($a, true);

/*
Saida:
Array
(
    [0] => A
    [1] => X
    [2] => C
    [9] => Z
)
*/

/*
5.
Criação declarando
indices => valores
*/
$a = array(
	2 => 'B',
	4 => 'D',
);
echo '5:', print_r($a, true);

/*
Saida:
Array
(
    [2] => B
    [4] => D
)
*/

/*
6.
Declarar array E
Adicionar valores
ao final do array sem
declaração de indice
*/
$a = array();
$a[] = 'A';
$a[] = 'B';
echo '6:', print_r($a, true);

/*
Saida:
Array
(
    [0] => A
    [1] => B
)
*/

/*
7.
Declarar array
com valores E
Adicionar valores
ao final do array sem
declaração de indice
*/
$a = array('A', 'B');
$a[] = 'C';
echo '7:', print_r($a, true);

/*
Saida:
Array
(
    [0] => A
    [1] => B
    [2] => C
)
*/

/*
8.
Declarar array
com valores E
Adicionar valores
ao final do array sem
declaração de indice
*/
$a = array(3 => 'C');
$a[] = 'D';
echo '8:', print_r($a, true);

/*
Saida:
Array
(
    [3] => C
    [4] => D
)
*/

/*
9.
Declarar array
com valores E
Adicionar valores
ao final do array sem
declaração de indice
*/
$a = array(3 => 'C');
$a[] = 'D';
$a[1] = 'A';
$a[] = 'B';
echo '9:', print_r($a, true);

/*
Saida:
Array
(
    [3] => C
    [4] => D
    [1] => A
    [5] => B
)
*/

/*
10.
Array associativo 1
*/
$a = array();
$a['data'] = '01/02';
$a['hora'] = '12:34';
echo '10:', print_r($a, true);

/*
Saida:
Array
(
    [data] => 01/02
    [hora] => 12:34
)
*/

/*
11.
Array associativo 2
*/
$a = array(
	'data' => '01/02',
	'hora' => '12:34',
);
echo '11:', print_r($a, true);

/*
Saida:
Array
(
    [data] => 01/02
    [hora] => 12:34
)
*/

/*
12.
Tudo junto e misturado 1
*/
$a = array(
	'data' => '01/02',
	'hora' => '12:34',
	'Sem indice',
	'Outro valor'
);
echo '12:', print_r($a, true);

/*
Saida:
Array
(
    [data] => 01/02
    [hora] => 12:34
    [0] => Sem indice
    [1] => Outro valor
)
*/

/*
13.
Tudo junto e misturado 2
*/
$a = array(
	'data' => '01/02',
	'hora' => '12:34',
);
$a[] = 'Sem indice';
echo '13:', print_r($a, true);

/*
Saida:
Array
(
    [data] => 01/02
    [hora] => 12:34
    [0] => Sem indice
)
*/

/*
14.
Tudo junto e misturado 3
*/
$a = array(
	'data' => '01/02',
);
$a['hora'] = '12:34';
$a[] = 'Sem indice';
$a[5] = 'E';
$a[] = 'F';
echo '14:', print_r($a, true);

/*
Saida:
Array
(
    [data] => 01/02
    [hora] => 12:34
    [0] => Sem indice
    [5] => E
    [6] => F
)
*/

/*
15.
Variaveis
*/
$a = array(
    'data' => '01/02',
);
$b = 'data';
echo '15:', $a[$b];

/*
Saida: 01/02
*/