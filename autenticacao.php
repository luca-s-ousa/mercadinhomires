<?php
require_once('./configs/conexao.php');
require_once('./models/cliente.class.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql_logar = $conexao->query("SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha' ");


if ($sql_logar->rowCount() > 0) {

    $row = $sql_logar->fetch();
    header("location: ./home.php?id=" . $row['id']);

} else {
    echo " <script>
    alert('Usuário Não Registrado!');
    window.location.href='./login.php';

    </script> ";

    // echo mysqli_num_rows($sql_logar);
}

?>