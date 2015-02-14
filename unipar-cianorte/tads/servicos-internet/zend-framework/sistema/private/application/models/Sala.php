<?php
class Application_Model_Sala{

    public function cadastrar($sala){
        
        $tbSala = new Application_Model_DbTable_Sala();
        $idsala = $tbSala->insert(array(
            'sala' => $sala['sala'],
            'qtd' => $sala['qtd']));
        
        return $idsala;
    }
    
    public function editar($sala){
        
        $tbSala = new Application_Model_DbTable_Sala();
        $idsala = $tbSala->update(array(
            'sala' => $sala['sala'],
            'qtd' => $sala['qtd']),
            'idsala='.$sala['idsala']);
        
        return $idsala;
    }
  
}
 


