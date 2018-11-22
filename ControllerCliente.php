<?php
require_once 'ModelCliente.php';
require_once 'PersistenciaCliente.php';
require_once 'ViewCliente.php';
class ControllerCliente{
    
    /**
     *
     * @var ModelCliente 
     */
    protected $ModelCliente;
    
    /**
     * @var ViewCliente 
     */
    protected $ViewCliente;
    
    /**
     * @var PersistenciaCliente 
     */
    protected $PersistenciaCliente;

    public function __construct() {
        $this->processa();
    }
    
    public function gravaDados(){
        $sNome = $_POST['nome'];
        $this->ModelCliente = new ModelCliente();
        $this->ModelCliente->setNome($sNome);
        $this->PersistenciaCliente->setModelCliente($this->ModelCliente);
        $this->PersistenciaCliente->grava();
    }
    
    public function processa() {
        $this->PersistenciaCliente = new PersistenciaCliente();        
        if(isset($_POST['nome']) && $_POST['nome'] != ''){
            $this->gravaDados();
        }
        $aClientes = $this->PersistenciaCliente->lista();
        $this->ViewCliente         = new ViewCliente();        
        $this->ViewCliente->setClientes($aClientes);
        $this->ViewCliente->montaFormulario();
        $this->ViewCliente->montaConsulta();
    }
}