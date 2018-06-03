<?php
include '../header.php';
require('./adminUtils.php');
$news=loadAllNews();
if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){
  require('./adminHeader.php');
  echo '<div class="container"><table class="table table-striped table-hover"><thead><tr><th>lp.</th><th>Tytuł</th><th>Kategoria</th><th>Data</th><th>Treść</th><th>Zdjęcie</th><th>Akcje</th></thead><tbody>';
	foreach ($news as $key => $value) {
    echo '<tr><td>'.$key.'</td><td>'.$value[5].'</td><td>'.$value[1].'</td><td>'.$value[2].'</td><td>'.substr($value[3],0,200).'</td><td><img width="150" src="'.$value[4].'"></td><td><a href="editNew.php?id='.$value[0].'">edytuj</a> <a href="#">usuń</a></td>
    </tr>';
  }

  echo'</tbody></table></div></div>';

}else{
  header('Location: /admin');
}

?>
