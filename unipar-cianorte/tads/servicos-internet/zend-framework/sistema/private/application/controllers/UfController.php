<?php

class UfController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    }
    
    public function cadastrarAction() {
        $formUf = new Application_Form_Uf();
        
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getParams();
            
            if($formUf->isValid($data)){
                $data = $formUf->getValues();
                
                $ufModel = new Application_Model_Uf();
                $ufModel->cadastrar($data);
                
                $this->_helper->redirector->gotoSimpleAndExit('index');
            }
        }
        
        $this->view->formUf = $formUf;
    }
    
    public function editarAction() {
        $iduf = $this->getRequest()->getParam('iduf');
        $uftabela = new Application_Model_DbTable_Uf();
        $uf = $uftabela->fetchRow("iduf = '$iduf'");
        if($uf === null){
            echo 'uf nao encontrado';
            exit();
        }
        //$ufarray = $uf->toArray();
        $ufForm = new Application_Form_Uf();
        
        if($this->getRequest()->isPost()){
            $dados = $this->getRequest()->getParams();
            if($ufForm->isValid($dados)){
                $dados = $ufForm->getValues();
                $model = new Application_Model_Uf();
                $model->editar($dados,$iduf);
                $this->_helper->redirector->gotoSimpleAndExit('index');
            }
        }else{
        $ufForm->populate(array(
            "sigla"=>$uf->iduf,
            "uf"=>$uf->uf
                ));
        }
        $this->view->formUf = $ufForm;
        
        
    }


}

