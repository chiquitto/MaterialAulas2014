<?php

class ValidateController
extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
    }
    
    public function emailAction() {
        $validador = new Zend_Validate_EmailAddress();
        $string = 'chiquitto@unipar';
        
        $ok = $validador->isValid($string);
        
        if ($ok) {
            echo 'OK';
        }
        else {
            $msg = $validador->getMessages();
            
            print_r($msg);
        }
        
        exit;
    }
    
}