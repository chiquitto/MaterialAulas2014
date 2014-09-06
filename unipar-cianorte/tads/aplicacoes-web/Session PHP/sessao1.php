<?php

session_start();

if (isset($_SESSION['idade'])) {
    $_SESSION['idade']++;
}
else {
    $_SESSION['idade'] = 25;
}

echo $_SESSION['idade'];