<?php
include '../header.php';
require('./adminUtils.php');

if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){
  require('./adminHeader.php');

  echo '<div class="container-fluid">Przejdź do odpowiedniej sekcji, aby móc zarządzać treścią</div></div>';

}else{
  require('./adminLogin.php');
}

?>
