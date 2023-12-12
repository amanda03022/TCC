<?php
session_start();
include_once("conexao.php");
try {

if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redireciona para a página de login se o usuário não estiver logado
    exit();
}

$user_id = $_SESSION['id'];

// Consulta para obter os pedidos do usuário logado
$sqlPedidos = "SELECT * FROM pedidos WHERE idUsuarios = '$user_id'";
$resultPedidos = $conn->query($sqlPedidos);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
</head>

<body>
    <?php include_once("menu.php"); ?>

    <div class="container">
        <h2>Meus Pedidos</h2>

        <?php
        if ($resultPedidos->num_rows > 0) {
            while ($pedido = $resultPedidos->fetch_assoc()) {
                // Exibir informações do pedido
                echo "<p>Data do Pedido: " . $pedido['data_pedido'] . "</p>";
                echo "<p>Produto: " . $pedido['nomeproduto'] . "</p>";
                echo "<p>Quantidade: " . $pedido['quantidade'] . "</p>";
                echo "<p>Preço Unitário: " . $pedido['preco'] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "<p>Nenhum pedido encontrado.</p>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Erro na consulta: " . $e->getMessage();
    }
        ?>

    </div>

</body>

</html>


