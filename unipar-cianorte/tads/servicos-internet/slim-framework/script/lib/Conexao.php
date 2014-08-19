<?php

/**
 * Classe de Conexao
 *
 * @author alisson
 */
class Conexao extends PDO {

    private $dsn = 'mysql:host=localhost;dbname=cidade';
    private $user = 'root';
    private $password = '123456';
    private static $instancia;

    function __construct() {
        try {
            parent::__construct($this->dsn, $this->user, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->exec('SET CHARACTER SET utf8');
        } catch (PDOException $e) {
            echo "Conexão falhou. Erro: " . $e->getMessage();
            exit;
        }
    }

    /**
     * 
     * @return Conexao
     */
    public static function getInstance() {
        if (null === self::$instancia) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

}
