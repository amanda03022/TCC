<?php
session_start();
include('conexao.php');
include_once("menu.php");

//if(isset($_SESSION['id'])){
//  echo $_SESSION['id'];die();
//}else{
//  echo "<script>alert('Teste');</script>";
//  echo "Here!!!!";die();
//}

if (isset($_POST['Cadastrar'])) {
  $nome = $_POST['nome_cad'];
  $email = $mysqli->real_escape_string($_POST['email_cad']);
  $senha = $mysqli->real_escape_string($_POST['senha_cad']);

  $sqlVerificar = "SELECT * FROM usuarios WHERE email_cad = '$email'";

  $sql_query = $mysqli->query($sqlVerificar) or die("Falha na execução do código SQL: " . $mysqli->error);
  $quantidade = $sql_query->num_rows;

  $sqlCode = "INSERT INTO usuarios (nome_cad, email_cad, senha_cad)
  VALUES ('$nome', '$email', '$senha')";
  echo $sqlCode;

  if ($quantidade == 1) {
    echo "E-mail já está em uso";
  } else {
    $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli->error);
    echo "Cadastro Realizado com sucesso";
  }
}
?>
<?php
/*
include('conexao.php');
include_once("menu.php");

if (isset($_POST['email_login']) || isset($_POST['senha_login'])) {

  if (strlen($_POST['email_login']) == 0) {
    echo "Preencha seu e-mail";
  } else if (strlen($_POST['senha_login']) == 0) {
    echo "Preencha sua senha";
  } else {

    $email = $mysqli->real_escape_string($_POST['email_login']);
    $senha = $mysqli->real_escape_string($_POST['senha_login']);

    $sql_code = "SELECT * FROM usuarios WHERE email_login = '$email' AND senha_login = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {

      $usuarios = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $usuarios['id'];
      $_SESSION['nome'] = $usuarios['nome'];

      header("Location: index.php");

    } else {
      echo "Falha ao logar! E-mail ou senha incorretos";
    }

  }

}
*/
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minha Conta</title>

  <script>
    function validarSenha(senha) {
      const senhaPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      return senhaPattern.test(senha);
    }

    function validarFormularioCadastro() {
      const senhaCadastro = document.getElementById("senha_cad").value;
      if (!validarSenha(senhaCadastro)) {
        alert("A senha de cadastro deve conter pelo menos 8 caracteres, 1 letra maiúscula e 1 caractere especial.");
        return false;
      }
      return true;
    }
  </script>
  <link rel="stylesheet" href="styleconta.css">
  <link rel="stylesheet" href="menu.css">
</head>

