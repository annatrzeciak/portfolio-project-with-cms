
<?php
require ('db.php');
session_start();
function login($login, $password){

  global $connection;

  $solution=$connection->query("SELECT id FROM users WHERE nick = '".$login."' AND  password = '".$password."'");

  if(!$solution) throw new Exception($connection->error);
  else{
    $row=$solution->fetch_assoc();
    return $row;
  }
}

function printLoginForm(){
  echo '<div class="loginForm w-100 h-100 d-flex justify-content-center align-items-center"><form style="max-width: 400px; width: 100%" class="form" method="post" action="">';
  if (isset($_SESSION['log_error'])){
    echo '<div class="form-group error-message">'.$_SESSION['log_error'].'</div>';
  };
  echo '<div class="form-group"><label>Login: </label><input class="form-control" name="login" type="text"></div>';
  echo '<div class="form-group"><label>Hasło: </label><input class="form-control" name="password" type="password"></div>';
  echo '<div class="form-group text-right"><input class="btn btn-primary p-2" type="submit" value="Zaloguj"></div></form></div>';
  unset($_SESSION['log_error']);
}
