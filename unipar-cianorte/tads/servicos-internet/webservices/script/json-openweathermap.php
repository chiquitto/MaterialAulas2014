<?php

/*
 * Clima Tempo Cianorte
 * http://www.climatempo.com.br/previsao-do-tempo/cidade/270/cianorte-pr
 */

$idCidade = 3466174;
$url = "http://api.openweathermap.org/data/2.5/weather?id=$idCidade&lang=pt";
//$url = '/home/unipar/Trabalho/MaterialAulas2014/unipar-cianorte/tads/servicos-internet/webservices/ws-openweathermap.org/city-3466174.json';

// Carregar arquivo com o JSON
$string = file_get_contents($url);

// Decodificar JSON para stdClass
$cidade = json_decode($string);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tempo na cidade</title>
    </head>
    <body>
        <h1>Tempo no momento na cidade: <?php echo $cidade->name; ?></h1>
        
        <p>Temperatura atual: <?php echo ($cidade->main->temp)-273.15;?></p>
        <p>Pressao: <?php echo $cidade->main->pressure ?></p>
        <p>Velocidade do Vento: <?php echo ($cidade->wind->speed)*1.76; ?> Km/h</p>
        <p>Latitude X Longitude: <?php echo $cidade->coord->lat?> X <?php echo $cidade->coord->lon?></p>
        <p>Umidade: <?php echo $cidade->main->humidity ?></p>    
        <p>Condicao atual:
            <img src="http://openweathermap.org/img/w/<?php echo $cidade->weather[0]->icon; ?>.png">
            <?php echo $cidade->weather[0]->description; ?>
        </p>
    </body>
</html>