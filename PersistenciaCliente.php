<?php
require_once 'ModelCliente.php';
class PersistenciaCliente{
    protected $oConexao;
    protected $ModelCliente;
    
    /**
     * insert into tbpessoa (pesnome) values ('Diego Didimo');
        insert into tbpessoa (pesnome) values ('Jonas Brothers');

        select * from tbpessoa;

        update tbpessoa set pesnome = 'Diego Didimo' where pescodigo = 1;

        delete from tbpessoa where pescodigo = 2;
     *     */
    
    public function __construct(){
        $this->oConexao = pg_connect('host=localhost 
                                      dbname=mvc 
                                      port=5432 
                                      user=postgres 
                                      password=ipm@1234567');
    }
    
    public function __destruct() {
        pg_close($this->oConexao);
    }
    
    public function lista(){
        $oResult = pg_exec($this->oConexao, 'select * from tbpessoa');
        $aResultado = [];
        /*$aRes = ['pescodigo'=>1,
                   'pesnome'=>'Diego Didimo']*/
        while($aRes = pg_fetch_array($oResult)){
            $oCliente = new ModelCliente();
            $oCliente->setCodigo($aRes['pescodigo']);
            $oCliente->setNome($aRes['pesnome']);
            $aResultado[] = $oCliente;
        }
        return $aResultado;
    }
    
    public function grava(){        
        //insert into tbpessoa (pesnome) values ('Diego Didimo');
        return pg_exec($this->oConexao, "insert into tbpessoa (pesnome) values ('".$this->ModelCliente->getNome()."')");
    }
    
    public function exclui(){
        //delete from tbpessoa where pescodigo = 2;
        return pg_exec($this->oConexao, "delete from tbpessoa where pescodigo = ".$this->ModelCliente->getCodigo());
    }
    
    public function altera(){
        return pg_exec($this->oConexao, "update tbpessoa set pesnome = '".$this->ModelCliente->getNome()."' where pescodigo = ".$this->ModelCliente->getCodigo());
    }
    
    public function getModelCliente() {
        return $this->ModelCliente;
    }

    public function setModelCliente($ModelCliente) {
        $this->ModelCliente = $ModelCliente;
    }
}