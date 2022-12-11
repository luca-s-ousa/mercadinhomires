<?php

require './vendor/autoload.php';

include_once './configs/conexao.php';

$query_clientes = "SELECT * FROM clientes";
$result_clientes = $conexao->prepare($query_clientes);
$result_clientes->execute();

$query_cliente_produto = "SELECT * FROM cliente_produto";
$result_cliente_produto = $conexao->prepare($query_cliente_produto);
$result_cliente_produto->execute();

$query_produtos = "SELECT * FROM produtos";
$result_produtos = $conexao->prepare($query_produtos);
$result_produtos->execute();

$query_carrinho = "SELECT * FROM carrinho";
$result_carrinho = $conexao->prepare($query_carrinho);
$result_carrinho->execute();

$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/gerarRelatorios/styles/gerarRelatorio.css'>";
$dados .= "<title>Relatório</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Relatório do Banco de Dados</h1>";
$dados .= "<h2>Tabela Clientes</h2>";

//ler os registros retornado BD
while ($row_cliente = $result_clientes->fetch(PDO::FETCH_ASSOC)) {
    extract($row_cliente);
    $dados .= "ID: " . (string) $id . "<br>";
    $dados .= "Nome: " . (string) $nome . "<br>";
    $dados .= "Email: " . (string) $email . "<br>";
    $dados .= "Senha: " . (string) $senha . "<br>";
    $dados .= "<hr>";
}

$dados .= "<br><br>";
$dados .= "<h2>Tabela Cliente_Produto</h2>";

while ($row_cliente_produto = $result_cliente_produto->fetch(PDO::FETCH_ASSOC)) {
    extract($row_cliente_produto);
    $dados .= "Cliente_id: " . (string) $cliente_id . "<br>";
    $dados .= "Produto_id: " . (string) $produto_id . "<br>";
    $dados .= "<hr>";
}

$dados .= "<br><br>";
$dados .= "<h2>Tabela Produtos</h2>";

while ($row_produto = $result_produtos->fetch(PDO::FETCH_ASSOC)) {
    extract($row_produto);
    $dados .= "id: " . (string) $id . "<br>";
    $dados .= "link_imagem: " . (string) $link_imagem . "<br>";
    $dados .= "nome_produto: " . (string) $nome_produto . "<br>";
    $dados .= "preco: " . (string) $preco . "<br>";
    $dados .= "<hr>";
}

$dados .= "<br><br>";
$dados .= "<h2>Tabela Carrinho</h2>";

while ($row_carrinho = $result_carrinho->fetch(PDO::FETCH_ASSOC)) {
    extract($row_carrinho);
    $dados .= "id: " . (string) $id . "<br>";
    $dados .= "quantidade: " . (string) $quantidade . "<br>";
    $dados .= "produto_id: " . (string) $produto_id . "<br>";
    $dados .= "cliente_id: " . (string) $cliente_id . "<br>";
    $dados .= "<hr>";
}

$dados .= "</body>";
$dados .= "</html>";

use Dompdf\Dompdf;

$dompdf = new Dompdf(['enable_remote' => true]);

$dompdf->loadHtml($dados);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream(
    "Relatório_Mercadinho_Mires_Bando_de_Dados",
    array(
        "Attachment" => false
    )
);

?>