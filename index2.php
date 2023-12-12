<?php
include_once("conexao.php");
include_once("menu.php");

if (isset($_GET['id'])) {
    $produto_id = $_GET['id'];

    $sqlEstoque = "SELECT estoque FROM produtos WHERE id = $produto_id";
    $resultEstoque = $conn->query($sqlEstoque);

    if ($resultEstoque) {
        $exib = $resultEstoque->fetch_assoc();
        if ($exib['estoque'] > 0) {
            echo "Estoque: {$exib['estoque']}";
        } else {
            echo "<script>alert('Produto Indisponível.');</script>";
        }
    } else {
        echo "Erro na consulta de estoque: " . $conn->error;
    }

    $sql = "SELECT * FROM produtos WHERE id = $produto_id";
    $result = $conn->query($sql);

    if ($result) {
        while ($exibir = $result->fetch_assoc()) {
            ?>
            <!DOCTYPE html>
            <html lang="pt-BR">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Tutorial</title>
                <!-- Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Roboto:" rel="stylesheet">
                <!-- CSS -->
                <link href="style.css" rel="stylesheet">
                <meta name="robots" content="noindex,follow" />
            </head>

            <body>
                <?php include_once("menu.php"); ?>

                <main class="container">
                    <!-- Left Column / Headphones Image -->
                    <div class="left-column">
                        <img data-image="black" src="<?php echo $exibir["imagem"]; ?>" alt="Imagem do Produto">
                        <img data-image="white" style="marginleft: 20px" src="moletompreto.png" alt="">
                    </div>

                    <!-- Right Column -->
                    <div class="right-column">
                        <!-- Product Description -->
                        <div class="product-description">
                            <h1 class="fw-bolder">
                                <?php echo $exibir["nomeproduto"]; ?>
                            </h1>
                            <p>
                                <?php echo $exibir["descricao"]; ?>
                            </p>
                        </div>

                        <!-- Product Configuration -->
                        <div class="product-configuration">
                            <!-- Product Color -->
                            <div class="product-color">
                                <span>Cor</span>
                                <div class="color-choose">
                                    <div>
                                        <input data-image="white" type="radio" id="white" name="color" value="white">
                                        <label for="white"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="black" type="radio" id="black" name="color" value="black">
                                        <label for="black"><span></span></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Cable Configuration -->
                            <div class="cable-config">
                                <span>Tamanho</span>
                                <div class="cable-choose">
                                    <button>P</button>
                                    <button>M</button>
                                    <button>G</button>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- Product Pricing -->
                        <div class="product-price">
                            <span>R$ <?php echo $exibir["preco"]; ?></span>
                            <a href="meucarrinho.php?acao=add&id=<?php echo $produto_id ?>" class="cart-btn">Adicionar ao carrinho</a>
                        </div>
                    </div>
                </main>

                <!-- Scripts -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="script.js" charset="utf-8"></script>
            </body>

            </html>
            <?php
        }
    } else {
        echo "Erro na consulta: " . $conn->error;
    }

    $conn->close();
}
?>
