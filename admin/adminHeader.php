<div class="admin-section">
  <div class="admin-header">
    <div class="container">
      <div class="row">
        <div class="col-6">Witaj w panelu admina</div>
        <div class="col-6 text-right"><a  href="./logout.php" >wyloguj</a></div>
      </div>
      <nav>
        <a href="./comments">Komentarze</a>
        <a href="./blog-news">Wpisy na blogu</a>
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
