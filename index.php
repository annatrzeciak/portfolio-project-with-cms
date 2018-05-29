<?php include 'header.php'; ?>
    <header id='home' class="d-flex justify-content-center align-items-center">
<?php include 'menu.php';
require('db.php');

 ?>
    </div>
    <div class="header-content">
      <h3>Hello, I am</h3>
      <h1><span class="text-gradient">John</span><br><span>Smith</span></h1>
      <h4>I have more than 10 years of experience</h4>
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
              <h5>Phone number</h5>
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
              <h5>Address</h5>
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
        <p class="text-center">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
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
        <h3 class="section-title">Comments</h3>
        <div class="slider">

          <?php
            $solution=loadComments();
            	foreach ($solution as $key => $value) {
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
        <p class="text-center">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="row">
          <a href='#' class="col-md-4 short-blog-text">
            <img src="./images/woman.png" alt="" class="img-fluid">
            <span class="blog-category">Personal Adviser</span>
            <h5>Computer and using some color</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
          </a>
            <a href='#'  class="col-md-4 short-blog-text">

            <img src="./images/building.png" alt="" class="img-fluid">

            <span class="blog-category">Personal Adviser</span>
            <h5>Computer and using some color</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
          </a>
            <a href='#'  class="col-md-4 short-blog-text">

            <img src="./images/person.png" alt="" class="img-fluid">

            <span class="blog-category">Personal Adviser</span>
            <h5>Computer and using some color</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
          </a>

        </div>

      </div>

    </section>
    <?php include 'footer.php'; ?>
