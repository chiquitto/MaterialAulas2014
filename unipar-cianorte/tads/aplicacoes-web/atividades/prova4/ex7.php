<?php

$sql = "Select
  tipo, Count(*) as contador
From veiculos
Where (bloqueado = '0')
Group By tipo";

$resultado = mysqli_query($con, $sql);

while($r = mysqli_fetch_assoc($resultado)){
  echo $r['tipo'] . ':' . $r['contador'];
}
