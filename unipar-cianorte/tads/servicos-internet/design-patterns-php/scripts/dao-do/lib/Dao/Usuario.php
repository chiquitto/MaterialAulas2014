<?php

/**
 * Description of Usuario
 *
 * @author alisson
 */
class Dao_Usuario extends Dao {
    protected $tabela = 'usuario';
    protected $pk = 'id';
    protected $doClass = 'Vo_Usuario';
}
