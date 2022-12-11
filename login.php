<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>Login</title>
</head>

<body>
    <section class="login-area">
        <div class="topo-area">
            <div class="logo-area">
                <h1>Mercadinho</h1>
                <span>Mires</span>
            </div>
            <h1>Login</h1>
        </div>
        <form class="form-area" method="post" action="./autenticacao.php">
            <label>
                <span>Email:</span>
                <input type="email" name="email">
            </label>
            <label>
                <span>Senha:</span>
                <input type="password" name="senha">
            </label>
            <a class="link-cadastro" href="./cadastro.php">Clique aqui para criar uma conta</a>
            <button class="btn-entrar" type="submit">Entrar</button>
        </form>
    </section>
</body>

</html>