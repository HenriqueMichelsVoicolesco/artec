<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<?php
require 'PHPMailer/PHPMailerAutoload.php';


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
  $Mailer->Charset = 'UTF-8';
  
  //Configurações
  $Mailer->SMTPAuth = true;
  $Mailer->SMTPSecure = 'ssl';
  
  //nome do servidor
  $Mailer->Host = 'smtp.gmail.com';
  //Porta de saida de e-mail 
  $Mailer->Port = 465;
  $Mailer->Mailer = 'smtp'; 
  
  //Dados do e-mail de saida - autenticação
  $Mailer->Username = '';
  $Mailer->Password = '';
  
  //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
  $Mailer->From = '';
  
  //Nome do Remetente
  $Mailer->FromName = 'Artec Eletro Refrigeração';
  
  //Assunto da mensagem
  $Mailer->Subject = $opcoes;
  
  //Corpo da Mensagem
  $Mailer->Body = 'Informações de contato <br>'.'Nome do cliente: '.$nome.'<br> Email: '.$email.'<br> Telefone: '.$telefone.'<br> Mensagem: <br>'.$mensagem;
  
  //Destinatario 
  $Mailer->AddAddress('');
  
  if($Mailer->Send()){
    echo "<script> alert('Mensagem enviada com sucesso!'); window.location.href='index.html'; </script>";
  }else{
    echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo."<br>";
  }
?>
</body>
</html>