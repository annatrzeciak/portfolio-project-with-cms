<?php
include('../header.php');
include('../menu.php');
require('../db.php');
$article=loadNew($_SERVER['REQUEST_URI']);

?>
<article class="blog-article">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <img class="img-fluid" src="<?php echo $article['photo'];?>">
        <h1 class="mt-5"><?php echo $article['title'];?></h1>
      </div>
      <div class="col-md-10 my-3">
        <h3 class="subtitle"><?php echo $article['category'].' '.$article['date'];?></h3>
        <article class=""><?php echo $article['content'];?>
        </article>
      </div>
      <div class="col-md-2">

      </div>

    </div>
  </div>

</article>

<?php
require('../footer.php');

 ?>
