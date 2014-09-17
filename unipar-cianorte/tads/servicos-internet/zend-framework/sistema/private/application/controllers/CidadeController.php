<?php

class CidadeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    }
    
    public function cadastrarAction() {
        $formCidade = new Application_Form_Cidade();
        
        if($this->getRequest()->isPost()){
            
            $data = $this->getRequest()->getParams();
            
            if($formCidade->isValid($data)){
                
                
            }
        }
        
        
        $this->view->formCidade = $formCidade;
        
        
    }


}

