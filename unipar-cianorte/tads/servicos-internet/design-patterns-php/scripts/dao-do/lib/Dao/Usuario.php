<?php

class Dao_Usuario
extends Dao {
    protected $tabela = 'usuario';
    protected $pk = 'id';
    protected $vo = 'Vo_Usuario';
    
    public function create(Vo $vo) {
        $vo->setSenha( md5($vo->getSenha()) );
        
        return parent::create($vo);
    }
}