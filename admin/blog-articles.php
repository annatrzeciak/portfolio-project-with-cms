<?php
include '../header.php';
require('./adminUtils.php');
$articles=loadArticles();
if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){
  require('./adminHeader.php');
  echo '<div class="container-fluid">
  <table class="table table-striped table-hover"><thead><tr><th>lp.</th><th>Kategoria</th><th>Tytuł</th><th>Data</th><th>Treść</th><th>Zdjęcie</th><th class="actionCell">Akcje</th></thead><tbody>';
	foreach ($articles as $key => $value) {
    echo '<tr><td>'.$key.'</td><td>'.$value[5].'</td><td>'.$value[1].'</td><td>'.$value[2].'</td><td>'.substr($value[3],0,200).'</td><td><img width="150" src="'.$value[4].'"></td><td class="actionCell"><a href="editArticle.php?id='.$value[0].' "><i class="edit"></i></a> <a href="delArticle.php?id='.$value[0].'" ';
    echo "onclick='";
    echo 'javascript: return confirm("Czy na pewno chcesz usunąć wpis: '.$value[1].'")';
    echo "'><i class='delete'></i></a></td>
    </tr>";
  }

  echo'</tbody></table></div></div>';

}else{
  header('Location: /admin');
}

?>
