<?php
include '../header.php';
require('./adminUtils.php');
if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id']=0;
}
if(($_SESSION['user_id']>0)){
  require('./adminHeader.php');
  echo '<div class="container"><h2>Edytuj treść</h2>';

  $id = $_GET['id'];

  global $connection;

  $solution=$connection->query('SELECT * FROM news WHERE id='.$id.' LIMIT 1');
  if(!$solution) throw new Exception($connection->error);
  $row=$solution->fetch_assoc();
  $title = $row['title'];
	$content = $row['content'];
	$date = $row['date'];
  $photo = $row['photo'];
  $category = $row['category'];


?>
  <form class="form-group" method='POST' action='saveNew'>
	<input type='hidden' name='id' value='<?php echo $id; ?>'>
	<input  class="form-control"type='text' name='title' value='<?php echo $title; ?>'><br>
	<input  class="form-control"type='date' name='date' value='<?php echo $date; ?>'><br>
  <input  class="form-control" type='text' name='category' value='<?php echo $category; ?>'><br>
	<textarea  class="form-control" name='content' cols='90' rows='20'>
	<?php echo $content?>
	</textarea>
  <!-- <div class="text-center">
    <br>
  <a href="/admin/blog-news">Anuluj</a> -->
	<input  class="btn btn-sm btn-primary p-3" type='submit' value='Zapisz'>
<!-- </div> -->
	</form>


<?php

  echo'</div>';

}else{
  header('Location: /admin');
}

?>
