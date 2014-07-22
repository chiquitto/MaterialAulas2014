<?php

/*
 Um webservice SOAP disponibiliza um método soma($n1,$n2) que retorna a soma entre 2 números inteiros. Criar um script PHP que consuma o webservice para fazer a soma de dois números, e mostre o retorno para o usuário
*/

$soap = new SoapClient('URL_WEBSERVICE_SOAP');

$soma = $soap->soma(1, 2);

echo $soma;