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
  $max_size = 20971520;
  $file = $_FILES['photo']['name'];
  $file_loc = $_FILES['photo']['tmp_name'];
  $file_size = $_FILES['photo']['size'];

  if($file_size > $max_size){
    $_SESSION['photo_error']='Plik jest za duży ';
    $form_complete=false;
  }
  $file_type = $_FILES['photo']['type'];
  $file_path="/images/".$file;

  if(move_uploaded_file($file_loc,$_SERVER['DOCUMENT_ROOT'].$file_path)){
    if(isset($_SESSION['form_photo'])){
      unset($_SESSION['form_photo']);
    }
  }else{
    if(isset($_SESSION['form_photo'])){
      $file_path=$_SESSION['form_photo'];
    }else{
      $_SESSION['photo_error'] = $_SESSION['photo_error'].'Nie udalo się załadować pliku';
      $form_complete=false;
    }

  }
  if(strlen($_POST['title'])<1){
    $_SESSION['title_error']='Wprowadź tytuł projektu';
    $form_complete=false;
  }
  if(strlen($_POST['tags'])<1){
    $_SESSION['tags_error']='Dodaj tagi';
    $form_complete=false;
  }
  if(strlen($_POST['link-view'])<1){
    $_SESSION['link_view_error']='Podaj link do projektu';
    $form_complete=false;
  }
  if(strlen($_POST['link-github'])<1){
    $_SESSION['link_github_error']='Podaj link do kodu';
    $form_complete=false;
  }
  if(strlen($_POST['content'])<=10){
    $_SESSION['content_error']='Wprowadź opis projektu';
    $form_complete=false;
  }


  if(  $form_complete==true){
    unset($_SESSION['form_photo']);

    if($_POST['function']=='upload'){
      // echo "UPDATE projects SET content ='".$_POST['content']."', title = '".$_POST['title']."', link_view = '".$_POST['link-view']."' , link_github = '".$_POST['link-github']."', tags= '".$_POST['tags']."', photo='".$file_path."' WHERE id = ".$_POST['id'];

      $solution=$connection->query("UPDATE projects SET content ='".$_POST['content']."', title = '".$_POST['title']."', link_view = '".$_POST['link-view']."' , link_github = '".$_POST['link-github']."', tags= '".$_POST['tags']."', photo='".$file_path."' WHERE id = ".$_POST['id']);
      if(!$solution) {
        throw new Exception($connection->error);
        $_SESSION['error']='Wystąpił błąd podczas aktualizowania projektu. Spróbuj ponownie później';
      }else {
        $_SESSION['success']='Projekt został zaktualizowany';
      }

    } elseif ($_POST['function']=='add') {

      if(!$connection->query("INSERT INTO projects (id ,title, content, photo, link_view, link_github, tags) VALUES  (null, '".$_POST['title']."', '".$_POST['content']."', '".$file_path."', '".$_POST['link-view']."', '".$_POST['link-github']."',  '".$_POST['tags']."')")){
      // if(!$solution) {
        throw new Exception($connection->error);
        $_SESSION['error']='Wystąpił błąd podczas dodawania projektu. Spróbuj ponownie później';
      }else{
        $_SESSION['success']='Projekt został dodany';
      }
    }


  	header("Location: /admin/projects.php");
  }else{
    $_SESSION['form_title']=$_POST['title'];
    $_SESSION['form_photo']=$file_path;
    $_SESSION['form_content']=$_POST['content'];
    $_SESSION['form_tags']=$_POST['tags'];
    $_SESSION['form_link_github']=$_POST['link-github'];
    $_SESSION['form_link_view']=$_POST['link-view'];


    if($_POST['function']=='upload'){
      header("Location: /admin/editProject.php?id=".$_POST['id']);
    } elseif ($_POST['function']=='add') {

      header("Location: /admin/addProject.php");
    }

  }

}
else{
	require("/adminLogin.php");
}


?>
