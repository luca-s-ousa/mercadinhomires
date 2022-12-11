<?php
require_once('./configs/conexao.php');
require_once('./models/cliente.class.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];


Cliente::cadastrarCliente($conexao, $nome, $email, $senha);

header('Location: ./login.php');



?>