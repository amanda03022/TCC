<?php
//Pegar o carrinho do banco de dados
include_once("conexao.php");
session_start();
if(isset($_SESSION['id']) && trim($_SESSION['id'])!=""){
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM carrinho WHERE idUsuario = $user_id";
    $dados = $conn->query($sql) or die(mysqli_error($conn));
    while($produto = $dados->fetch_assoc()){
        $idProduto = $produto['idProduto'];
        $quant = $produto['quant'];
        $_SESSION['carrinho'][$idProduto]=$quant;
    }
}

?>
<style>
    header{
    display: flex;
    justify-content: space-around;
    padding-top: 1rem;
    align-items: center;
    text-align: center;
    width: 100%;
    top: 0;
    right: 0;
    z-index: 1000;
    position: fixed;
    background: transparent;
    transition: all .35s ease;
    background-color: #fff;
    padding: 14px 14%;
  }
  
  
  .logo{
    font-weight: 500;
    font-size: 1rem;
  }
  
  .cabeçalho-link{
    display: flex;
    gap: 3rem;
  }
  
  .cabeçalho-link a{
    color: #111;
    font-weight: 700;
    transition: 0.3s;
  }
  
  .cabeçalho-link a:hover{
    color: #c8815f;
  }
  
  .icon span{
    font-size: 2rem;
    cursor: pointer;
   
  }
  
  .icon span:hover{
    color: #c8815f;
  }
  @font-face {
    font-family: 'Brookshire';
    src: url(EFCO\ Brookshire\ Regular.ttf)
     format('truetype');
     font-weight: normal;
     font-style: normal;
  
  }
  a { color: inherit; } 
  
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
    text-decoration: none;
    list-style: none;
    
  }
  a:link {
    text-decoration:none;
    }
    </style>
<div class="background">
        <header>
            <div class="logo">
                <a style="font-family: Brookshire; color: #4C3B34; font-size: 40px;" href="index.php" >Uníque.</a>
    
                
            </div><!--logo-->
    
            <div class="cabeçalho-link">
               
                <li>
                    <a href="produtos.php">Produtos</a>
                </li>
                <li>
                    <a href="personalize.php">Personalize</a>
                </li>
                <li>
                    <a href="minhaconta.php">Minha Conta</a>
                </li>
                <li>
                    <a href="faleconosco.php">Contato</a>
                </li>
                <li>
                    <a href="sair.php">Sair</a>
                </li>
            </div><!--cabeçalho-link-->
    
            <a href="meucarrinho.php">
            <div class="icon">
                <span>
                <ion-icon name="bag-outline" ></ion-icon> 
            </span>
            </div><!--icon--> </a>
    
        </header>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
