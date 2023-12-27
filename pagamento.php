<?php
    include_once("menu.php");
?>

<?php
    // Obter o e-mail do usuário a partir da sessão
    $userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';

    // Inicializar a variável $userName
    $userName = '';

    // Verificar se o e-mail está definido
    if (!empty($userEmail)) {
        $sql = "SELECT nome FROM usuarios WHERE email = '$userEmail'";
        $result = $conn->query($sql);

        // Verificar se a consulta retornou um resultado
        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $userName = $row['nome'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Endereço de Envio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
        display: flex;
        justify-content: space-between;
        max-width: 1200px; /* Ajuste conforme necessário */
        margin: 40px auto;
        padding: 50px;
    }

    .form-container {
        width: 48%; /* Ajuste conforme necessário */
        padding-right: 20px;
    }

    .summary-container {
        width: 38%; /* Ajuste conforme necessário */
        margin-left: 8%; /* Ajuste conforme necessário para afastar da borda esquerda */
            box-sizing: border-box;
            border: 1px solid #ccc;
            padding: 5px;
            display: inline-block;
            vertical-align: top;
            border-radius: 8px;
    
    }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #492731;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .summary {
            background-color: #f9f9f9;
            padding: 20px;
        }

        .coupon {
            margin-top: 10px;
        }

        div {
            display: inline-block;
        }

        .clear {
            clear: both;
        }

        .pagamento {
            max-width: 450px;
            margin: 100px auto;
            padding: -100px;
            margin-left: -250px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .payment-image {
            max-width: 30px;
            margin-right: 10px;
        }

        .button-container {
            border: 1px solid #ccc;
            padding: 10px;
            display: inline-block;
        }
        
        .pagamento-box {
            width: 28%; /* Ajuste conforme necessário */
            margin-left: 2%; /* Ajuste conforme necessário para afastar da borda esquerda */
            box-sizing: border-box;
            border: 1px solid #ccc;
            padding: 20px;
            display: inline-block;
            vertical-align: top;
            border-radius: 10px;
        }

        .payment-options {
            margin-top: 10px; /* Espaçamento superior entre o título e as opções de pagamento */
        }

        .payment-option {
            margin-bottom: 10px; /* Espaçamento entre as opções de pagamento */
        }

        #efetuarPagamento {
            margin-top: 10px; /* Espaçamento superior entre as opções de pagamento e o botão */
            display: block; /* Garante que o botão esteja em uma nova linha */
        }
       
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Endereço de Envio</h2>
            <br>
            <form id="formCadastro" action="salvarendereco.php" method="post" onsubmit="return salvarDados()">
                <label for="name">Nome e Sobrenome:</label>
                <input type="text" id="name" name="name" value="<?php echo $userName; ?>" required>
                <label for="phone">Telefone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="estado">Selecione o estado de destino:</label>
                <select id="estado" onchange="calcularFrete()">
                <option value="acre">Acre</option>
    <option value="alagoas">Alagoas</option>
    <option value="amapa">Amapá</option>
    <option value="amazonas">Amazonas</option>
    <option value="bahia">Bahia</option>
    <option value="ceara">Ceará</option>
    <option value="distritofederal">Distrito Federal</option>
    <option value="espiritosanto">Espírito Santo</option>
    <option value="goias">Goiás</option>
    <option value="maranhao">Maranhão</option>
    <option value="matogrosso">Mato Grosso</option>
    <option value="matogrossodosul">Mato Grosso do Sul</option>
    <option value="minasgerais">Minas Gerais</option>
    <option value="para">Pará</option>
    <option value="paraiba">Paraíba</option>
    <option value="parana">Paraná</option>
    <option value="pernambuco">Pernambuco</option>
    <option value="piaui">Piauí</option>
    <option value="riodejaneiro">Rio de Janeiro</option>
    <option value="riograndedonorte">Rio Grande do Norte</option>
    <option value="riograndedosul">Rio Grande do Sul</option>
    <option value="rondonia">Rondônia</option>
    <option value="roraima">Roraima</option>
    <option value="santacatarina">Santa Catarina</option>
    <option value="saopaulo">São Paulo</option>
    <option value="sergipe">Sergipe</option>
    <option value="tocantins">Tocantins</option>
                </select>
                <p id="resultado"></p>

                <label for="cep">CEP/Código Postal:</label>
                <input type="text" id="cep" name="cep" required onkeydown="if (event.keyCode === 13) preencherEndereco();" onblur="preencherEndereco();">

                <label for="city">Cidade:</label>
                <input type="text" id="city" name="city" required>

                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua" required>

                <label for="neighborhood">Bairro/Número:</label>
                <input type="text" id="neighborhood" name="neighborhood" required>

                <form>
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" maxlength="14" onkeyup="validarCPF()">
                    <button type="submit" id="saveButton">Salvar</button>
                </form>
                <p id="mensagem"></p>
            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- Script de preencher informações a partir do CEP-->
