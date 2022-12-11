<?php
class Produto
{
    public $id;
    public $link_imagem;
    public $nome_produto;
    public $preco;

    public function __construct($id, $link_imagem, $nome_produto, $preco)
    {
        $this->id = $id;
        $this->link_imagem = $link_imagem;
        $this->nome_produto = $nome_produto;
        $this->preco = $preco;
    }

    // detalhar produto
    public static function detalharProduto($con, $id)
    {
        $sql = "SELECT * FROM produtos WHERE id = $id";
        $result = $con->query($sql);
        $row = $result->fetch();
        return new Produto($row['id'], $row['link_imagem'], $row['nome_produto'], $row['preco']);
    }

    //adicionar produto
    public static function adicionarProduto($con, $link_imagem, $nome_produto, $preco)
    {
        $sql = "INSERT INTO produtos (link_imagem, nome_produto, preco) VALUES ('$link_imagem', '$nome_produto', '$preco')";
        $con->query($sql);
    }

    //listar produtos
    public static function listarProdutos($con)
    {
        $sql = "SELECT * FROM produtos";
        $result = $con->query($sql);
        foreach ($result as $row) {
            $produtos[] = new Produto($row['id'], $row['link_imagem'], $row['nome_produto'], $row['preco']);
        }
        return $produtos;
    }

    //deletar produto
    public static function deletarProduto($con, $id)
    {
        $sql = "DELETE FROM produtos WHERE id = $id";
        $con->query($sql);
    }

    //atualizar produto
    public static function atualizarProduto($con, $id, $link_imagem, $nome_produto, $preco)
    {
        $sql = "UPDATE produtos SET link_imagem = '$link_imagem', nome_produto = '$nome_produto', preco = '$preco' WHERE id = $id";
        $con->query($sql);
    }
}

?>