<body>
<?php
if(!isset($_SESSION['id']) || trim($_SESSION['id'])==""){
?>
  <main class="main_content container">


    <div class="box-artigo" style="padding: 25px;">
      <div class="container">
        <a class="links" id="paralogin"></a>
        <a class="links" id="paraesquecisenha"></a>
        <div class="content">
          <!--FORMULÁRIO DE LOGIN-->
          <div id="login">
            <form action="login.php" method="post">
              <h1> <a href="uníque.html" class="custom-logo-link" rel="home" aria-current="page">
                  <img width="250" height="250" src="Uníque.png" class="custom-logo" alt="Uníque" decoding="async" />
                </a></h1>
              <p>
                <label for="email_login">Seu e-mail</label>
                <input id="email_login" name="email_login" required="required" type="text"
                  placeholder="contato@htmlecsspro.com" />
              </p>

              <p>
                <label for="senha_login">Sua senha</label>
                <input id="senha_login" name="senha_login" required="required" type="password" placeholder="1234" />
              </p>

              <p>
                <input type="checkbox" name="manterlogado" id="manterlogado" value="" />
                <label for="manterlogado">Manter-me logado</label>
              </p>
              <p>
              <!-- a href=".vendor/esqueceuasenha.php" -->
              <a class="btn" href="vendor/esqueceuasenha.php">
              Esqueci minha senha
              </a>

                  <!-- button onclick="location.href='http://www.w3schools.com';">Esqueci minha senha</button custom-logo-link>
              
              <!-- input type="button" enable="true" onclick=".vendor/esqueceuasenha.php" value="Esqueci minha senha"/ -->
              </p>

              <p>
                <input type="submit" value="Logar" />
              </p>

              <p class="link">
                Ainda não tem conta?
                <a href="#paracadastro">Cadastre-se</a>
              </p>

            </form>

          </div>
          <script type="text/javascript">
            function checarEmail() {
              if (document.forms[0].email.value == ""
                || document.forms[0].email.value.indexOf('@') == -1
                || document.forms[0].email.value.indexOf('.') == -1) {
                alert("Por favor, informe um E-MAIL válido!");
                return false;
              }
            }

          </script>
          <!--FORMULÁRIO DE CADASTRO-->

          <div id="cadastro">
            <form method="post" action="inserirusuario.php" onsubmit="return validarFormularioCadastro();">
              <h1><a href="uníque.html" class="custom-logo-link" rel="home" aria-current="page">
                  <img width="250" height="250" src="Uníque.png" class="custom-logo" alt="Uníque" decoding="async" />
                </a></h1>

              <p>
                <label for="nome_cad">Seu nome</label>
                <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Luiz Augusto" />
              </p>

              <p>
                <label for="email_cad">Seu e-mail</label>
                <input id="email_cad" name="email_cad" required="required" type="email"
                  placeholder="contato@htmlecsspro.com" />
              </p>

              <p>
                <label for="senha_cad">Sua senha</label>
                <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="1234" />
              </p>
              <p>
                <input type="submit" value="Cadastrar" />
              </p>

              <p class="link">
                Já tem conta?
                <a href="#paralogin"> Ir para Login </a>
              </p>
            </form>
          </div>
          <script type="text/javascript">
            function checarEmail() {
              if (document.forms[0].email.value == ""
                || document.forms[0].email.value.indexOf('@') == -1
                || document.forms[0].email.value.indexOf('.') == -1) {
                alert("Por favor, informe um E-MAIL válido!");
                return false;
              }
            }
          </script>

        </div>
        <?php
}else{
    echo "Usuário já está logado";
    echo "<script>alert('Usuário já está logado!');</script>";
?>
<!-- COLOCAR HTML AQUI-->
<?php
include_once("conexao.php");

// Verificar se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redireciona para a página de login se não estiver logado
    exit();
}

// Obter o ID do usuário logado
$user_id = $_SESSION['id'];

// Consultar os pedidos do usuário
$sqlPedidos = "SELECT * FROM pedidos WHERE cliente = '$user_id'";
$resultPedidos = $conn->query($sqlPedidos);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="menu.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <?php include_once("menu.php"); ?>

    <div class="container">
        <h2>Meus Pedidos</h2>

        <!-- Botão para exibir/ocultar a tabela -->
        <button onclick="toggleTable()">Mostrar Meus Pedidos</button>

        <!-- Tabela de Pedidos (inicialmente oculta) -->
        <table class="table hidden" id="pedidosTable">
            <thead>
                <tr>
                    <th>ID do Pedido</th>
                    <th>Data do Pedido</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rowPedido = $resultPedidos->fetch_assoc()) {
                    // Exibir informações do pedido
                    echo "<tr>";
                    echo "<td>{$rowPedido['id']}</td>";
                    echo "<td>{$rowPedido['data_pedido']}</td>";
                    echo "<td>{$rowPedido['nomeproduto']}</td>";
                    echo "<td>{$rowPedido['quantidade']}</td>";
                    echo "<td>{$rowPedido['preco']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <script>
            function toggleTable() {
                // Obtém a referência à tabela
                var pedidosTable = document.getElementById('pedidosTable');

                // Alterna a classe 'hidden' para exibir/ocultar a tabela
                pedidosTable.classList.toggle('hidden');
            }
        </script>
    </div>
</body>

</html>

<!-- ATÉ AQUI-->
<?php
}
          ?>
</body>

</html>
<!--Exemplo@456-->