<?php
    include_once("menu.php");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleconta.css">
</head>
<body>
<main class="main_content container">


<div class="box-artigo" style="padding: 25px;">
  <div class="container">
    <a class="links" id="paralogin"></a>
    <a class="links" id="paraesquecisenha"></a>
    <div class="content">
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form action="" method="post" onsubmit="return enviarSolicitacaoRedefinicaoSenha();">
          <h1> <a href="uníque.html" class="custom-logo-link" rel="home" aria-current="page">
              <img width="250" height="250" src="Uníque.png" class="custom-logo" alt="Uníque" decoding="async" />
            </a></h1>
          <p>
          <form id="reset-form">
            <label for="email">Seu e-mail</label>
            <input id="email" name="email" required="required" type="text"
              placeholder="contato@htmlecsspro.com" />
          </p>

          <p>
          <button type="submit">Enviar E-mail de Redefinição</button>
          </p>


        </form>
  

<script>
 const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const crypto = require('crypto');

const app = express();
const port = 3000;

// Configuração do bodyParser para analisar JSON
app.use(bodyParser.json());

// Rota para solicitar a redefinição de senha
app.post('/api/redefinir-senha', (req, res) => {
  // Recebe o endereço de email do corpo da solicitação
  const { email } = req.body;

  // Gere um código de redefinição de senha aleatório
  const codigoRedefinicaoSenha = crypto.randomBytes(6).toString('hex');

  // Configuração do Nodemailer (substitua pelas suas credenciais e servidor SMTP)
  const transporter = nodemailer.createTransport({
    service: 'seu_servico_de_email',
    auth: {
      user: 'seu_email',
      pass: 'sua_senha',
    },
  });

  const mailOptions = {
    from: 'seu_email',
    to: email,
    subject: 'Código de Redefinição de Senha',
    text: `Seu código de redefinição de senha é: ${codigoRedefinicaoSenha}`,
  };

  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      console.log('Erro ao enviar o email:', error);
      res.status(500).send('Erro ao enviar o email.');
    } else {
      console.log('Email enviado: ' + info.response);
      res.status(200).send('Um código de redefinição de senha foi enviado para o seu email.');
    }
  });
});

app.listen(port, () => {
  console.log(`Servidor rodando na porta ${port}`);
});

</script>

      </div>
</body>
</html>