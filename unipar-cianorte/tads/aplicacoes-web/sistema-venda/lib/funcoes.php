<?php

/**
* Lista de CSS das paginas
* Encontre mais templates de Bootstrap em
* http://www.bootstrapcdn.com/#bootswatch_tab
*/
function headCss() {
?>
<link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<?php headCssTema(TWITTER_BOOTSTRAP_TEMA); ?>

<link href="./lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="./lib/estilos.css" rel="stylesheet"><?php
}

function headCssTema($tema=null) {
    $href = '';
    switch($tema) {
        case 'bootstrap';
            $href = './lib/bootstrap/css/bootstrap-theme.min.css';
            break;
        
        case 'cosmo':
        case 'cyborg':
        case 'darkly':
        case 'journal':
        case 'readable':
        case 'sandstone':
        case 'simplex':
        case 'slate':
        case 'superhero':
        case 'yeti':
            $href = "./lib/bootswatch/$tema/bootstrap.min.css";
            break;
    }
    
    if ($href) {
        ?><link href="<?php echo $href; ?>" rel="stylesheet"><?php
    }
}

/**
* Cria um window.alert com a $msg
* Se receber $url, executa um window.location = $url
* Se receber $fim = true, executa a instrucao exit
* 
* @param string $msg Mensagem para o usuario
* @param string $url Url para redirecionar o usuario
* @param boolean $fim Se true, a funcao executa um exit
*/
function javascriptAlert($msg, $url = null, $fim = false) {
	?><script>
	window.alert('<?php echo $msg; ?>');
	<?php if (null !== $url) { ?>
	window.location = '<?php echo $url; ?>';
	<?php } ?>
	</script><?php

	if ($fim) {
		exit;
	}
}

/**
* Cria um window.alert com a $msg
* Se receber $url, executa um window.location = $url
* Esta funcao executa a instrucao exit
* 
* @param string $msg Mensagem para o usuario
* @param string $url Url para redirecionar o usuario
*/
function javascriptAlertFim($msg, $url = null) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
	  <title>Mensagem</title>
	  <meta charset="utf-8">
	</head>
	<body>
	<?php javascriptAlert($msg, $url, false); ?>
	</body>
	</html>
	<?php
	exit;
}

/**
* Converte um array de mensagens em HTML
* 
* @param array $msg Lista das mensagens
* @param string $boxType Tipo da mensagem
*	Pode ser success, info, warning ou danger
*/
function msgHtml($msg, $boxType = 'danger') {
?>
<div class="alert alert-<?php echo $boxType; ?> alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<ul>
		<?php foreach($msg as $m) { ?>
		<li><?php echo $m; ?>;</li>
		<?php } ?>
	</ul>
</div>
<?php
}