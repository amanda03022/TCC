<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <title>Exibição de Pedidos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 100px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
include_once("conexao.php");
include_once("menu_administrador.php");
$sql = "SELECT id, data_pedido, nomeproduto, quantidade, preco FROM pedidos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Data do Pedido</th>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>";

    // Exibir cada linha de dados
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["data_pedido"]."</td>
                <td>".$row["nomeproduto"]."</td>
                <td>".$row["quantidade"]."</td>
                <td>".$row["preco"]."</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "0 resultados encontrados";
}

// Fechar conexão
$conn->close();
?>

</body>
</html>


