<?php

class Application_Form_Exemplo
extends Zend_Form {
    public function __construct($options = null) {
        parent::__construct($options);
        
        $emailElemento = new Zend_Form_Element_Text('email', array(
            'label' => 'Endereço de email',
        ));
        $this->addElement($emailElemento);
        
        $senhaElemento = new Zend_Form_Element_Password('senha', array(
            'label' => 'Senha'
        ));
        $this->addElement($senhaElemento);
        
        $botaoElemento = new Zend_Form_Element_Submit('botao', array(
            'label' => 'Acessar',
        ));
        $this->addElement($botaoElemento);
    }
}