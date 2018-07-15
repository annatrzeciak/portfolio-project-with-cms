<?php
  include 'header.php';
  $form_complete=true;
  if(strlen($_POST['name'])<3){
    $_SESSION['name_error']='Nazwa musi zawierać minimum 3 znaki';
    echo   $_SESSION['name_error'];
    $form_complete=false;
  }
  if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['email_error']='Niepoprawny adres email';
    echo   $_SESSION['email_error'];
    $form_complete=false;
  }
  if(strlen($_POST['message'])<3){
    $_SESSION['message_error']='Wiadomość musi zawierać minimum 10 znaków';
    echo   $_SESSION['message_error'];
    $form_compete=false;
  }
  // $secret_key = "6LcWaWIUAAAAALKPPwh0EFt8dOtYkBsNpV7jCZ9H";
  //
  //   $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
  //
  //   $odpowiedz = json_decode($sprawdz);
  //
  //   if ($odpowiedz->success==false)
  //   {
  //     $form_complete=false;
  //
  //     $_SESSION['bot_error']="Potwierdź, że jesteś człowiekiem!";
  //   }
  if($form_complete){
$actual_link = "http://$_SERVER[HTTP_HOST]";
  $to ='biuro@code-way.com';
  $name = $_POST['name'];
  $mail_from = $_POST['email'];
  $subject = 'Nowa wiadomość ze strony code-way.com od '.$_POST['name'];
  $message = '<html>
  <head>
<meta charset="utf-8">
</head>
<body>
<p>Nowa wiadomość wysłana ze strony <a href="'.$actual_link.'">'.$actual_link.'</a> od <strong>'.$_POST['name'].'</strong></p>
<p>'.$_POST['message'].'</p>
  </body></html>';
  $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: biuro@code-way.com <'.$to.'>' . "\r\n";
$headers .= 'From: '.$_POST['name'].' <'.$_POST['email'].'>' . "\r\n";
   $sent = mail($to, $subject, $message, $headers);
   if($sent) {
     $_SESSION['sent_ok']='Wysyłanie wiadomości zakończone pomyślnie';
   } else {
     $_SESSION['sent_error']='Nie udało się wysłać wiadomości. Spróbuj ponownie później';
   }
 } else{
   $_SESSION['form_name']=$_POST['name'];
  $_SESSION['form_email']=$_POST['email'];
  $_SESSION['form_message']=$_POST['message'];
 }
header('Location: /#contact');
 ?>