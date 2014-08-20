<?php

class Model_Cidade
extends Model {
    public function cadastrar(Vo_Cidade $cidadeVo) {
        // Validacoes
        if ($cidadeVo->getCidade() == '') {
            throw new Exception_Cidade('Cidade não pode ser vazio', 10);
        }
        
        $cidadeDao = new Dao_Cidade();
        $cidadeVo->idcidade = $cidadeDao->create($cidadeVo);
        return true;
    }
}