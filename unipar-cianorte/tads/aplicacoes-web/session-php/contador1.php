<?php

// contador1.php

session_start();

if ( !isset($_SESSION['contador']) ) {
	$_SESSION['contador'] = 0;
}

$_SESSION['contador']++;

echo $_SESSION['contador'];