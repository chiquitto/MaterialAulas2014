<?php

class FormController
extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        $form = new Application_Form_Exemplo();
        
        $this->view->formExemplo = $form;
    }
    
}