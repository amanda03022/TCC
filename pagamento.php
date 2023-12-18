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
            max-width: 800px;
            margin: 40px auto;
            padding: 50px;
            float: left;

        }

        .form-container {
            width: 100%;
            padding-right: 20px;


        }

        .summary-container {
            width: 50%;
            padding-left: 200px;
            margin:95px auto;
            border-left: 1px solid #ccc;
            float: right;
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

        input[type="radio"] {
            margin-right: 10px;
        }

        button {
            background-color: #492731;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #492731;
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
    border: 1px solid #ccc; /* Adicione uma borda ao redor do contêiner */
    padding: 10px; /* Adicione algum espaçamento interno ao redor do botão */
    display: inline-block; /* Garante que o contêiner não ocupe a largura total */
}

        
    </style>
     <link rel="stylesheet" href="menu.css">
</head>

<body>
    <!--Teste!-->
    <div class="container">
        <div class="form-container">
            <h2>Endereço de Envio</h2>
            <br>
            <form id="formCadastro" action="salvarendereco.php" method="post" onsubmit="return salvarDados()">
                <label for="name">Nome e Sobrenome:</label>
                <input type="text" id="name" name="name" value="<?php echo $userName; ?>" required>

                <label for="phone">Telefone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="estado">Selecione o estado de destino: </label>
    <select id="estado" onchange="calcularFrete()">>
    </select><br>
    <p id="resultado"></p>

     <label for="cep">CEP/Código Postal:</label>
  <input type="text" id="cep" name="cep" required>

                <label for="city">Cidade:</label>
                <input type="text" id="city" name="city" required>

                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua" required>

                <label for="neighborhood">Bairro/Número:</label>
                <input type="text" id="neighborhood" name="neighborhood" required>

                <form>
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" maxlength="14" onkeyup="validarCPF()">
                    <button type="submit" id="saveButton"  >Salvar</button>
                  </form>
                  <p id="mensagem"></p>
            

<script>
document.getElementById("saveButton").addEventListener("click", function() {
    // Coloque aqui o código que deve ser executado quando o botão for clicado
    
    console.log("Botão Salvar clicado|!!!!!");
    salvarDadosEndereco();
});
</script>

            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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
        var mensagem='Nome: '+nome+'  - telefone: '+telefone+' - estado: '+ estado + ' - cep: '+cep+' - cidade: '+cidade+' - rua: '+rua+' bairro: '+bairro+' cpf: '+cpf;
        console.log(mensagem);
        //alert(mensagem);
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
                cpf: cpf
            },
            success: function (response) {
                console.log(response);
                console.log("Dados gravados com sucesso!");
                // Aqui você pode adicionar qualquer lógica adicional após salvar os dados
            },
            error: function (response) {
                console.log(response);
                console.log("Deu ERRO!!!!!!!!!!!! Tenta arrumar acima!");
                // Aqui você pode adicionar qualquer lógica adicional após salvar os dados
            }
        });

        return false; // Isso impede o envio normal do formulário
    }
</script>
        </div>
        <script>
            const estados = [
                "Acre", "Alagoas", "Amapá", "Amazonas", "Bahia", "Ceará",
                "Distrito Federal", "Espírito Santo", "Goiás", "Maranhão",
                "Mato Grosso", "Mato Grosso do Sul", "Minas Gerais", "Pará",
                "Paraíba", "Paraná", "Pernambuco", "Piauí", "Rio de Janeiro",
                "Rio Grande do Norte", "Rio Grande do Sul", "Rondônia",
                "Roraima", "Santa Catarina", "São Paulo", "Sergipe", "Tocantins"
            ];

            const select = document.getElementById("estado");
            estados.forEach(estado => {
                const option = document.createElement("option");
                option.value = estado.toLowerCase().replace(/\s/g, '');
                option.textContent = estado;
                select.appendChild(option);
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function salvarDados() {
        
        var nome = $("#name").val();
        var telefone = $("#phone").val();
        var estado = $("#estado").val();
        var cep = $("#cep").val();
        var cidade = $("#city").val();
        var rua = $("#rua").val();
        var bairro = $("#neighborhood").val();
        var cpf = $("#cpf").val();

  
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
                cpf: cpf
            },
            success: function (response) {
                
                console.log(response);
            }
        });

        return false;
    }
</script>

        <script>
            (function(){ 
 
 const cep = document.querySelector("input[name=cep]");

 cep.addEventListener('blur', e=> {
      const value = cep.value.replace(/[^0-9]+/, '');
      const url = `https://viacep.com.br/ws/${value}/json/`;

    fetch(url)
   .then( response => response.json())
   .then( json => {
              
       if( json.logradouro ) {
             document.querySelector('input[name=rua]').value = json.logradouro;
             document.querySelector('input[name=neighborhood]').value = json.bairro;
             document.querySelector('input[name=city]').value = json.localidade;
             document.querySelector('input[name=estado]').value = json.uf;
       }
      
    
   });
});

})();
        </script>
    </div>
    

    <div class="summary-container">
        <h2>Resumo do Pedido</h2>
        <br>
        <div class="summary">
        <p>Subtotal: R$ <span id="subtotal"><?php echo number_format($_SESSION['total'], 2, ',', '.'); ?></span></p>
            <p>Valor do Cupom: - R$ <span id="coupon-value">0.00</span></p>
            <p id="valor_frete" >Valor do Frete: - R$ <span function="calcularFrete">0.00</span></p>
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

    <div class="pagamento">
        <h2>Métodos de pagamento</h2>
        <br>
        <div class="payment-option">
            <input type="radio" id="pix" name="payment" value="pix">
            <img class="payment-image" src="pixlogo.png" alt="PIX">
            <label for="pix">PIX</label>
        </div>
        <div class="payment-option">
            <input type="radio" id="credit-card" name="payment" value="credit-card">
            <img class="payment-image" src="cartão.png" alt="Cartão de Crédito">
            <label for="credit-card">Cartão de Crédito</label>
        </div>
        <div class="payment-option">
            <input type="radio" id="debit-card" name="payment" value="debit-card">
            <img class="payment-image" src="cartão.png" alt="Cartão de Débito">
            <label for="debit-card">Cartão de Débito</label>
        </div>
        <div class="payment-option">
            <input type="radio" id="boleto" name="payment" value="boleto">
            <img class="payment-image" src="boleto.png" alt="Boleto">
            <label for="boleto">Boleto</label>
        </div>
    <div>
    <div class="button-container">
    <a href="finalpedido.php" class="cart-btn">Finalizar pedido</a>
</div>
    </div>
    </div>

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
                document.getElementById("resultado").innerText = "Selecione um estado válido.";
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


</body>

</html>