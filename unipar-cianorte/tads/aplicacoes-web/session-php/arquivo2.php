<?php

// arquivo2.php

session_start();

echo $_SESSION['nome'] . '<br>';
echo $_SESSION['hora'] . '<br>';

if ( isset($_SESSION['data']) ) {
	echo $_SESSION['data'] . '<br>';
}
else {
	echo 'Nao existe a sessao data <br>';
}