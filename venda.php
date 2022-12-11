<?php
require_once('./configs/conexao.php');
require_once('./models/cliente_produto.class.php');
require_once('./models/carrinho.class.php');

$produto_id = $_GET['produto_id'];
$cliente_id = $_GET['cliente_id'];
$quantidade = $_POST['quantidade'];

ClienteProduto::adicionarClienteProduto($conexao, $cliente_id, $produto_id);
Carrinho::adicionarProdutoAoCarrinho($conexao, $quantidade, $produto_id, $cliente_id);

header('location: ./home.php?id=' . $cliente_id);

?>