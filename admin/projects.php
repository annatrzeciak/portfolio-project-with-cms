<?php
include '../header.php';
require('./adminUtils.php');
$projects=loadProjects();
if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){
  require('./adminHeader.php');
  unset($_SESSION['form_title']);
  unset($_SESSION['form_content']);
  unset($_SESSION['form_photo']);
  unset($_SESSION['form_tags']);
  unset($_SESSION['form_link_view']);
  unset($_SESSION['form_link_github']);

  echo '<div class="container-fluid">
  <table class="table table-striped table-hover"><thead><tr><th>lp.</th><th>Tytuł</th><th>Opis</th><th>Tagi</th><th>Link do projektu</th><th>Link do kodu</th><th>Zdjęcie</th><th class="actionCell">Akcje</th></thead><tbody>';
	foreach ($projects as $key => $value) {
    echo '<tr><td>'.$key.'</td><td>'.$value[1].'</td><td>'.$value[2].'</td><td>'.$value[6].'</td><td>'.$value[4].'</td><td>'.$value[5].'</td><td><img width="150" src="'.$value[3].'"></td><td class="actionCell"><a href="editProject.php?id='.$value[0].' "><i class="edit"></i></a> <a href="delProject.php?id='.$value[0].'" ';
    echo "onclick='";
    echo 'javascript: return confirm("Czy na pewno chcesz usunąć projekt: '.$value[1].'")';
    echo "'><i class='delete'></i></a></td>
    </tr>";
  }

  echo'</tbody></table></div></div>';

}else{
  header('Location: /admin');
}

?>
