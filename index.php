<?php

if(isset($_GET['cadastro'])){
    $sCadastro = $_GET['cadastro'];
    switch($sCadastro){
        case 'cliente':
            require 'ControllerCliente.php';
            new ControllerCliente();
        break;
        case 'produto':
            require 'ControllerProduto.php';
            new ControllerProduto();
        break;
    }
}

echo '<a href="index.php?cadastro=cliente&codigo=1&acao=excluir">Cliente</a>';
echo '<a href="index.php?cadastro=produto">Produto</a>';
