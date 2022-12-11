<?php
require('./configs/conexao.php');
require('./models/carrinho.class.php');
require('./models/cliente.class.php');

$cliente_id = $_GET['cliente_id'];

Carrinho::esvaziarCarrinho($conexao, $cliente_id);
$clienteNome = Cliente::detalharCliente($conexao, $cliente_id);

echo " <script>
    alert('Obridado pela preferência $clienteNome->nome!');
    window.location.href='./home.php?id=$cliente_id';

    </script> ";

// header('location: ./home.php?id=' . $cliente_id);


?>