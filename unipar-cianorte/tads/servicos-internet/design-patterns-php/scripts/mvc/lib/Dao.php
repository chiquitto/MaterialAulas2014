<?php

/**
 * Classe que manipula os Vo
 *
 * @author alisson
 */
abstract class Dao {
    
    protected $tabela;
    protected $pk;
    protected $vo;

    public function create(Vo $vo) {
        $dados = $vo->getAll();
        
        $indices = array();
        $parametros = array();
        foreach($dados as $indice => $valor) {
            $indices[] = $indice;
            $parametros[] = ':' . $indice;
        }
        
        $indices = join(',', $indices);
        $parametros = join(',', $parametros);
        
        $sql = "Insert Into "
                . $this->tabela
                . " ($indices) Values"
                . " ($parametros)"
                ;
        
        $con = Conexao::getInstance();
        
        $sqlPreparada = $con->prepare($sql);
        
        //$con->beginTransaction();
        $sqlPreparada->execute($dados);
        //$con->commit();
        
        return $con->lastInsertId();
    }
    
    public function request($where = NULL) {
        $sql = 'Select * From '
                . $this->tabela;
        
        if ($where !== NULL) {
            $sql .= ' Where ' . $where;
        }
        
        $con = Conexao::getInstance();
        $linhas = $con->query($sql);
        
        $retorno = array();
        $voClasse = $this->vo;
        while ($linha = $linhas->fetch(PDO::FETCH_ASSOC)) {
            $vo = new $voClasse();
            $vo->setAll($linha);
            $retorno[] = $vo;
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
        return $con->query($sql);
    }
    
}