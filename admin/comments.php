<?php
include '../header.php';
require('./adminUtils.php');
$comments=loadComments();
if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){
  require('./adminHeader.php');
  echo '<div class="container-fluid"><table class="table table-striped table-hover"><thead><tr><th>lp.</th><th>komentarz</th><th>Podpis</th><th>Dodatkowy opis</th><th>Zdjęcie</th><th class="actionCell">Akcje</th></thead><tbody>';
	foreach ($comments as $key => $value) {
    echo '<tr><td>'.$key.'</td><td>'.$value[3].'</td><td>'.$value[1].'</td><td>'.$value[2].'</td><td><img width="80" src="'.$value[4].'"></td><td class="actionCell"><a href="delComment.php?id='.$value[0].'" ';
    echo "onclick='";
    echo 'javascript: return confirm("Czy na pewno chcesz komentarz: '.$value[1].'")';
    echo "'><i class='fas fa-trash-alt'></i></a></td>
    </tr>";
  }

  echo'</tbody></table></div></div>';
        include('../footer.php');


}else{
  header('Location: /admin');
}

?>
