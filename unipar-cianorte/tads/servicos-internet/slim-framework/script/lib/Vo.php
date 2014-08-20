<?php

/**
 * Classe Data Object
 *
 * @author alisson
 */
abstract class Vo {

    private $dados = array();
    protected $atributos = array();

    public function __construct() {
        
    }

    public function __call($metodo, $parametros) {
        $parte1 = substr($metodo, 0, 3);

        if (($parte1 == 'set') or ($parte1 == 'get')) {
            $parte2 = substr($metodo, 3);
            
            if ($parte1 == 'get') {
                return $this->get($parte2);
            }
            
            return $this->set($parte2, $parametros[0]);
        }
        
        throw new Exception("Método $metodo inexistente em " . get_class($this));
    }
    
    public function __get($name) {
        $metodo = 'get' . ucfirst($name);
        if (method_exists($this, $metodo)) {
            return $this->$metodo();
        }
        
        return $this->get($name);
    }
    
    public function __set($name, $value) {
        $metodo = 'set' . ucfirst($name);
        if (method_exists($this, $metodo)) {
            return $this->$metodo($value);
        }
        
        return $this->set($name, $value);
    }

    protected function get($atributo) {
        $atributo[0] = strtolower($atributo[0]);
        return $this->dados[$atributo];
    }

    protected function set($atributo, $valor) {
        $atributo[0] = strtolower($atributo[0]);
        if (!in_array($atributo, $this->atributos)) {
            throw new Exception("Atributo $atributo não pode ser setado para objetos " . get_class($this));
        }
        
        $this->dados[$atributo] = $valor;
    }
    
    public function getAll() {
        return $this->dados;
    }
    
    public function setAll($dados) {
        $this->dados = $dados;
    }
    
    public function setFromBd($dados) {
        foreach($dados as $atributo => $valor) {
            $this->set($atributo, $valor);
        }
    }

}
