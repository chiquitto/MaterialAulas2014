<?php

class Application_Model_Uf
{

    public function cadastrar($uf) {
        $cidadeTabela = new Application_Model_DbTable_Uf();
        
        $cidadeTabela->insert(array(
            'iduf' => $uf['sigla'],
            'uf' => $uf['uf'],
        ));
        
        return $uf['sigla'];
    }
    
    public function editar($dados,$iduf) {
        $uf = new Application_Model_DbTable_Uf();
        $uf->update(array("uf"=>$dados['uf']),"iduf = '$iduf'");
        return true;        
    }
    
}

