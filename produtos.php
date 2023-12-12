<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="produtos.css">
</head>

<body>
    <header>
        <?php
        include_once("menu.php");
        include_once("conexao.php");
        ?>
    </header>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
                <?php
                $sql = "SELECT * FROM produtos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($exibir = $result->fetch_assoc()) {
                ?>
                        <div class="col">
                            <div class="card h-100">
                                <!-- Product image -->
                                <img src="<?php echo $exibir["imagem"]; ?>" alt="Imagem do Produto" class="card-img-top">

                                <!-- Product details -->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name -->
                                        <h5 class="fw-bolder"><?php echo $exibir["nomeproduto"]; ?></h5>
                                        <!-- Product price -->
                                        R$ <?php echo $exibir["preco"]; ?>
                                    </div>
                                </div>

                                <!-- Product actions -->
                                <div class="card-footer p-100 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a style="color: black; text-decoration: double;" class="btn btn-outline-dark mt-auto" href="index2.php?id=<?php echo $exibir['id']; ?>">Ver produto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <?php
                } else {
                    echo "Nenhum registro encontrado.";
                }
                $conn->close();
    ?>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Unique &copy; 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

</body>

</html>
