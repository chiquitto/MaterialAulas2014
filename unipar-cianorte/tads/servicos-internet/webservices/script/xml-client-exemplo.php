<?php

$string = '<?xml version="1.0" encoding="UTF-8"?>
<clientes>
    <clienteX>
        <nome>Cliente X1</nome>
        <email>clientex1@gmail.com</email>
        <fone>1111-1111</fone>
    </clienteX>
    <clienteX>
        <nome>Cliente X2</nome>
        <email>clientex2@gmail.com</email>
        <fone>2222-2222</fone>
    </clienteX>
    
    <clienteY nome="Cliente Y1" email="clientey1@gmail.com" fone="1111-1111"/>
    <clienteY nome="Cliente Y2" email="clientey2@gmail.com" fone="2222-2222"/>
</clientes>
';

$sxe = new SimpleXMLElement($string);

foreach($sxe->clienteX as $cliente) {
	echo $cliente->nome, '<br>';
}

echo '<hr>';

foreach($sxe->clienteY as $cliente) {
    $clienteAttr = $cliente->attributes();
    echo $clienteAttr->nome, '<br>';
}