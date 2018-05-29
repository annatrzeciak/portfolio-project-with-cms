<?php
try{
  $connection = new mysqli('localhost','root','','portfolio');
  mysqli_set_charset($connection,"utf8");
  if($connection->connect_errno!=0){
    throw new Exeption(mysqli_connect_errno());}
}catch(Exception $e){
  echo '<span style="color:red">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
  echo '<br/> info dev:'.$e;
}

function loadComments(){
  global $connection;

  $solution=$connection->query('SELECT * FROM comments');
  if(!$solution) throw new Exception($connection->error);
  $row=$solution->fetch_all();

  return $row;

}
