<?php
include('menu_administrador.php');
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Produto</title>
</head>
<style>
    body {
    margin: 0;
    padding: 0;
}

h2 {
    margin-top: 50px; /* Adicione um espaçamento superior ao cabeçalho */
}

form {
    margin-top: 20px; /* Adicione um espaçamento superior ao formulário */
}

label {
    display: block;
    margin-bottom: 8px;
}

input,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
<body>

<h2>Formulário de Inserção de Produto</h2>

<form action="cadprodutos.php" method="post" enctype="multipart/form-data">
    <label for="nomeproduto">Nome do Produto:</label>
    <input type="text" id="nomeproduto" name="nomeproduto" required><br>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco" step="0.01" required><br>

    <label for="estoque">Estoque:</label>
    <input type="number" id="estoque" name="estoque" required><br>

    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" required></textarea><br>

    <label for="imagem">Url da imagem:</label>
    <input type="text" id="imagem" name="imagem" required><br>

    <label for="cor">Cor:</label>
    <input type="text" id="cor" name="cor" required><br>

    <label for="tamanho">Tamanho:</label>
    <input type="text" id="tamanho" name="tamanho" required><br>

    <input type="submit" value="Adicionar Produto">
</form>

</body>
</html>
