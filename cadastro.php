<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/cadastro.css" />
    <title>Cadastre-se</title>
  </head>

  <body>
    <?php
    require_once('./configs/conexao.php');
    require_once('./models/cliente.class.php');

    $id = $_GET['id'] ?? null;

    if ($id) {
        $cliente = Cliente::detalharCliente($conexao, $id);
    }

    ?>

    <section class="cadastro-area">
      <div class="topo-area">
        <div class="logo-area">
          <h1>Mercadinho</h1>
          <span>Mires</span>
        </div>
        <h1>
          <?= $id != null ? 'Atualizar' : 'Cadastro' ?>
        </h1>
      </div>
      <form
        class="form-area"
        method="post"
        action="./<?= $id != null ? 'atualizarCliente' : 'cadastrarCliente' ?>.php"
      >
        <?php
            if ($id) {
                echo '<input type="hidden" name="id" value="' . $id . '">'; } ?>
        <label>
          <span>Nome:</span>
          <input type="text" name="nome" value="<?= $cliente->nome ?? '' ?>" />
        </label>
        <label>
          <span>Email:</span>
          <input
            type="email"
            name="email"
            value="<?= $cliente->email ?? '' ?>"
          />
        </label>
        <label>
          <span>Senha:</span>
          <input
            type="password"
            name="senha"
            value="<?= $cliente->senha ?? '' ?>"
          />
        </label>
        <a class="link-cadastro" href="./login.php"
          >Já possui uma conta? Clique aqui para logar!</a
        >
        <button class="btn-cadastrar" type="submit">
          <?= $id != null ? 'Atualizar' : 'Cadastrar' ?>
        </button>
      </form>
    </section>
  </body>
</html>
