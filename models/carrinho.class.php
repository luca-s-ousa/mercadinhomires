<?php
class Carrinho
{
    public $id;
    public $quantidade;
    public $produto_id;
    public $cliente_id;

    public function __construct($id, $quantidade, $produto_id, $cliente_id)
    {
        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->produto_id = $produto_id;
        $this->cliente_id = $cliente_id;
    }

    public static function adicionarProdutoAoCarrinho($con, $quantidade, $produto_id, $cliente_id)
    {
        $sql = "INSERT INTO carrinho (quantidade, produto_id, cliente_id) VALUES ('$quantidade', '$produto_id', '$cliente_id')";
        $con->query($sql);
    }

    public static function quantidadeDeItens($con, $cliente_id)
    {
        $sql = "SELECT sum(quantidade) FROM carrinho WHERE cliente_id = $cliente_id";

        $result = $con->query($sql);
        $quantidade = $result->fetch();

        return $quantidade['sum(quantidade)'];
    }

    public static function precoTotal($con, $cliente_id)
    {
        $sql = "SELECT sum((p.preco * c.quantidade)) FROM produtos p JOIN carrinho c ON c.produto_id = p.id WHERE c.cliente_id = $cliente_id";

        $result = $con->query($sql);
        $precoTotal = $result->fetch();

        return $precoTotal['sum((p.preco * c.quantidade))'];
    }

    public static function esvaziarCarrinho($con, $cliente_id)
    {
        $sql = "DELETE FROM carrinho WHERE cliente_id = $cliente_id";
        $con->query($sql);
    }
}

?>