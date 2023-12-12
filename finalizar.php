<?php
session_start();

function limparCarrinho()
{
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <header>
            <div class="card mt-5 text-center">
                <div class="card-body">
                    <h3 class="card-title">Finalização de compra</h3>
                </div>
            </div>
        </header>

        <?php
        require_once("conexao.php");

        if (isset($_SESSION['carrinho']) && isset($_SESSION['total'])) {
            if (is_numeric($_SESSION['total'])) {
                $valorVenda = $_SESSION['total'];
                $sqlInserirVenda = "INSERT INTO vendas (valor) VALUES ($valorVenda)";
                $conn->query("$produtos");
                $idVenda = $conn->insert_id; //pegando o id da última venda realizada
                foreach ($_SESSION['carrinho'] as $id => $qtd) {
                    $sqlInserirItensVenda = "INSERT INTO itensvenda(idvenda, idproduto, qtd) VALUES($idVenda, $id, $qtd)";
                    $conn->query("$sqlInserirItensVenda");
                }
        ?>
                <div class="alert alert-success mt-3" role="alert">
                    Venda realizada com sucesso!
                    <a href="produtos.php" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg>&nbsp;Continuar comprando...</a>
                </div>
                <h2>Resumo do pedido</h2>
                <table class="table table-strip mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Subtotal</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if (count($_SESSION['carrinho']) == 0) {
                            ?>
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-warning">
                                    Nenhum produto no carrinho.
                                </div>
                            </td>
                        </tr>
                        <?php
                            } else {
                                $total = 0;
                                //var_dump($_SESSION['carrinho']);
                                foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                    $sql        = "SELECT * FROM produtos WHERE id = $id";
                                    //echo $sql;
                                    $dados      = $conn->query($sql) or die(mysqli_error($conn));
                                    $produto    = $dados->fetch_assoc();
                                    $nome       = $produto['nome'];
                                    $preco      = number_format($produto['preco'], 2, ',', '.');
                                    $sub        = number_format($produto['preco'] * $qtd, 2, ',', '.');
                                    $total      += floatval(str_replace('.', '', $sub));

                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nome; ?></td>
                                <td>
                                    <?php echo $qtd; ?>

                                </td>
                                <td style="text-align: right;"><?php echo $preco; ?></td>
                                <td style="text-align: right;"><?php echo $sub; ?></td>

                            </tr>


                        <?php
                                }

                        ?>
                        <tr style=" background-color: #ccc;">
                            <td colspan="4" style="text-align: right; font-weight: bold;">Total</td>
                            <td style="text-align: right; font-weight: bold;"><?php echo number_format($total, 2, ',', '.'); ?></td>
                        </tr>
                    <?php
                                $_SESSION['total'] = $total;
                            }
                    ?>
                </table>
                <div class="text-center alert alert-primary p-5">
                    <h2>Muito obrigado!!!</h2>
                    <h3>Em breve o seu pedido será enviado e você receberá o código de rastreio...</h3>
                </div>
            <?php
            }
            limparCarrinho();
        } else {
            ?>
            <div class="alert alert-warning mt-3" role="alert">
                Nenhum item foi escolhido para compra!
                <a href="produtos.php" class="btn btn-primary">Continuar comprando...</a>
            </div>
        <?php
        }
        ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>