<script>
    function preencherEndereco() {
        var cep = document.getElementById("cep").value.replace(/\D/g, '');

        if (cep.length === 8) {
            // Consulta o ViaCEP para obter os dados do endereço
            var url = `https://viacep.com.br/ws/${cep}/json/`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById("rua").value = data.logradouro;
                        document.getElementById("city").value = data.localidade;
                        document.getElementById("neighborhood").value = data.bairro;
                    } else {
                        alert("CEP não encontrado.");
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar dados do CEP:', error);
                });
        }
    }
</script>

            <script>
                document.getElementById("saveButton").addEventListener("click", function() {
                    console.log("Botão Salvar clicado!");
                    salvarDadosEndereco();
                });

                function salvarDadosEndereco() {
                    console.log("salvarDados foi chamada");
                    var nome = $("#name").val();
                    var telefone = $("#phone").val();
                    var estado = $("#estado").val();
                    var cep = $("#cep").val();
                    var cidade = $("#city").val();
                    var rua = $("#rua").val();
                    var bairro = $("#neighborhood").val();
                    var cpf = $("#cpf").val();
                    var metodoPagamento = $("#payment-method").val();

                    $.ajax({
                        type: "POST",
                        url: "salvarendereco.php",
                        data: {
                            nome: nome,
                            telefone: telefone,
                            estado: estado,
                            cep: cep,
                            cidade: cidade,
                            rua: rua,
                            bairro: bairro,
                            cpf: cpf,
                            metodoPagamento: metodoPagamento
                        },
                        success: function(response) {
                            console.log(response);
                            console.log("Dados gravados com sucesso!");
                        },
                        error: function(response) {
                            console.log(response);
                            console.log("Deu ERRO! Tenta arrumar acima!");
                        }
                    });

                    return false;
                }
            </script>
        </div>
    </div>

    <div class="summary-container">
        <h2>Resumo do Pedido</h2>
        <div class="summary">
            <p>Subtotal: R$ <span id="subtotal"><?php echo number_format($_SESSION['total'], 2, ',', '.'); ?></span></p>
            <p>Valor do Cupom: - R$ <span id="coupon-value">0.00</span></p>
            <p id="valor_frete">Valor do Frete: - R$ <span function="calcularFrete">0.00</span></p>
            <p>Valor total - R$ <span id="total">0.00</span></p>
            <div class="coupon">
                <label for="coupon-code">Código do Cupom:</label>
                <input type="text" id="coupon-code" name="coupon-code">
                <button id="apply-coupon">Aplicar Cupom</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        function validarCPF() {
          var cpf = document.getElementById("cpf").value;
          cpf = cpf.replace(/[^\d]/g, ''); // Remove caracteres não numéricos
          
          if (cpf.length !== 11 || !validarDigitosCPF(cpf)) {
            document.getElementById("mensagem").textContent = "CPF inválido.";
          } else {
            document.getElementById("mensagem").textContent = "CPF válido.";
          }
        }
      
        function validarDigitosCPF(cpf) {
          var soma = 0;
          var resto;
          
          for (var i = 1; i <= 9; i++) {
            soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
          }
          
          resto = (soma * 10) % 11;
          
          if ((resto === 10) || (resto === 11)) {
            resto = 0;
          }
          
          if (resto !== parseInt(cpf.substring(9, 10))) {
            return false;
          }
          
          soma = 0;
          
          for (var i = 1; i <= 10; i++) {
            soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
          }
          
          resto = (soma * 10) % 11;
          
          if ((resto === 10) || (resto === 11)) {
            resto = 0;
          }
          
          if (resto !== parseInt(cpf.substring(10, 11))) {
            return false;
          }
          
          return true;
        }
      </script>
<script>
        var subtotalElement = document.getElementById('subtotal');
        const couponValueElement = document.getElementById('coupon-value');
        const totalElement = document.getElementById('total');
        const couponCodeInput = document.getElementById('coupon-code');
        const applyCouponButton = document.getElementById('apply-coupon');
        var freteCalculado = document.getElementById("valor_frete").innerText;

        const initialSubtotal = 100; // Subtotal fictício
        
        subtotalElement='<?php echo $_SESSION['total']?>';
        //console.debug(subtotalElement);
        let subtotal = subtotalElement;
        let couponValue = 0;

        totalElement.textContent = (subtotal - couponValue).toFixed(2);

        function updateTotal() {
            frete = freteCalculado;
            totalElement.textContent = (parseFloat(subtotal - couponValue + frete)).toFixed(2);
        }

        applyCouponButton.addEventListener('click', () => {
            const code = couponCodeInput.value;
            // Simulando validação de código do cupom
            if (code === 'ABC123') {
                couponValue = 20; // Valor de desconto fictício
                couponValueElement.textContent = couponValue.toFixed(2);
                updateTotal();
            }
        });

        updateTotal();

