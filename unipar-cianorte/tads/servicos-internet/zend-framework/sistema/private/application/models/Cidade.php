<?php

class Application_Model_Cidade
{

    public function cadastrar($cidade) {
        $cidadeTabela = new Application_Model_DbTable_Cidade();
        
        $idcidade = $cidadeTabela->insert(array(
            'cidade' => $cidade['nome'],
            'populacao' => 0,
            'iduf' => $cidade['uf']
        ));
        
        return $idcidade;
    }
    
}

