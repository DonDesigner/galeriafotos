<?php

class CRUD
{
    public $servidor    = SERVIDOR;
    public $usuario     = NOMEUSERDB;
    public $senha       = USERPASS;
    public $banco       = NOMEDB;
    public $conecta     = NULL;
    public $linhas      = -1;
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
        $this->linhas = $inserir->rowCount();
    }
    
    public function atualizar($dados = array(), $where)
    {
        foreach ($dados as $colunas => $valores)
        {
            $campos[] = "$colunas = '$valores'";
        }
        $campos = implode(', ', $campos);
        
        $sqlAtualizar = "UPDATE `{$this->getTabela()}` SET $campos  WHERE $where"; 
        //echo "<br>" . $sqlAtualizar . "<br>";
        $atualizar = $this->conecta->query($sqlAtualizar);
        
        $this->linhas = $atualizar->rowCount();        
    }
    
    
    public function deletar($where)
    {
        $sqlDeletar = "DELETE FROM `{$this->getTabela()}` WHERE {$where}";
        
        $deletar = $this->conecta->query($sqlDeletar);
        $this->linhas = $deletar->rowCount();
    }
    
    public function ler($campos = null, $where=NULL)
    {
        
        $campos = $campos != "" ? $campos : " * ";
        $sqlSelecionar = "SELECT {$campos} FROM {$this->tabela}";
        
        $seleciona = $this->conecta->query($sqlSelecionar);
        $seleciona->setFetchMode(PDO::FETCH_ASSOC);
        $this->linhas = $seleciona->rowCount();
        return $seleciona->fetchAll();
    }
    
   
            
}