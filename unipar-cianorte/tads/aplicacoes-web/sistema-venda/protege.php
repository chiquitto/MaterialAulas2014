<?php

session_start();

if(!isset ($_SESSION['logado'])) {
    header('location:login.php');
    exit;
}