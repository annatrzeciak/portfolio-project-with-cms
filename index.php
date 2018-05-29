<?php include 'header.php'; ?>
    <header id='home' class="d-flex justify-content-center align-items-center">
<?php include 'menu.php';
require('db.php');

 ?>
    </div>
    <div class="header-content">
      <h3>Witam, nazywam się</h3>
      <h1><span class="text-gradient">John</span><br><span>Smith</span></h1>
      <h4>Jestem Web designerem z 10-letnim doświadczeniem</h4>
      <a style="margin-top: 50px"href="#" class="btn btn-gradient"><span>Download CV</span></a>
    </div>
    </header>
    <section id='about' class="about-section">
      <div class="container">
        <div class="row">
          <div class=" py-5 d-flex justify-content-end col-lg-4 text-right flex-column">
            <h2>John Smith</h2>
            <span class="text-purpure text-uppercase font-bold">Web Designer</span>
            <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
          </div>
          <div class=" col-lg-5 col-md-7 px-0 d-flex align-items-end">
            <img src="images/john-smith.png" alt="John Smith" class="img-fluid">
          </div>
          <div class="py-5 col-lg-3 col-md-5 d-flex align-items-end ">
            <div class="skills">
              <div class="skill">
                <p class="text-center">Design (80%)</p>
                <div class="graph" style="background-image: linear-gradient(45deg, #a21af0 0%, #a21af0 78%, #ff0072 82%, #ff0072 100%);">
                </div>
              </div>
              <div class="skill">
                <p class="text-center">Photography (65%)</p>
                <div class="graph" style="background-image: linear-gradient(45deg, #a21af0 0%, #a21af0 63%, #ff0072 67%, #ff0072 100%);">

                </div>
              </div>
              <div class="skill">
                <p class="text-center">Marketing (50%)</p>
                <div class="graph" style="background-image: linear-gradient(45deg, #a21af0 0%, #a21af0 48%, #ff0072 52%, #ff0072 100%);">

                </div>
              </div>
              <div class="skill">
                <p class="text-center">Branding (30%)</p>
                <div class="graph" style="background-image: linear-gradient(45deg, #a21af0 0%, #a21af0 28%, #ff0072 32%, #ff0072 100%);">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-section page-section">
        <div class="container">
          <div class="row">

          <div class="col-lg-4">
            <div class="row">
            <div class="col-4">
              <i class="phone"></i>
            </div>
            <div class="col-8">
              <h5>Numer telefonu</h5>
              <span>+48 123 123 123</span><br>
              <span>+48 987 654 321</span>
            </div></div>
          </div>
          <div class="col-lg-4">
            <div class="row">
            <div class="col-4">
              <i class="localization"></i>
            </div>
            <div class="col-8">
              <h5>Adres</h5>
              <span>Al. Jerozolimskie 160</span><br>
              <span>01-234 Warszawa</span>
            </div>
          </div></div>
          <div class="col-lg-4">

            <div class="row">

            <div class="col-4">
              <i class="mail"></i>
            </div>
            <div class="col-8">
              <h5>Email</h5>
              <span>john.smith@company.pl</span><br>
              <span>office@company.pl</span>
            </div></div>
          </div>
        </div>
      </div>
    </section>
    <section id='portfolio' class="portfolio-section page-section">
      <div class="container">
        <h3 class="section-title">Portfolio</h3>
        <p class="text-center">Ostatnie projekty, które realizowałem.<br>Aby dowiedzieć się więcej wystarczy, że klikniesz na dany projekt i pokażą się dodatkowe informacje.</p>
        <div class="portfolio-items row">
          <div class="col-md-6 ">
            <div class="portfolio-item">
               <img src="./images/portfolio-business-card.png" alt="" class="img-fluid">
            </div>
            <div class="portfolio-item">
              <img src="./images/portfolio-cv-template.png" alt="" class="img-fluid">
            </div>
            <div class="portfolio-item">
              <img src="./images/portfolio-nature-template.png" alt=""class="img-fluid" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="portfolio-item">
              <img src="./images/portfolio-restaurant-table.png" alt=""class="img-fluid" >
            </div>
            <div class="portfolio-item">
              <img src="./images/portfolio-summer.png" alt=""class="img-fluid" >
            </div>
            <div class="portfolio-item">
              <img src="./images/portfolio-website-template.png" alt="" class="img-fluid">
          </div>
          </div>
        </div>
      </div>
    </section>
    <section id='comments' class="comments page-section">
      <div class="container">
        <h3 class="section-title">Opinie</h3>
        <div class="slider">

          <?php
            $comments=loadComments();
            	foreach ($comments as $key => $value) {
                echo
                  '<div class="comment-item item">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="quotation">
                          '.$value[3].'
                        </div>
                      </div>
                      <div class="col-md-5 offset-md-1">
                        <div class="row d-flex align-items-center">
                          <div class="col-5">
                              <img  alt="'.$value[1].' comment" title="'.$value[1].' - photo" src="'.$value[4].'">
                          </div>
                          <div class="col-7">
                            <h4>'.$value[1].'</h4>
                            <span>'.$value[2].'</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
                }?>

            </div>
        </div>
    </section>
    <section id='blog'class="page-section blog-section">
      <div class="container">
        <h3 class="section-title">Blog</h3>
        <p class="text-center">Najnowsze wpisy, które pojawiły się na moim blogu. </p>
        <div class="row">
          <?php
          $news=loadLastNews();
          foreach ($news as  $value) {
            echo '
            <a title="'.$value[1].'" href="'.$value[6].'" class="col-md-4 short-blog-text">
              <img src="'.$value[4].'" alt="" class="img-fluid">
              <span class="blog-category">'.$value[5].'</span>
              <h5>'.$value[1].'</h5>
              <div>'.substr($value[3],0,200).'...</div>
            </a>';
          }
          ?>
        </div>
        <div class="row text-center">
          <div class="col-12 text-center">
            <a class="btn btn-gradient"href="./blog.php"><span>więcej</span></a>
          </div>
        </div>

      </div>

    </section>
    <?php include 'footer.php'; ?>
