<?php
class ClienteProduto
{
    public $cliente_id;
    public $produto_id;

    public function __construct($cliente_id, $produto_id)
    {
        $this->cliente_id;
        $this->produto_id;
    }

    public static function adicionarClienteProduto($con, $cliente_id, $produto_id)
    {
        $sql = "INSERT INTO cliente_produto (cliente_id, produto_id) VALUES ('$cliente_id', '$produto_id')";
        $con->query($sql);
    }

}


?>