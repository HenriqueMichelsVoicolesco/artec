<?php

require 'PHPMailerAutoload.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$opcoes = $_POST['opcoes'];
$mensagem = $_POST['mensagem'];

$Mailer = new PHPMailer();

//Define que será usado SMTP
$Mailer->IsSMTP();

//Enviar e-mail em HTML
$Mailer->isHTML(true);

//Aceitar carasteres especiais
$Mailer->CharSet = 'UTF-8';
$Mailer->Encoding = 'base64';

//Configurações
$Mailer->SMTPAuth = true;
$Mailer->SMTPSecure = 'tls';

//nome do servidor
$Mailer->Host = 'smtp.gmail.com';

//Porta de saida de e-mail 
$Mailer->Port = 587;
$Mailer->Mailer = 'smtp';

//Dados do e-mail de saida - autenticação
$Mailer->Username = 'henriquemv2002@gmail.com';
$Mailer->Password = '01henri02rique02';

//Exibir mensagens de erro (0 = Não)
$Mailer->SMTPDebug = 0;

//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
$Mailer->setFrom('henriquemv2002@gmail.com', 'Henrique');

//Assunto da mensagem
$Mailer->Subject = "$opcoes - $nome";

//Corpo da Mensagem
$Mailer->Body = "<h3> $nome </h3> $mensagem <br><br> <small>Email: $email <br> Telefone: $telefone</small>";

//Destinatario 
$Mailer->AddAddress('henriquemv2002@gmail.com', 'Henrique');

$Mailer->AddReplyTo($email, $nome);

if ($Mailer->Send()) {
  echo "<script> alert('Email enviado com sucesso!'); window.location.replace('index.html');</script>";
} else {
  echo "<script> alert('Não foi possível enviar o email! Tente novamente...'); window.location.replace('index.html');</script>";;
}
