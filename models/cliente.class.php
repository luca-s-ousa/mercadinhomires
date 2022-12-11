<?php
class Cliente
{
    public $id;
    public $nome;
    public $email;
    public $senha;


    public function __construct($id, $nome, $email, $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    // detalhar cliente
    public static function detalharCliente($con, $id)
    {
        $sql = "SELECT * FROM clientes WHERE id = $id";
        $result = $con->query($sql);
        $row = $result->fetch();
        return new Cliente($row['id'], $row['nome'], $row['email'], $row['senha']);
    }

    // cadastrar um cliente
    public static function cadastrarCliente($con, $nome, $email, $senha)
    {
        $sql = "INSERT INTO clientes (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        $con->query($sql);
    }

    //listar clientes
    public static function listarClientes($con)
    {
        $sql = "SELECT * FROM clientes";
        $result = $con->query($sql);
        foreach ($result as $row) {
            $clientes[] = new Cliente($row['id'], $row['nome'], $row['email'], $row['senha'], );
        }
        return $clientes;
    }

    // deletar cliente
    public static function deletarCliente($con, $id)
    {
        $sql = "DELETE FROM clientes WHERE id = $id";
        $con->query($sql);
    }

    //atualizar clientes
    public static function atualizarCliente($con, $id, $nome, $email, $senha)
    {
        $sql = "UPDATE clientes SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id'";
        $con->query($sql);
    }
}
?>