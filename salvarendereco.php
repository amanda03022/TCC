<?php
session_start();
include('conexao.php');

// Obter o e-mail do usuário logado
$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Buscar o ID do usuário pelo e-mail
$sql = "SELECT id FROM usuarios WHERE email = '$userEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obter o ID do usuário
    $row = $result->fetch_assoc();
    $userId = $row['id'];

    // Inserir os dados na tabela usuarios
    $sql = "INSERT INTO usuarios (id, nome, telefone, estado, cep, cidade, rua, bairro, cpf)
            VALUES ('$userId', '$nome', '$telefone', '$estado', '$cep', '$cidade', '$rua', '$bairro', '$cpf')";

    if ($conn->query($sql)) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $conn->error;
    }
} else {
    echo "Usuário não encontrado.";
}

?>


