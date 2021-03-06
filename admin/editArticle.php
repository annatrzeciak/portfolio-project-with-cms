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
  echo '<div class="container"><h2>Edytuj treść</h2>';

  $id = $_GET['id'];

  global $connection;

  $solution=$connection->query('SELECT * FROM articles WHERE id='.$id.' LIMIT 1');
  if(!$solution) throw new Exception($connection->error);
  $row=$solution->fetch_assoc();
  $title = $row['title'];
	$content = $row['content'];
	$date = $row['date'];
  $photo = $row['photo'];
  $category = $row['category'];


?>
    <form enctype="multipart/form-data" class="form-group" method='POST' action='saveArticle.php'>
      <input type='hidden' name='function' value='upload'>
        <input type='hidden' name='id' value='<?php echo $id; ?>'>
        <input class="form-control" type='text' name='title' value="<?php
          if(isset($_SESSION['form_title'])){
              echo $_SESSION['form_title'];
              unset($_SESSION['form_title']);
          }else{
            echo $title;
          }?>">
          <?php
           if(isset($_SESSION['title_error'])){
               echo '<div class="error">'.$_SESSION['title_error'].'</div>';
               unset($_SESSION['title_error']);
           }
          ?>
        <label class="mb-0"><strong class="mb-2">Główny obrazek</strong>

        <input onchange="previewFile()" class="form-control" type="file" name="photo" accept="image/*">
        <img class="mb-2"style="max-width:250px;"src="<?php
        if(isset($_SESSION['form_photo'])){
          echo $_SESSION['form_photo'];
        }else{
          echo $photo;}
        ?>" alt="">
      </label>
      <?php
       if(isset($_SESSION['photo_error'])){
           echo '<div class="error">'.$_SESSION['photo_error'].'</div>';
           unset($_SESSION['photo_error']);
       }
      ?>
        <input class="form-control" type='date' name='date' value="<?php
          if(isset($_SESSION['form_date'])){
              echo $_SESSION['form_date'];
              unset($_SESSION['form_date']);
          }else{echo $date;}?>">
          <?php
           if(isset($_SESSION['date_error'])){
               echo '<div class="error">'.$_SESSION['date_error'].'</div>';
               unset($_SESSION['date_error']);
           }
          ?>
        <input class="form-control" type='text' name='category' value="<?php
          if(isset($_SESSION['form_category'])){
              echo $_SESSION['form_category'];
              unset($_SESSION['form_category']);
        }else{echo $category;}?>">
          <?php
           if(isset($_SESSION['category_error'])){
               echo '<div class="error">'.$_SESSION['category_error'].'</div>';
               unset($_SESSION['category_error']);
           }
          ?>

        <textarea id="editor" class="form-control " name='content' cols='90' rows='20'>
        <?php
            if(isset($_SESSION['form_content'])){
                echo $_SESSION['form_content'];
                unset($_SESSION['form_content']);
            }else{echo $content;}?>
      	</textarea>
        <?php
         if(isset($_SESSION['content_error'])){
             echo '<div class="error">'.$_SESSION['content_error'].'</div>';
             unset($_SESSION['content_error']);
         }
        ?>

        <div class="text-center">
            <br>
            <a href="/admin/blog-articles.php">Anuluj</a>
            <input class="btn btn-sm btn-primary p-3" type='submit' value='Zapisz'>
        </div>
    </form>


    	<!-- <form enctype="multipart/form-data" action="uploadImage.php" method="POST">
    	Wybierz plik do uploadu: <input name="photo" type="file"><br>
    	<input type='submit' value='Upload File'>
    	</form> -->

    <?php

  echo'</div></div>';

}else{
  header('Location: /admin');
}
include '../footer.php';

?>
