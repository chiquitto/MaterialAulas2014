<?php

$id = $_GET['id'];

$sql = "Delete From veiculo Where id=$id";

mysqli_query($con, $sql);

header('location: veiculos.php');
