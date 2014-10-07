<?php

class Application_Form_Uf extends Zend_Form {

    public function init() {
        $sigla = new Zend_Form_Element_Text("sigla", array(
            "label" => "Sigla: ",
            "required" => true,
        ));

        $sigla->addFilter(new Zend_Filter_StringToUpper());
        $sigla->addFilter(new Zend_Filter_StringTrim());
        $sigla->addValidator(new Zend_Validate_NotEmpty());
        $sigla->addValidator(new Zend_Validate_StringLength(array(
            'min' => 2,
            'max' => 2,
        )));

        $this->addElement($sigla);
        
        $nome = new Zend_Form_Element_Text("uf", array(
            "label" => "Nome: ",
            "required" => true
        ));

        $nome->addFilter(new Zend_Filter_StringTrim());
        $nome->addValidator(new Zend_Validate_NotEmpty());

        $this->addElement($nome);

        $enviar = new Zend_Form_Element_Submit("enviar", array(
            "label" => "Enviar"
        ));

        $this->addElement($enviar);
    }

}
