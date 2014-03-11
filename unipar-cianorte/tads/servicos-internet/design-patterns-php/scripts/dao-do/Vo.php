<?php

abstract class Vo {
    
    private $dados = array();
    protected $atributos = array();
    
    public function __call($metodo, $parametros) {
        $parte1 = substr($metodo, 0, 3);
        
        if ($parte1 == 'get') {
            $parte2 = substr($metodo, 3);
            return $this->get($parte2);
        }
        if ($parte1 == 'set') {
            $parte2 = substr($metodo, 3);
            return $this->set($parte2, $parametros[0]);
        }
    }
    
    protected function set($atributo, $valor) {
        $atributo[0] = strtolower($atributo[0]);
        if (!in_array($atributo, $this->atributos)) {
            throw new Exception('Atributo não pode ser setado');
        }
        
        $this->dados[$atributo] = $valor;
    }
    
    protected function get($atributo) {
        $atributo[0] = strtolower($atributo[0]);
        return $this->dados[$atributo];
    }

    public function __get($atributo) {
        throw new Exception('Você não pode usar o metodo __get');
    }
    
    public function __set($atributo, $valor) {
        throw new Exception('Você não pode usar o metodo __set');
    }
    
    public function getAll() {
        return $this->dados;
    }
    
}

class UsuarioVo extends Vo {
    
    protected $atributos = array('nome','email');

    public function setNome($nome) {
        $nome = strtoupper($nome);
        $this->set('nome', $nome);
    }
}

$vo = new UsuarioVo();
$vo->setNome('Unipar');
$vo->setEmail('chiquitto@unipar.br');
$vo->setRecheio('iuoaisuoaiusoai');

// $vo->nome = 'Unipar';

//echo $vo->getEmail();

print_r($vo);