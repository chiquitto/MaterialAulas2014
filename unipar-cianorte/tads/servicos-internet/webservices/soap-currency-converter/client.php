<?php
$uri = 'http://www.webservicex.net/CurrencyConvertor.asmx?WSDL';
$c = new SoapClient($uri);

$p = new stdClass();
$p->FromCurrency = 'EUR';
$p->ToCurrency = 'BRL';

$r = $c->ConversionRate($p);

//var_dump($r->ConversionRateResult);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Conversão de moedas</title>
  <meta charset="utf-8">
</head>
<body>
	<!-- Exemplo -->
	<!-- <p>1 EUR = X BRL</p> -->

	<p>1 <?php echo $p->FromCurrency; ?> =
		<?php echo number_format($r->ConversionRateResult, 4) ?> <?php echo $p->ToCurrency; ?></p>
</body>
</html>

