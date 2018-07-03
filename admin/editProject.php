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
  echo '<div class="container"><h2>Edytuj projekt</h2>';

  $id = $_GET['id'];

  global $connection;

  $solution=$connection->query('SELECT * FROM projects WHERE id='.$id.' LIMIT 1');
  if(!$solution) throw new Exception($connection->error);
  $row=$solution->fetch_assoc();
  $title = $row['title'];
	$content = $row['content'];
  $photo = $row['photo'];
  $link_view = $row['link_view'];
  $link_github = $row['link_github'];
  $tags=$row['tags'];


?>
    <form enctype="multipart/form-data" class="form-group" method='POST' action='saveProject.php'>
      <input type='hidden' name='function' value='upload'>
        <input type='hidden' name='id' value='<?php echo $id; ?>'>
        <div class="form-group">
          <label><strong>Tytuł</strong></label>
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
        </div>
        <div class="form-group">
          <label><strong>Obrazek</strong></label>
        <input onchange="previewFile()" class="form-control" type="file" name="photo" accept="image/*">
        <img class="mb-2"style="max-width:250px;"src="<?php
        if(isset($_SESSION['form_photo'])){
          echo $_SESSION['form_photo'];
        }else{
          $_SESSION['form_photo']=$photo;
          echo $photo;
        }
        ?>" alt="">
      <?php
       if(isset($_SESSION['photo_error'])){
           echo '<div class="error">'.$_SESSION['photo_error'].'</div>';
           unset($_SESSION['photo_error']);
       }
      ?>
    </div>
    <div class="form-group">
      <label><strong>Tagi</strong></label>
      <input class="form-control" type='text' name='tags' value="<?php
        if(isset($_SESSION['form_tags'])){
            echo $_SESSION['form_tags'];
            unset($_SESSION['form_tags']);
        }else{
          echo $tags;
        }?>">
        <?php
         if(isset($_SESSION['tags_error'])){
             echo '<div class="error">'.$_SESSION['tags_error'].'</div>';
             unset($_SESSION['tags_error']);
         }
        ?>
      </div>
      <div class="form-group">
        <label><strong>Link do strony</strong></label>
        <input class="form-control" type='text' name='link-view' value="<?php
          if(isset($_SESSION['form_link_view'])){
              echo $_SESSION['form_link_view'];
              unset($_SESSION['form_link_view']);
          }else{
            echo $link_view;
          }?>">
          <?php
           if(isset($_SESSION['link_view_error'])){
               echo '<div class="error">'.$_SESSION['link_view_error'].'</div>';
               unset($_SESSION['link_view_error']);
           }
          ?>
        </div>
        <div class="form-group">
          <label><strong>Link do kodu</strong></label>
          <input class="form-control" type='text' name='link-github' value="<?php
            if(isset($_SESSION['form_link_github'])){
                echo $_SESSION['form_link_github'];
                unset($_SESSION['form_link_github']);
            }else{
              echo $link_github;
            }?>">
            <?php
             if(isset($_SESSION['link_github_error'])){
                 echo '<div class="error">'.$_SESSION['link_github_error'].'</div>';
                 unset($_SESSION['link_github_error']);
             }
            ?>
          </div>
          <div class="form-group">
            <label><strong>Opis</strong></label>
        <textarea class="form-control " name='content' cols='90' rows='10'>
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
</div>
        <div class="text-center">
            <br>
            <a href="/admin/projects.php">Anuluj</a>
            <input class="btn btn-sm btn-primary p-3" type='submit' value='Zapisz'>
        </div>
    </form>
    <?php

  echo'</div></div>';

}else{
  header('Location: /admin');
}
include '../footer.php';

?>
