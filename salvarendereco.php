<?php
session_start();
include('conexao.php');
$nome = $_POST['nome']; //', '$telefone', '$estado', '$cep', '$cidade', '$rua', '$bairro', '$cpf
$telefone = $_POST['telefone'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cpf = $_POST['cpf'];


echo $nome;
// Obter o e-mail do usuário logado
$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$idUser  = isset($_SESSION['id']) ? $_SESSION['id'] : '';
var_dump($_SESSION);
echo $userEmail;
echo "id usuario: $idUser ";
// Buscar o ID do usuário pelo e-mail
//$sql = "SELECT id FROM usuarios WHERE email = '$userEmail'";
$sql = "SELECT id FROM usuarios WHERE id = '$idUser'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obter o ID do usuário
    $row = $result->fetch_assoc();
    $userId = $row['id'];

    // Inserir os dados na tabela usuarios
//    $sql = "INSERT INTO usuarios (id, nome, telefone, estado, cep, cidade, rua, bairro, cpf)
//            VALUES ('$userId', '$nome', '$telefone', '$estado', '$cep', '$cidade', '$rua', '$bairro', '$cpf')";
    $sql = "UPDATE  usuarios set nome='$nome',
                                 telefone= '$telefone',
                                 estado= '$estado',
                                 cep= '$cep',
                                  cidade= '$cidade',
                                   rua= '$rua',
                                    bairro= '$bairro',
                                     cpf= '$cpf'
      WHERE id='$userId'";

    if ($conn->query($sql)) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $conn->error;
    }
} else {
    echo "Usuário não encontrado.";
}

?>


