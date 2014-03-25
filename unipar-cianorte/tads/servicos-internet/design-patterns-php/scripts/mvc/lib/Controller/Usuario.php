<?php

class Controller_Usuario extends Controller {
    public function alterar() {
        
    }

    public function apagar() {
        
    }

    public function cadastrar() {
        
    }

    public function listar() {
        $dao = new Dao_Usuario();
        $usuarios = $dao->request();
        
        $view = new View();
        
        $view->add('nomeUsuario', 'Alisson Chiquitto');
        $view->add('usuarios', $usuarios);
        
        $view->desenhar('usuario/listar');
    }

}
