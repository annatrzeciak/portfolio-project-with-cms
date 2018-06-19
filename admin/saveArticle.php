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

  $form_complete=true;

  if(strlen($_POST['title'])<1){
    $_SESSION['title_error']='Wprowadź tytuł artykułu';
    $form_complete=false;
  }
  if(strlen($_POST['content'])<=40){
    $_SESSION['content_error']='Wprowadź tekst';
    $form_complete=false;
  }
  if(strlen($_POST['date'])!=10){
    $_SESSION['date_error']='Wybierz datę';
    $form_complete=false;
  }
  if(  $form_complete==true){

    if($_POST['function']=='upload'){

      $solution=$connection->query("UPDATE articles SET content ='".$_POST['content']."', title = '".$_POST['title']."',date = '".$_POST['date']."' ,category = '".$_POST['category']."' WHERE id = ".$_POST['id']);
      if(!$solution) {
        throw new Exception($connection->error);
        $_SESSION['error']='Wystąpił błąd podczas aktualizowania wpisu. Spróbuj ponownie później';
      }

      $_SESSION['success']='Wpis został zaktualizowany';
    } elseif ($_POST['function']=='add') {

      if(!$connection->query("INSERT INTO articles (id ,title, date, content, photo, category, path) VALUES  (null, '".$_POST['title']."', '".$_POST['date']."', '".$_POST['content']."', '', '".$_POST['category']."', '')")){
      // if(!$solution) {
        throw new Exception($connection->error);
        $_SESSION['error']='Wystąpił błąd podczas dodawania wpisu. Spróbuj ponownie później';
      }

      $_SESSION['success']='Wpis został dodany';
    }


  	header("Location: /admin/blog-articles.php");
  }else{
    $_SESSION['form_title']=$_POST['title'];
    $_SESSION['form_content']=$_POST['content'];
    $_SESSION['form_date']=$_POST['date'];
    $_SESSION['form_category']=$_POST['category'];

    if($_POST['function']=='upload'){
      header("Location: /admin/editArticle.php?id=".$_POST['id']);
    } elseif ($_POST['function']=='add') {

      header("Location: /admin/addArticle.php");
    }


  }

}
else{
	require("/adminLogin.php");
}


?>
