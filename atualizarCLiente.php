<?php
require_once('./configs/conexao.php');
require_once('./models/cliente.class.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

Cliente::atualizarCliente($conexao, $id, $nome, $email, $senha);
header('location: ./home.php?id=' . $id);

?>