</script>

    <div class="clear"></div>

      <script>
        const taxaPorKm = 0.05; 
        const distanciasPorEstado = {
            acre: 720,
            alagoas: 500,
            amapá: 720,
            amazonas: 720,
            bahia: 500,
            ceará: 500,
            "distritofederal": 400,
            "espíritosanto": 200,
            goiás: 400,
            maranhão: 500,
            "matogrosso": 400,
            "matogrossodosul": 400,
            "minasgerais": 50,
            pará: 720,
            paraíba: 500,
            paraná: 600,
            pernambuco: 500,
            piauí: 600,
            "riodejaneiro": 200,
            "riograndedonorte": 500,
            "riograndedosul": 600,
            rondônia: 720,
            roraima: 720,
            "santacatarina": 600,
            "saopaulo": 200,
            sergipe: 500,
            tocantins: 720
        };

        function calcularFrete() {
            const estadoSelecionado = document.getElementById("estado").value;

            if (!distanciasPorEstado.hasOwnProperty(estadoSelecionado)) {
                document.getElementById("resultado").innerText = "";
                return;
            }

            const distancia = distanciasPorEstado[estadoSelecionado];
            const frete = taxaPorKm * distancia;

            
            document.getElementById("valor_frete").innerText = `Frete: R$ ${frete.toFixed(2)}`;
            freteCalculado=frete;
            updateTotal();
            //setFrete(frete);
        }
    </script>
        <!-- Forma de Pagamento -->
        <div class="pagamento-box">
            <h2>Forma de Pagamento</h2>
            <div class="payment-options">
                <div class="payment-option">
                    <input type="radio" name="payment-method" id="debit-card" value="debit-card">
                    <label for="debit-card">Cartão de Débito</label>
                </div>
                <div class="payment-option">
                    <input type="radio" name="payment-method" id="credit-card" value="credit-card">
                    <label for="credit-card">Cartão de Crédito</label>
                </div>
                <div class="payment-option">
                    <input type="radio" name="payment-method" id="boleto" value="boleto">
                    <label for="boleto">Boleto Bancário</label>
                </div>
                <div class="payment-option">
                    <input type="radio" name="payment-method" id="pix" value="pix">
                    <label for="pix">PIX</label>
                </div>
                <button id="efetuarPagamento" onclick="efetuarPagamento()">Efetuar Pagamento</button>
                <div id="resultadoPagamento"></div>
            </div>
        </div>
    </div>

    <div class="clear"></div>


    <script>
        function efetuarPagamento() {
            var metodoPagamento = document.querySelector('input[name="payment-method"]:checked');

            if (metodoPagamento) {
                metodoPagamento = metodoPagamento.value;

                if (metodoPagamento === 'boleto') {
                     // Redirecionar para a página boleto.php com os parâmetros na URL
            redirecionarParaBoleto();
                    document.getElementById('resultadoPagamento').innerText = 'Boleto gerado.';
                } else if (metodoPagamento === 'pix') {
                      // Redirecionar para a página de confirmação do PIX
                     window.location.href = 'confirmacao_pix.php';
                    document.getElementById('resultadoPagamento').innerText = 'Código PIX gerado.';
                } else {
                    // Lógica para cartão de débito ou crédito
                       window.location.href = 'confirmacao-cartao.php';
                    document.getElementById('resultadoPagamento').innerText = 'Pagamento com cartão.';
                }
            } else {
                document.getElementById('resultadoPagamento').innerText = 'Selecione uma forma de pagamento.';
            }
        }
        //Código de geração de boleto
       // Adicione esta função para redirecionar para o boleto.php com os parâmetros
function redirecionarParaBoleto() {
    var nome = $("#name").val();
    var cpf = $("#cpf").val();
    var valor = parseFloat(totalElement.textContent).toFixed(2);

    // Redirecionar para a página boleto.php com os parâmetros na URL
    window.location.href = "boleto.php?nome=" + encodeURIComponent(nome) + "&cpf=" + encodeURIComponent(cpf) + "&valor=" + encodeURIComponent(valor);
}

    </script>

</body>
</html>