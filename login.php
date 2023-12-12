<?php
session_start();
include('conexao.php');
function checarEmailAdministrador($email, $senha) {
    // Email específico do administrador
    $emailAdministrador = "admin@exemplo.com";
    $senhaAdministrador = "senha_admin"; 
   
    if ($email == $emailAdministrador && $senha == $senhaAdministrador) {
       // Setar o usuário como administrador
       $_SESSION['administrador'] = true;
   
       // Redirecionar para a página privada
       header("Location: pagina_privada.php");
       exit();
    } else {
       // O usuário não é administrador
       $_SESSION['administrador'] = false;
   
    }
   }

if(isset($_POST['email_login']) || isset($_POST['senha_login'])) {

    if(strlen($_POST['email_login']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha_login']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conn->real_escape_string($_POST['email_login']);
        $senha = $conn->real_escape_string($_POST['senha_login']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
    
            $_SESSION['admin'] = $usuario['admin'];

            if($usuario['admin']){
                header("Location: admin.php");
            }else{
                header("Location: pagcliente.php");
            }
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email_login'];
                $senha = $_POST['senha_login'];
               
                // Verificar se o email é o do administrador
                //checarEmailAdministrador($email, $senha);
               } 

        } else {
            echo "<script>alert('Falha ao logar! Nome de usuário ou senha incorretos.');</script>";
        }

    }
    

}

   
?>
