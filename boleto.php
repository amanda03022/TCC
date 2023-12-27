<?php
// Recupera os parâmetros da URL
$nome = isset($_GET['nome']) ? urldecode($_GET['nome']) : '';
$cpf = isset($_GET['cpf']) ? urldecode($_GET['cpf']) : '';
$valor = isset($_GET['valor']) ? urldecode($_GET['valor']) : '';

// Verifica se todos os parâmetros necessários foram fornecidos
if (empty($nome) || empty($cpf) || empty($valor)) {
    echo "Parâmetros incompletos. Impossível gerar o boleto.";
    exit;
}

// Gera um número de boleto fictício (poderia ser um número real em um ambiente de produção)
$numeroBoleto = mt_rand(1000000000, 9999999999);

// Data de vencimento fictícia (poderia ser calculada com base em um prazo real)
$dataVencimento = date('Y-m-d', strtotime('+5 days'));

// Gera um código de barras fictício (espaço reservado)
$codigoBarras = '**************';

// HTML do boleto fictício
$htmlBoleto = "
<!DOCTYPE html>
<html>
<head>
    <title>Boleto Fictício</title>
</head>
<body>
    <h2>Boleto Fictício</h2>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>CPF:</strong> $cpf</p>
    <p><strong>Valor:</strong> R$ $valor</p>
    <p><strong>Número do Boleto:</strong> $numeroBoleto</p>
    <p><strong>Data de Vencimento:</strong> $dataVencimento</p>
    <p><strong>Código de Barras:</strong> $codigoBarras</p>
    <!-- Adicione mais detalhes do boleto conforme necessário -->

    <p><em>Este boleto é fictício e não possui valor real.</em></p>
</body>
</html>
";

// Define o cabeçalho como HTML
header('Content-Type: text/html');

// Exibe o HTML do boleto
echo $htmlBoleto;
?>
