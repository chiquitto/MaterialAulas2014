<?php

class Application_Model_Cidade
{

    public function cadastrar($cidade) {
        $cidadeTabela = new Application_Model_DbTable_Cidade();
        
        $idcidade = $cidadeTabela->insert(array(
            'cidade' => $cidade['nome'],
            'populacao' => $cidade['populacao'],
            'iduf' => $cidade['uf']
        ));
        
        return $idcidade;
    }
    
}

