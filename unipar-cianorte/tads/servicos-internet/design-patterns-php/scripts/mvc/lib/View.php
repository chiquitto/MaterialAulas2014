<?php

class View {
    private $dados = array();

    public function add($nome, $valor) {
        $this->dados[$nome] = $valor;
    }
    
    public function desenhar($tela) {
        $tela = DIRETORIO . '/telas/' . $tela . '.php';
        
        $template = DIRETORIO . '/telas/template.php';
        include $template;
    }
}
