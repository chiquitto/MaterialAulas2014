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


}

