<?php

/**
 * Description of Usuario
 *
 * @author alisson
 */
class Vo_Usuario extends Vo {

    protected $atributos = array('id', 'nome', 'email', 'login', 'senha');

    public function setNome($nome) {
        $nome = strtoupper($nome);
        $this->set('nome', $nome);
    }

}
