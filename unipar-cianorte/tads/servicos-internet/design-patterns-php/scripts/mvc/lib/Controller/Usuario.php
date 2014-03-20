<?php

class Controller_Usuario extends Controller {
    public function alterar() {
        
    }

    public function apagar() {
        
    }

    public function cadastrar() {
        
    }

    public function listar() {
        $view = new View();
        
        $view->add('nomeUsuario', 'Alisson Chiquitto');
        
        $view->desenhar('usuario/listar');
    }

}
