
<?php
var_dump($_POST);
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeproduto = $_POST['nomeproduto'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];

    // Inserir dados na tabela produtos
    $sql = "INSERT INTO produtos (nomeproduto, preco, estoque, descricao, imagem, cor, tamanho) 
            VALUES ('$nomeproduto', $preco, $estoque, '$descricao', '$imagem', '$cor', '$tamanho')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "Produto inserido com sucesso, ID: " . $last_id;
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
