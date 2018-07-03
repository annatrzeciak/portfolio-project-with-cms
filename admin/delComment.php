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
  $id = $_GET['id'];


  $solution=$connection->query('DELETE FROM comments WHERE id = '.$id);
  if(!$solution) {
    throw new Exception($connection->error);
    $_SESSION['error']='Wystąpił błąd podczas usuwania komentarza. Spróbuj ponownie później';
  }

  $_SESSION['success']='Komentarz został pomyślnie usunięty';

	header("Location: /admin/comments.php");


}else{
  header('Location: /admin');
}

?>
