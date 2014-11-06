<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }
    
    protected function _initNavigation() {
        $xml = APPLICATION_PATH
                . '/configs/navigation.xml';
        
        $config = new Zend_Config_Xml($xml, 'nav');
        $nav = new Zend_Navigation($config);
        
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        
        $layout->getView()->navigation($nav);
    }
}

