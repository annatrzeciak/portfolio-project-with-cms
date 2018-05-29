<?php
include 'header.php';
require('adminUtils.php');

if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){

  echo 'Witaj w panelu admina ';
  echo "<a href='logout.php' >wyloguj</a>";

}else{
  require('adminLogin.php');
}


?>
