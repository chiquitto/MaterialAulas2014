<?php

class SalaController extends Zend_Controller_Action{
    
    public function init() {
        
    } 
    
    public function indexAction(){
        
    }
    
    public function cadastrarAction(){
        $formSala = new Application_Form_Sala();
        
        if ($this->getRequest()->isPost()){
            $data = $this->getRequest()->getParams();
            
            if ($formSala->isValid($data)){
                $data = $formSala->getValues();
                
                $salaModel = new Application_Model_Sala();
                $salaModel->cadastrar($data);
            }
        }
        
        
        $this->view->formSala = $formSala;
    }
    
    public function listarAction(){
        
        $tbSala = new Application_Model_DbTable_Sala();
        $sala = $tbSala->fetchAll();
        
        $salaArray = $sala->toArray();
        $this->view->listaSala = $salaArray;
        
    }
    
    public function editarAction(){
        
        $idSala = $this->getRequest()->getParam('idsala');
        
        $tbSala = new Application_Model_DbTable_Sala();
        $sala = $tbSala->fetchRow("idsala = '$idSala'");
        
        if ($sala === null){
            echo 'Sala não encontrada!';
            exit();
        }
        
        $formSala = new Application_Form_Sala();
        
        if ($this->getRequest()->isPost()){
            $data = $this->getRequest()->getParams();
            
            if ($formSala->isValid($data)){
                $data = $formSala->getValues();
                
                $salaModel = new Application_Model_Sala();
                $salaModel->editar($data);
            }
        }else{
            $formSala->populate(array(
                'sala' => $sala->sala,
                'qtd' => $sala->qtd
            ));
                    
        }
        
        $this->view->listaSalas = $formSala;
    }
}

