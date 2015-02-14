<?php

$sql = "Select id From veiculo Where placa = '$placa'";
$r = mysqli_query($con, $sql);