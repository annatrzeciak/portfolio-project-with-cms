<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $login=htmlentities($_POST['login'], ENT_QUOTES, 'UTF-8');
    $password=htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
  if($user = login($login, $password)){
    //poprawne zalogowanie
    $_SESSION['user_id']=$user['id'];
    $_SESSION['user_login']=$user['login'];
    $_SESSION['log_error']='';

    header('Location: /admin');
  }else{
    //błędne zalogowanie
    $_SESSION['log_error']= "Podałeś niepoprawne dane do logowania";
    printLoginForm();
  }
}else{
  printLoginForm();
}
