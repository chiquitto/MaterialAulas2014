<?php

/**
 * Classe que manipula os Vo
 *
 * @author alisson
 */
class Dao {

    protected $tabela;
    protected $pk;
    protected $doClass;

    /**
     * 
     * @param Vo $vo
     * @return int
     */
    public function create(Vo $vo) {
        $valores = $vo->getAll();

        $colunas = array_keys($valores);
        $parametros = array();

        foreach ($colunas as $coluna) {
            $parametros[] = ':' . $coluna;
        }

        $colunas = join(', ', $colunas);
        $parametros = join(', ', $parametros);

        $con = Conexao::getInstance();

        $sql = "INSERT INTO {$this->tabela}"
                . " ({$colunas}) VALUES ({$parametros})";

        $stmt = $con->prepare($sql);

        $stmt->execute($valores);

        return $con->lastInsertId();
    }

    public function request($where = null) {
        $sql = 'SELECT * FROM '
                . $this->tabela
        ;

        if ($where !== null) {
            $sql .= ' WHERE ' . $where;
        }

        //$sql .= ' LIMIT 2';

        $con = Conexao::getInstance();
        $linhas = $con->query($sql);

        $retorno = array();
        $doClasse = $this->doClass;
        while ($linha = $linhas->fetch(PDO::FETCH_ASSOC)) {
            $o = new $doClasse();
            $o->setFromBd($linha);
            $retorno[] = $o;
        }

        return $retorno;
    }

    public function update(Vo $objetoVo) {
        $valores = $objetoVo->getAll();

        $parametros = array();
        $where = NULL;

        foreach ($valores as $atributo => $valor) {
            if ($atributo == $this->pk) {
                $where = $atributo . ' = :' . $atributo;
                continue;
            }
            
            $parametros[] = $atributo . ' = :' . $atributo;
        }
        
        if ($where === NULL) {
            throw new Exception('PK não encontrada no Vo');
        }

        $sql = 'UPDATE '
                . $this->tabela
                . ' SET ' . join(', ', $parametros)
                . ' WHERE ' . $where
        ;
        
        $con = Conexao::getInstance();
        
        $stmt = $con->prepare($sql);

        return $stmt->execute($valores);
    }

    public function delete($where) {
        $sql = 'DELETE FROM '
                . $this->tabela
                . ' WHERE ' . $where
        ;

        $con = Conexao::getInstance();
        $con->query($sql);
    }

}
