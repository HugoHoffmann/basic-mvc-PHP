<?php
class ViewCliente{
    private $aClientes = [];
    
    public function getClientes() {
        return $this->aClientes;
    }

    public function setClientes($aClientes) {
        $this->aClientes = $aClientes;
    }
    
    public function montaConsulta(){
        echo '<table border="1px">';
        echo    '<tr>';
        echo        '<td>Código</td>';
        echo        '<td>Nome</td>';
        echo    '</tr>';
        foreach($this->aClientes as $oCliente){
            echo    '<tr>';
            echo        '<td>'.$oCliente->getCodigo().'</td>';
            echo        '<td>'.$oCliente->getNome().'</td>';
            echo    '</tr>';
        }
        echo '</table>';
    }
    
    public function montaFormulario(){
        echo "<form action = 'index.php' method='POST' >";
            echo "<label>Nome</label>";
            echo "<input type = 'text' name = 'nome'/>";
            echo "<input type = 'submit'  value = 'Gravar'/>";
        echo "</form>";
    }
}