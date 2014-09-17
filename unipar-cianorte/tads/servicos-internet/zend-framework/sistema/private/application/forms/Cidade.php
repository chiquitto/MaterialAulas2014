<?php

class Application_Form_Cidade extends Zend_Form
{
    public function init() {
        $nome = new Zend_Form_Element_Text("nome", array(
            "label"=>"Nome da Cidade: ", 
            "required"=>true 
        ));
        
        
        $nome->addFilter(new Zend_Filter_StringToUpper());
        $nome->addFilter(new Zend_Filter_StringTrim());
        $nome->addValidator(new Zend_Validate_NotEmpty());
        
        $this->addElement($nome);
        
        $uf = new Zend_Form_Element_Select("uf", array(
            "label"=>"UF: ",
            "required"=>true  
            
        ));
        
        $this->addElement($uf);
        
        $estados = array(
            ""=>"Selecione...",
            "PR"=>"Paraná",
            "SC"=>"Santa Catarina",
            "SP"=>"São Paulo",
            "RO"=>"Roraima",
            "MT"=>"Mato Grosso",
            "BA"=>"Bahia",
            "MG"=>"Minas Gerais"
            
            );
        $uf->setMultiOptions($estados);
        
        
        
        $enviar = new Zend_Form_Element_Submit("enviar", array(
            "label"=>"Enviar"
        ));
        
        $this->addElement($enviar);
    }
   
}
