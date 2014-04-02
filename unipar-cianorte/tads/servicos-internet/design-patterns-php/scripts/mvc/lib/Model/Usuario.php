<?php

class Model_Usuario
extends Model {
    public function cadastrar(Vo_Usuario $dados) {
        if ($dados->getNome() == '') {
            throw new Exception('Nome não pode ser vazio.', 1);
        }
        
        // Validacoes
        
        $dao = new Dao_Usuario();
        $pk = $dao->create($dados);
    }
}