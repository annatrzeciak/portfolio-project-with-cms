<?php
include '../header.php';
include '../menu.php';
include '../db.php';
?>

<section class="blog-articles-list">
  <div class="container">
    <h1>Wpisy na blogu</h1>
    <?php

$countArticles = intval(count(loadAllArticles()));
$countPages = ceil($countArticles / 10);
if (!isset($_GET['start']) || $_GET['start'] <= 0) {
    $_GET['start'] = 1;

} elseif ($_GET['start'] > $countPages) {
    $_GET['start'] = $countPages;
    header("Location: /blog/?start=" . $countPages);
}
$page = $_GET['start'] - 1;
$articles = loadArticles(10, $page);
foreach ($articles as $key => $value) {
    echo '<div class="row my-4">
          <div class="col-sm-5">
            <img src="';
    if ($value[4] == '') {
        echo '/images/default-image.png';
    } else {
        echo $value[4];
    }
    echo '" alt="' . $value[1] . ' - grafika " title="' . $value[1] . '" class="img-fluid">
          </div>
          <div class="col-sm-7">
            <h3>' . $value[1] . '</h3>
            <p>' . substr($value[3], 0, 200) . '</p>
            <div class="text-right"><a class="btn-gradient p-2" alt="' . $value[1] . '" href="/blog/article.php?id=' . $value[0] . '?title='.title_url($value[1]).'"><span>więcej</span></a></div>
          </div>
        </div>';
}
if ($countPages > 1) {
    echo
        '<nav aria-label="Page navigation ">
      <ul class="pagination pagination-sm justify-content-center">
        <li class="page-item ';
    if ($_GET['start'] == 1) {
        echo 'disabled';
    }

    echo '">
          <a class="page-link" href="/blog/?start=' . ($page) . '" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
      ';
    for ($i = 1; $i <= $countPages; $i++) {
        echo '<li class="page-item ';
        if ($_GET['start'] == $i) {
            echo 'active';
        }

        echo '"><a class="page-link" href="/blog/?start=' . $i . '">' . $i . '</a></li>';
    }
    echo '<li class="page-item ';
    if ($_GET['start'] == $countPages) {
        echo 'disabled';
    }

    echo '">
        <a class="page-link" href="/blog/?start=' . ($page + 2) . '" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>';
}
?>

  </div>
</section>
<?php
include '../footer.php'
?>
