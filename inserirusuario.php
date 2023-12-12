<?php
include('conexao.php');

if (isset($_POST['nome_cad'])) {
  $nome = $_POST['nome_cad'];
  $email = $conn->real_escape_string($_POST['email_cad']);
  //echo $email;
  $senha = $conn->real_escape_string($_POST['senha_cad']);

  $sqlVerificar = "SELECT * FROM usuarios WHERE email = '$email'";

  $sql_query = $conn->query($sqlVerificar) or die("Falha na execução do código SQL: " . $conn->error);
  $quantidade = $sql_query->num_rows;

  $sqlCode = "INSERT INTO usuarios (nome, email, senha)
  VALUES ('$nome', '$email', '$senha')";
  //echo $sqlCode;

  if ($quantidade == 1) {
    echo "E-mail já está em uso";
  } else {
    $conn->query($sqlCode) or die("Falha na execução do código SQL: " . $conn->error);
    echo "Cadastro Realizado com sucesso";
    header("Location: index.php");
exit;
  }
}
?>