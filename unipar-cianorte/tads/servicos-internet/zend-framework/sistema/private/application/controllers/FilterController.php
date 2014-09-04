<?php

class FilterController
extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
    }
    
    public function minusculoAction() {
        $filter = new Zend_Filter_StringToLower();
        $valor = 'Unipar - Universidade Paranaense';
        
        echo $filter->filter($valor);
        
        exit;
    }
    
    public function dirAction() {
        $filtro = new Zend_Filter_Dir();
        $valor = 'c:/unipar/arquivo.php';
        
        echo $filtro->filter($valor);
        
        exit;
    }
    
    public function striptagsAction() {
        $filtro = new Zend_Filter_StripTags();
        $valor = '<strong>Ola Unipar</strong>';
        
        echo $filtro->filter($valor);
        
        exit;
    }
    
    public function comprimirAction() {
        $filtroDir = new Zend_Filter_Dir();
        $dir = $filtroDir->filter(__FILE__);
        
        $formato = 'zip';
        $filtro = new Zend_Filter_Compress(array(
            'adapter' => $formato,
            'options' => array(
                'archive' => 'arquivo.zip',
            )
        ));
        
        $filtro->filter($dir);
        
        exit;
    }
}