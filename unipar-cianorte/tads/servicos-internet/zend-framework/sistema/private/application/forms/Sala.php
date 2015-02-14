<?php

class Application_Form_Sala extends Zend_Form{
    
    public function init(){
        
        $idsala = new Zend_Form_Element_Hidden("idsala");
        $this->addElement($idsala);
        
        $sala = new Zend_Form_Element_Text("sala", array(
            "label" => "Nome da sala",
            "required" => true
        ));
        $sala ->addFilter(new Zend_Filter_StringToUpper());
        $this->addElement($sala);
        
        
        $qtdAluno = new Zend_Form_Element_Text("qtd", array(
            "label" => "Quantidade de aluno",
            "required" => true
        ));
        $qtdAluno->addValidator(new Zend_Validate_Int());
        $this->addElement($qtdAluno);
        
        $enviar = new Zend_Form_Element_Submit("enviar", array(
            "label" => "Enviar"
        ));
        $this->addElement($enviar);
    }
    
}