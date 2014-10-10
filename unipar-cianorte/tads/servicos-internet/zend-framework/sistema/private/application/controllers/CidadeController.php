<?php

class CidadeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $dbtable = new Application_Model_DbTable_Cidade();
        $cidade = $dbtable->fetchAll();
        $cidadeArray = $cidade->toArray();
        
        $this->view->listaCidade = $cidadeArray;
    }
    
    public function cadastrarAction() {
        $formCidade = new Application_Form_Cidade();
        
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getParams();
            
            if($formCidade->isValid($data)){
                $data = $formCidade->getValues();
                
                $cidadeModel = new Application_Model_Cidade();
                $cidadeModel->cadastrar($data);
            }
        }
        
        $this->view->formCidade = $formCidade;
    }
    
    public function editarAction() {
        $idcidade = $this->getRequest()->getParam('idcidade');
        $cidadetabela = new Application_Model_DbTable_Cidade();
        $cidade = $cidadetabela->fetchRow("idcidade = '$idcidade'");
        if($cidade === null){
            echo 'cidade nao encontrada';
            exit();
        }
        //$ufarray = $uf->toArray();
        $cidadeForm = new Application_Form_Cidade();
        
        if($this->getRequest()->isPost()){
            $dados = $this->getRequest()->getParams();
            if($cidadeForm->isValid($dados)){
                $dados = $cidadeForm->getValues();
                $model = new Application_Model_Cidade();
                $model->editar($dados,$idcidade);
                $this->_helper->redirector->gotoSimpleAndExit('index');
            }
        }else{
        $cidadeForm->populate(array(
            "nome"=>$cidade->cidade,
            "populacao"=>$cidade->populacao,
            "uf"=>$cidade->iduf
                ));
        }
        $this->view->formCidade = $cidadeForm;
        
        
    }


}

