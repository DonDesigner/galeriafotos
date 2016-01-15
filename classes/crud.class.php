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
        $this->conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
    }                                    
    
    public function inserir($dados = array()){
        $colunas = implode(", ", array_keys($dados));
        $valores = "'" . implode("', '", $dados) . "'";
       
        $sqlInsert = "INSERT INTO `{$this->getTabela()}` ({$colunas}) VALUES ({$valores})";
        
        $inserir = $this->conecta->query($sqlInsert);
        if ($inserir){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function atualizar($dados = array(), $where)
    {
        foreach ($dados as $colunas => $valores)
        {
            $campos[] = "$colunas = '$valores'";
        }
        $campos = implode(', ', $campos);
        
        $sqlAtualizar = "UPDATE `{$this->getTabela()}` SET $campos  WHERE $where"; 
        
        $atualizar = $this->conecta->query($sqlAtualizar);
        if($atualizar){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
}