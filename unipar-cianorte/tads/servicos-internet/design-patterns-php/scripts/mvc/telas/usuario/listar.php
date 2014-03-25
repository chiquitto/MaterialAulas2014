Ola <?php echo $this->dados['nomeUsuario']; ?>

<?php

// $this->dados['usuarios']

foreach($this->dados['usuarios'] as $usuario) {
    echo $usuario->getNome();
}