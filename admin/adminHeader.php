<div class="admin-section">
  <div class="admin-header">
    <div class="container-fluid">
      <nav class="d-flex nav">
       <a href="/" title="Strona główna" class="logo navbar-brand pt-0">code way</a>
        <a class='nav-link p-3' href="./comments.php">Komentarze</a>
        <a class='nav-link p-3' href="./blog-articles.php">Wpisy na blogu</a>
        <a class='nav-link p-3' href="./projects.php">Projekty</a>

        <a class="text-success nav-link  ml-auto p-3" href="addArticle.php"><i class="fas fa-plus"></i> nowy artykuł</a>
        <a class="text-success nav-link p-3" href="addProject.php"><i class="fas fa-plus"></i> nowy projekt</a>
        <a  class='nav-link p-3'href="./logout.php" >wyloguj</a>

      </nav>
    </div>
  </div>
  <div id="success-info" class="success-info"></div>
  <div id="error-info" class="error-info"></div>
  <?php
  if (isset($_SESSION['success'])){
    echo '
    <script>(function(){
      document.getElementById("success-info").innerHTML="'.$_SESSION["success"].'";
      setTimeout(function(){
        document.getElementById("success-info").classList.add("visible");
        setTimeout(function(){
          document.getElementById("success-info").classList.remove("visible");
        },5000);
      },300);
    })()</script>';
  }
  if (isset($_SESSION['error'])){
    echo '
    document.getElementById("error-info").innerHTML="'.$_SESSION["error"].'";
    <script>(function(){
      setTimeout(function(){
        document.getElementById("error-info").classList.add("visible");
        setTimeout(function(){
          document.getElementById("error-info").classList.remove("visible");
        },5000);
      },300);
    })()</script>';

  }
  unset($_SESSION['error']);
  unset($_SESSION['success']);
    
?>
