<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/home.css">
    <title>Home</title>
</head>

<body>
    <?php

    require_once('./configs/conexao.php');
    require_once('./models/cliente.class.php');
    require_once('./models/carrinho.class.php');

    $cliente_id = $_GET['id'];

    $clienteAtual = Cliente::detalharCliente($conexao, $cliente_id);
    $quantidadeDeItens = Carrinho::quantidadeDeItens($conexao, $cliente_id);
    $precoTotal = Carrinho::precoTotal($conexao, $cliente_id);

    ?>

    <header class="topo__site">
        <div class="topo__autenticacao">
            <a href="./cadastro.php?id=<?= $cliente_id ?>">
                <?= $clienteAtual->nome ?>
            </a>
            <a class="sair" href="./login.php">Sair</a>
        </div>
        <div class="topo__principal">
            <h1 class="topo__logo">Mercadinho<span>Mires</span></h1>
            <div class="topo__buscar">
                <input type="text" placeholder="Buscar por um ou mais produtos" />
                <button>Buscar</button>
            </div>
        </div>
        <div class="topo__navbar">
            <nav>
                <ul>
                    <li><a href="#">Departamentos</a></li>
                    <li><a href="#" class="pagina__selecionada">Ofertas</a></li>
                    <li><a href="#">Coleções</a></li>
                    <li><a href="#">Recentes</a></li>
                    <li><a href="#">Mais vendidos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- <div>
        <h3>Carrinho</h3>
        <p>Total de itens: <?= $quantidadeDeItens ?? 0 ?>
        </p>
        <p>Total a pagar: R$ <?= $precoTotal ?? 0 ?>
        </p>
        <a href="./finalizarCompra.php?cliente_id=<?= $cliente_id ?>">Finalizar Compra</a>
    </div> -->


    <main class="area__principal">
        <section class="section__produtos">
            <div class="section__produto">
                <h2 id="matinais-e-sobremesas">Ofertas</h2>
                <div class="area__lista__produtos">
                    <?php
                    require_once('./configs/conexao.php');
                    require_once('./models/produto.class.php');

                    $produtos = Produto::listarProdutos($conexao);

                    foreach ($produtos as $produto) {
                    ?>

                    <div class="area__produto">
                        <span>Oferta</span>
                        <img src="<?= $produto->link_imagem ?>" />
                        <h3>
                            <?= $produto->nome_produto ?>
                        </h3>
                        <p>
                            R$ <?= $produto->preco ?>
                        </p>
                        <form class="area__compra" method="post"
                            action="./venda.php?cliente_id=<?= $clienteAtual->id ?>&produto_id=<?= $produto->id ?>">
                            <div class="input__area__compra">
                                <label for="quantidade">Quantidade:</label>
                                <input type="number" name="quantidade" required>
                            </div>

                            <button>Adicionar ao carrinho</button>
                        </form>

                    </div>

                    <?php } ?>
                </div>

            </div>

        </section>
        <div class="area__carrinho">
            <div class="carrinho__dados__area">
                <div class="carrinho__texto__area">
                    <h3>Meu carrinho de compras</h3>
                    <img src="./assets/carrinho-de-compras3.png" />
                </div>
                <div class="carrinho__input__area">
                    <div class="carrinho__infos">
                        <p>
                            <?= $quantidadeDeItens ?? 0 ?> itens
                        </p>
                        <p>R$ <?= $precoTotal ?? 0 ?>
                        </p>
                    </div>
                </div>
            </div>
            <a href="./finalizarCompra.php?cliente_id=<?= $cliente_id ?>" class="finalizar__compra">
                <img src="./assets/carrinho-de-compras3.png" alt="" />
                <p>Finalizar compra</p>
                <img src="./assets/carrinho-de-compras3.png" alt="" />
            </a>
        </div>

    </main>

    <footer class="rodape__area__principal">
        <div class="rodape__info__contato">
            <div class="texto__area__contato">
                <p>mercadinhomires@email.com</p>
                <p>Rua Coelho Neto, Nº 658</p>
                <p>Bairro Nova Caxias</p>
            </div>
        </div>
        <div class="redes__sociais">
            <img src="./assets/whatsapp.png" alt="" />
            <img src="./assets/instagram.png" alt="" />
            <img src="./assets/facebook.png" alt="" />
        </div>
    </footer>
</body>

</html>