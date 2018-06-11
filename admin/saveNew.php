<?php
include '../header.php';
require('./adminUtils.php');
unset($_SESSION['error']);
unset($_SESSION['success']);

if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){
  require('./adminHeader.php');

  $solution=$connection->query('UPDATE news SET content ="'.$_POST['content'].'", title = "'.$_POST['title'].'",date = "'.$_POST['date'].'" ,category = "'.$_POST['category'].'" WHERE id = '.$_POST['id']);
  if(!$solution) {
    throw new Exception($connection->error);
    $_SESSION['error']='Wystąpił błąd podczas aktualizowania wpisu. Spróbuj ponownie później';
  }

  $_SESSION['success']='Wpis został zaktualizowany';


	header("Location: /admin/blog-news");

}
else{
	require("/adminLogin.php");
}


?>
