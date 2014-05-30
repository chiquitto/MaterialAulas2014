<?php

define('DIRETORIO', '');

define('BD_HOST', 'localhost');
define('BD_USUARIO', 'root');
define('BD_SENHA', '123456');
define('BD_NOME', 'vendas');

define('CLIENTE_INATIVO', '0');
define('CLIENTE_ATIVO', '1');

define('PRODUTO_INATIVO', '0');
define('PRODUTO_ATIVO', '1');

/**
* Converte um array de mensagens em HTML
* 
* @param array $msg Lista das mensagens
* @param string $boxType Tipo da mensagem
*	Pode ser success, info, warning ou danger
*/
function msgHtml($msg, $boxType = 'danger') {
?>
<div class="alert alert-<?php echo $boxType; ?>">
  <ul>
    <?php foreach($msg as $m) { ?>
    <li><?php echo $m; ?>;</li>
    <?php } ?>
  </ul>
</div>
<?
}