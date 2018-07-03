<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
  <div class="container">
       <a class="navbar-brand logo"<?php echo ($_SERVER['REQUEST_URI']=='/') ? 'href="#home" ': 'href="/" ' ?> >code way</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav d-flex justify-content-end">

        <li class="nav-item">
          <a class="nav-link" <?php echo ($_SERVER['REQUEST_URI']=='/') ? 'href="#about" ': 'href="/#about" ' ?> >o mnie</a>
        </li>
        <li class="nav-item nav-link">-</li>
        <li class="nav-item">

              <a class="nav-link "  <?php echo ($_SERVER['REQUEST_URI']=='/') ? 'href="#portfolio" ': 'href="/#portfolio" ' ?> >Portfolio</a>
        </li>
        <li class="nav-item nav-link">-</li>
        <li class="nav-item">
            <a class="nav-link " <?php echo ($_SERVER['REQUEST_URI']=='/') ? 'href="#comments"' : 'href="/#comments" '?> >opinie</a>

        </li>
          <li class="nav-item nav-link">-</li>
        <li class="nav-item">
          <a  <?php echo ($_SERVER['REQUEST_URI']=='/') ? 'href="#blog" class="nav-link "' : 'href="/blog" class="nav-link active"' ?>>Blog</a>
        </li>
        <!-- <li class="nav-item nav-link">-</li>
        <li class="nav-item">
          <a class="nav-link " href="#">Contact</a>
        </li> -->
      </ul>
    </div>
  </nav>
