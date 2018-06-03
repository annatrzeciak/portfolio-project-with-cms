<?php
include '../header.php';
require('./adminUtils.php');
$comments=loadComments();
if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){
  require('./adminHeader.php');
  echo '<div class="container"><table class="table table-striped table-hover"><thead><tr><th>lp.</th><th>komentarz</th><th>Podpis</th><th>Dodatkowy opis</th><th>Zdjęcie</th><th>Akcje</th></thead><tbody>';
	foreach ($comments as $key => $value) {
    echo '<tr><td>'.$key.'</td><td>'.$value[3].'</td><td>'.$value[1].'</td><td>'.$value[2].'</td><td><img width="150" src="'.$value[4].'"></td><td><a href="#">edytuj</a> <a href="#">usuń</a></td>
    </tr>';
  }

  echo'</tbody></table></div></div>';

}else{
  header('Location: /admin');
}

?>
