<?php

class CRUD
{
    public $servidor    = SERVIDOR;
    public $usuario     = NOMEUSERDB;
    public $senha       = USERPASS;
    public $banco       = NOMEDB;
    public $conecta     = NULL;
    
    
    private $tabela;
    
    function getTabela() {
        return $this->tabela;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    public function __construct() {
        $this->conexao();
    }
    
    public function conexao(){
        $this->conecta = new PDO('mysql:host=' . $this->servidor . ';dbname=' . $this->banco, $this->usuario, $this->senha);
        $this->conecta->setAttribute(PDD::ATTR_ERRMODE_EXCEPTION);        
    }
    
    public function inserir($dados = array()){
        $colunas->implode(", ", array_keys($dados));
    }
    
}