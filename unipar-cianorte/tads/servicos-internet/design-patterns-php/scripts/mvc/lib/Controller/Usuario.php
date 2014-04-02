<?php

class Controller_Usuario extends Controller {
    public function alterar() {
        
    }

    public function apagar() {
        
    }

    public function cadastrar() {
        
        $view = new View();
        
        if ($_POST) {
            $vo = new Vo_Usuario();
            $vo->setNome($_POST['nome']);
            $vo->setEmail($_POST['email']);
            $vo->setLogin($_POST['login']);
            $vo->setSenha($_POST['senha']);
            
            $model = new Model_Usuario();
            try {
                $pk = $model->cadastrar($vo);
            }
            catch (Exception $exc) {
                $view->add('erro', $exc->getMessage());
            }
        }
        
        $view->desenhar('usuario/cadastrar');
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
