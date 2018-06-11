<?php
include('../header.php');
include('../menu.php');
include('../db.php');


?>
<section class="blog-articles-list">
  <div class="container">
    <h1>Wpisy na blogu</h1>
    <?php
    $articles=loadArticles();
    foreach ($articles as $key => $value) {
      echo '<div class="row my-4">
          <div class="col-sm-5">
            <img src="';
            if($value[4]==''){
              echo '/images/web-designer.jpg';
            }else{
              echo $value[4];
            }
            echo '" alt="'.$value[1].' - grafika " title="'.$value[1].'" class="img-fluid">
          </div>
          <div class="col-sm-7">
            <h3>'.$value[1].'</h3>
            <p>'.substr($value[3],0,200).'</p>
            <div class="text-right"><a class="btn-gradient p-2" alt="'.$value[1].'" href="'.$value[6].'"><span>więcej</span></a></div>
          </div>
        </div>';
    }

     ?>

  </div>
</section>
  <?php

include('../footer.php')
?>
