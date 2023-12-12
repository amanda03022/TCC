<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="unique.css">
<title>Uníque</title>
</head>


<body>
<?php
    include_once("menu.php");
  ?>

    <div class="Meio">
        <h1 style="font-family: DMSerifDisplay;  font-size: 50px;">Diferentes Sonhos...</h1>
        <h2 style="font-family: DMSerifDisplay;  font-size: 30px;">Exclusivas ideias!</h2>
        <P>Confira os produtos que estão em destaque esse mês 🌺</P>
        <button> <a href="#novascategorias" class="btn">Produtos em destaque</a></button>
    </div>
    <!--Meio-->
    </div>
    <!--background-->
    <section>
        <h1 style="font-family: DMSerifDisplay">NOSSOS PRODUTOS </h1>
        <div class="Container-card-1">
            <div class="cards">
                <img src="exemplo.jpg">
            </div>
            <!--cards-->

            <div class="cards">
                <img src="img/Luck-2.png">
            </div>
            <!--cards-->
        </div>
        <!--Container-card-1-->

        <div class="Container-card-1">
            <div class="cards">
                <img src="img/Untitled - 2.png">
            </div>
            <!--cards-->

            <div class="cards">
                <img src="img/luck-4.png">
            </div>
            <!--cards-->
        </div>
        <!--Container-card-1-->

        <div class="Container-card-1">
            <div class="cards">
                <img src="img/Untitled-3.png">
            </div>
            <!--cards-->

            <div class="cards">
                <img src="img/Untitled - 1.png">
            </div>
            <!--cards-->
        </div>
        <!--Container-card-1-->
    </section>



    <section>
        <h1 style="font-family: DMSerifDisplay;">DESTAQUES</h1>
        <div class="Container-roupas">
            <div class="roupa">
                <img src="img/roupa1.jpg" alt="">
                <p>Caneca Candy</p>
                <h5>R$20,00</h5>
                <ion-icon name="cart-outline"></ion-icon>
            </div>
            <!--roupa-->


            <div class="roupa">
                <img src="img/tren2.jpg" alt="">
                <p>Garrafa Forest</p>
                <h5>R$35,00</h5>
                <span>
                    <ion-icon name="cart-outline"></ion-icon>
                </span>
            </div>
            <!--roupa-->

            <div class="roupa">
                <img src="img/tren3.jpg" alt="">
                <p>Ecobag lisa</p>
                <h5>R$70,00</h5>
                <ion-icon name="cart-outline"></ion-icon>
            </div>
            <!--roupa-->

            <div class="roupa">
                <img src="img/tren4.jpg" alt="">
                <p>Case para iphone</p>
                <h5>R$15,00</h5>
                <ion-icon name="cart-outline"></ion-icon>
            </div>
            <!--roupa-->
        </div>
        <!--container-roupas-->
    </section>



    <section class="Contato" id="Contato">
        <div class="meio-contato">
            <h3 style="font-family: Brookshire; font-size: 40px;">Uníque</h3>
            <li><a href="faleconosco.php">Nós envie uma mensagem</a></li>
            <div class="icons">
                <a href="#"><i class='bx bxl-facebook-square'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
            </div>
        </div>

        <div class="meio-contato">
            <h3>Explore</h3>
            <li><a href="index.php">Início</a></li>
            <li><a href="#personalize">Personalize</a></li>
            <li><a href="meucarrinho.html">Seu carrinho</a></li>
            <li><a href="faleconosco.html">Contato</a></li>
        </div>

        <div class="meio-contato">
            <h3>Seu Perfil</h3>
            <li><a href="#">Cadastre-se</a></li>
            <li><a href="minhaconta.html">Login</a></li>
            <li><a href="meucarrinho.html">Meu carrinho</a></li>
        </div>

        <div class="meio-contato">
            <h3>Shopping</h3>
            <li><a href="caneca.html">Canecas</a></li>
            <li><a href="ecobag.html">Ecobag</a></li>
            <li><a href="capinha.html">Capinha</a></li>
            <li><a href="camisa.html">Camisa</a></li>
        </div>

    </section>

    <div class="last-text">
        <p>Copyright © 2023 All rights reserved</p>
    </div>





    <script src="https://unpkg.com/scrollreveal"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>
</body>

</html>