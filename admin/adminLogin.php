<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
  if($user = login($_POST['login'], $_POST['password'])){
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
