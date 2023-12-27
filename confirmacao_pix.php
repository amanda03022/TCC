<!-- confirmacao_pix.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Pagamento PIX</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        img {
            max-width: 200px;
        }

        #codigoPix {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }

        #tempoRestante {
            font-size: 18px;
            color: #333;
        }

        #qrcode {
            margin-top: 20px;
        }

        #novoCodigoButton {
            display: none; /* Inicia oculto */
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 20px;
        }
        .submit-btn {
        padding: 15px 30px;
        font-size: 18px;
        border: none;
        border-radius: 10px;
        background-color: #8B4513; /* Marrom claro */
        color: #fff; /* Letras brancas */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #654321; /* Marrom mais escuro quando passar o mouse */
    }

    </style>
</head>
<body>
    <img src="imgs/pix.png" alt="Logo PIX">
    <h2>Confirmação de Pagamento PIX</h2>

    <div id="codigoPix">
        <?php echo gerarCodigoPix(); ?>
    </div>

    <p>Por favor, efetue o pagamento em até 3 minutos.</p>

    <div id="tempoRestante">Tempo restante: <span id="contador">180</span> segundos</div>

    <!-- Adicionando o QR Code dinâmico -->
    <div id="qrcode"></div>

    <!-- Adicionando o botão para gerar um novo código PIX -->
    <button id="novoCodigoButton" onclick="gerarNovoCodigo()">Gerar Novo Código</button>

    <script src="js/qrcode.min.js"></script>
    <script>
        // Contador regressivo de 3 minutos
        var tempoRestante = 180;
        var contadorElement = document.getElementById('contador');
        var contadorInterval;

        function iniciarContador() {
            contadorInterval = setInterval(function () {
                tempoRestante--;

                if (tempoRestante <= 0) {
                    clearInterval(contadorInterval);
                    // Mostrar o botão quando o tempo expirar
                    document.getElementById('novoCodigoButton').style.display = 'block';
                }

                contadorElement.textContent = tempoRestante;
            }, 1000);
        }

        // Iniciar o contador quando a página carregar
        iniciarContador();

        // Gera o QR Code dinamicamente
        var codigoPix = '<?php echo gerarCodigoPix(); ?>';
        var qrcodeElement = document.getElementById('qrcode');
        var qrcode = new QRCode(qrcodeElement, {
            text: codigoPix,
            width: 128,
            height: 128
        });

        // Função para gerar um novo código PIX
        function gerarNovoCodigo() {
            // Lógica para gerar um novo código PIX fictício
            var novoCodigoPix = '<?php echo gerarCodigoPix(); ?>';

            // Atualizar o conteúdo na página
            document.getElementById('codigoPix').textContent = novoCodigoPix;

            // Reiniciar o contador
            tempoRestante = 180;
            contadorElement.textContent = tempoRestante;

            // Ocultar o botão novamente
            document.getElementById('novoCodigoButton').style.display = 'none';

            // Reiniciar o intervalo do contador
            clearInterval(contadorInterval);
            iniciarContador();
             
             // Gerar um novo QR Code
    qrcode.clear();
    qrcode.makeCode(novoCodigoPix);
        }
    </script>

    <?php
        function gerarCodigoPix() {
            // Lógica para gerar um código PIX fictício
            // Neste exemplo, estamos gerando uma string aleatória de 20 caracteres
            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $codigoPixFicticio = '';

            for ($i = 0; $i < 20; $i++) {
                $indice = rand(0, strlen($caracteres) - 1);
                $codigoPixFicticio .= $caracteres[$indice];
            }

            return $codigoPixFicticio;
        }
    ?>
      <input type="submit" value="Confirmar" class="submit-btn">
</body>
</html>
