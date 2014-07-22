<?php

/*
Criar um script que carregue o conteúdo do arquivo citado e mostre para o usuário os nomes dos carros. O script deve ser capaz de trabalhar com qualquer quantidade de carros contidos na tag <carro>.
*/

$xml = file_get_contents('carros.xml');

$sxe = new SimpleXMLElement($xml);

foreach($sxe->carro as $carro) {
	echo $carro;
}

//print_r($sxe);