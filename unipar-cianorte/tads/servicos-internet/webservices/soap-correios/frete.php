<?php
// Informacoes para serem enviadas
$std = new stdClass;
$std->nCdEmpresa = '';
$std->sDsSenha = '';
$std->nCdServico = '40010,41106';
$std->sCepOrigem = '87200-163';
$std->sCepDestino = '21941-916';
$std->nVlPeso = '3,5';
$std->nCdFormato = 1;
$std->nVlComprimento = 30;
$std->nVlAltura = 10;
$std->nVlLargura = 15;
$std->nVlDiametro = 0;
$std->sCdMaoPropria = 'N';
$std->nVlValorDeclarado = '0';
$std->sCdAvisoRecebimento = 'N';

// Objeto SOAP
$uri = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx?WSDL';
$soap = new SoapClient($uri);

// Resposta do Webservice
$resposta = $soap->CalcPrecoPrazo($std);

$servicos = $resposta->CalcPrecoPrazoResult->Servicos;
?>
<h1>Frete de <?php echo $std->sCepOrigem; ?>
    para <?php echo $std->sCepDestino; ?></h1>

<p>Valor: R$
    <?php echo $servicos->cServico[0]->Valor; ?></p>

<p>Prazo de entrega:
    <?php echo $servicos->cServico[0]->PrazoEntrega; ?>
    dias uteis</p>