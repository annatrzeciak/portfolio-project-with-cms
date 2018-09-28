<?php include 'header.php';?>
<header id='home' class="d-flex justify-content-center align-items-center">
    <?php include 'menu.php';
include 'db.php';

?>
    </div>
    <div class="header-content">
         <h1><span class="text-gradient">Anna</span><br><span>Trzeciak</span></h1>
         <h4>Front-end Developer</h4>
         <a href="#about" title="Więcej informacji o code way" class="btn btn-gradient  mt-5">więcej</a>
     </div>
</header>
<section id='about' class="about-section py-5">
    <div class="container">
        <div class="row">
            <div class=" d-flex justify-content-end col-lg-5 text-right flex-column">
                <h2>Anna Trzeciak</h2>
                <span class="text-purpure text-uppercase font-bold">Front-end Developer</span>
                <p class="description">Ukończyłam studia matematyczne, które nauczyły mnie logicznego myślenia przydatnego w pracy programisty. Jestem osobą dokładną, zaangażowaną w powierzone zadania. Staram się pisać poprawny kod HTML5/CSS3/JavaScript zgodnie z najlepszymi praktykami i dbam, aby moje strony były responsywne i czytelne na różnych przeglądarkach internetowych.</p>
            </div>
            <div class="col-lg-7  skills d-flex justify-content-end  text-right flex-column">
                <div class="row">
                    <div class="col-md-6">
                        <div class="skill" data-percent='80'>
                            <p class="text-center ">HTML 5 + CSS 3 - <span class="counter" data-from="0">0</span>%</p>
                            <div class="graph"><span class='skill-value'></span>
                            </div>
                        </div>
                        <div class="skill" data-percent='80'>
                            <p class="text-center">Bootstrap_3/4 - <span class="counter" data-from="0">0</span>%</p>
                            <div class="graph"><span class='skill-value'></span>
                            </div>
                        </div>
                        <div class="skill" data-percent='60'>
                            <p class="text-center">GIT - <span class="counter" data-from="0">0</span>%</p>
                            <div class="graph"><span class='skill-value'></span>
                            </div>
                        </div>
                        <div class="skill" data-percent='20'>
                            <p class="text-center">PHP + MYSQL - <span class="counter" data-from="0">0</span>%</p>
                            <div class="graph"><span class='skill-value'></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="skill" data-percent='60'>
                            <p class="text-center">JavaScript ES6 - <span class="counter" data-from="0">0</span>%</p>
                            <div class="graph"><span class='skill-value'></span>
                            </div>
                        </div>
                        <div class="skill" data-percent='40'>
                            <p class="text-center">Angular 4 - <span class="counter" data-from="0">0</span>%</p>
                            <div class="graph"><span class='skill-value'></span>
                            </div>
                        </div>
                        <div class="skill" data-percent='20'>
                            <p class="text-center">jQuery - <span class="counter" data-from="0">0</span>%</p>
                            <div class="graph"><span class='skill-value'></span>
                            </div>
                        </div>
                        <div class="skill" data-percent='20'>
                            <p class="text-center">Photoshop - <span class="counter" data-from="0">0</span>%</p>
                            <div class="graph"><span class='skill-value'></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id='portfolio' class="portfolio-section page-section">
    <div class="container">
        <h3 class="section-title">Projekty</h3>
        <p class="text-center">Ostatnie projekty, które realizowałam.</p>
        <div class="portfolio-items ">
            <?php
$projects = loadProjects();
foreach ($projects as $key => $value) {
    $tags = explode(', ', trim($value[6]));
    if ($key % 2 == 0) {
        echo ' <div class="row project">
                <div class="col-lg-6 project-image">
                    <img src="';
        echo ($value[3] == '' || $value[3] == '/images/') ? '/images/default-image.png' : $value[3];
        echo '" alt="' . $value[1] . ' - zdjęcie" title="' . $value[1] . ' - screen projektu" class="img-fluid">
               </div>
                <div class="col-lg-6 project-description">
                    <h4>' . $value[1] . '</h4>
                    <p class="tags">';
        foreach ($tags as $tag) {
            echo '<span class="tag">' . $tag . '</span>';
        }
        echo '</p><p>' . $value[2] . '</p><a target="_blank" class="m-2" title="Zobacz stronę na żywo" href="' . $value[4] . '"><i class="far fa-eye"></i> </a>
                <a target="_blank" class=" m-2" title="Repozytorium strony" href="' . $value[5] . '"><i class="fab fa-github"></i> </a>
                </div>
            </div>';

    } else {
        echo ' <div class="row project">
                    <div class="col-lg-6 project-description">
                    <h4>' . $value[1] . '</h4>
                    <p class="tags">';
        foreach ($tags as $tag) {
            echo '<span class="tag">' . $tag . '</span>';
        }
        echo '</p><p>' . $value[2] . '</p><a target="_blank" class="m-2" title="Zobacz stronę na żywo" href="' . $value[4] . '"><i class="far fa-eye"></i> </a>
                <a target="_blank" class=" m-2" title="Repozytorium strony" href="' . $value[5] . '"><i class="fab fa-github"></i> </a>
                </div>
                <div class="col-lg-6 project-image">
                    <img src="' . $value[3] . '
              " alt="' . $value[1] . ' - zdjęcie" title="' . $value[1] . ' - screen projektu" class="img-fluid">
               </div>

            </div>';
    }

}
?>
        </div>
    </div>
    </div>
</section>
<section id='comments' class="comments page-section">
    <div class="container">
        <h3 class="section-title">Opinie</h3>
        <div class="slider">

            <?php
$comments = loadComments();
foreach ($comments as $key => $value) {
    echo
        '<div class="comment-item item">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="quotation">
                          ' . $value[3] . '
                        </div>
                      </div>
                      <div class="col-md-5 offset-md-1">
                        <div class="row d-flex align-items-center">
                          <div class="col-5">
                              <img  alt="' . $value[1] . ' comment" title="' . $value[1] . ' - photo" src="';
    echo ($value[4] == '' || $value[4] == '/images/') ? '/images/default-user.png' : $value[4];
    echo '"></div>
                          <div class="col-7">
                            <h4>' . $value[1] . '</h4>
                            <span>' . $value[2] . '</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
}?>
        </div>

        <div class="row mt-4">
        <?php
if (isset($_SESSION['add_comment_success'])) {
    echo "<div class='ok_info text-center col-12'>" . $_SESSION['add_comment_success'] . "</div>";
    unset($_SESSION['add_comment_success']);
}
if (isset($_SESSION['add_comment_error'])) {
    echo "<div class='error_info text-center col-12'>" . $_SESSION['add_comment_error'] . "</div>";
    unset($_SESSION['add_comment_error']);
}?>
            <form id='add-comment' class='col-md-8 offset-md-2 add-comment-form collapse' enctype="multipart/form-data" action="/admin/saveComment.php" method="POST">
            <div class="row mt-4">
            

            <div class="col-md-6 ">
                <input type="text" class="form-control" name="name" placeholder="Imię / nazwa" value="<?php
if (isset($_SESSION['form_name'])) {
    echo $_SESSION['form_name'];
    unset($_SESSION['form_name']);
}?>">
                            <?php
if (isset($_SESSION['name_error'])) {
    echo "<div class='error_info'>" . $_SESSION['name_error'] . "</div>";
    unset($_SESSION['name_error']);
}?>
                <input type="text" class="form-control" name="company"placeholder="Firma" value="<?php
if (isset($_SESSION['form_company'])) {
    echo $_SESSION['form_company'];
    unset($_SESSION['form_company']);
}?>">
                            <?php
if (isset($_SESSION['company_error'])) {
    echo "<div class='error_info'>" . $_SESSION['company_error'] . "</div>";
    unset($_SESSION['company_error']);
}?>
                <input type="file" name="photo" class="form-control"  >
                <?php
if (isset($_SESSION['photo_error'])) {
    echo "<div class='error_info'>" . $_SESSION['photo_error'] . "</div>";
    unset($_SESSION['photo_error']);
}?>

            </div>
            <div class="col-md-6">
            <textarea name="comment" id="" cols="0" rows="10" placeholder='Opinia'class="form-control" ></textarea>
            <?php
if (isset($_SESSION['comment_error'])) {
    echo "<div class='error_info'>" . $_SESSION['comment_error'] . "</div>";
    unset($_SESSION['comment_error']);
}?>
            <input type="submit" value="Wyślij" class='btn btn-gradient' >

</div></div>
            </form>
            <div class="col-12 text-center"><a class="btn btn-gradient" data-toggle="collapse" href="#add-comment" role="button" aria-expanded="false" ><i class="fas fa-chevron-down"></i> Dodaj opinie</a></div>
        </div>
    </div>
</section>
<section id='blog' class="page-section blog-section">
    <div class="container">
        <h3 class="section-title">Blog</h3>
        <p class="text-center">Najnowsze wpisy, które pojawiły się na moim blogu. </p>
        <div class="row">
            <?php
$articles = loadLastArticles();
foreach ($articles as $value) {
    echo '
            <a title="' . $value[1] . '" href="/blog/article.php?id=' . $value[0] . '?title=' . title_url($value[1]) . '" class="col-md-4 short-blog-text"> <img src="';
    if ($value[4] == '' || $value[4] == '/images/') {
        echo '/images/default-image.png';
    } else {
        echo $value[4];
    }
    echo '" alt="" class="img-fluid">
              <span class="blog-category">' . $value[5] . '</span>
              <h5>' . $value[1] . '</h5>
              <div>' . strip_tags(substr($value[3], 0, 200)) . '...</div>
            </a>';
}
?>
        </div>
        <div class="row text-center">
            <div class="col-12 text-center">
                <a class="btn btn-gradient mt-3" href="./blog"><span>więcej</span></a>
            </div>
        </div>
    </div>
</section>
<section id='contact' class="page-section">
    <div class="container">
        <h3 class="section-title">Kontakt</h3>
        <p class="text-center">Jesteś zainteresowany współpracą? Napisz do mnie :)</p>
        <div class="row contact-content">
            <div class="col-lg-6 text-center">
                <form class='send-message-form' method="post" action="sendMessage.php">
                    <?php
if (isset($_SESSION['sent_ok'])) {
    echo "<div class='ok_info'>" . $_SESSION['sent_ok'] . "</div>";
    unset($_SESSION['sent_ok']);
}
if (isset($_SESSION['sent_error'])) {
    echo "<div class='error_info'>" . $_SESSION['sent_error'] . "</div>";
    unset($_SESSION['sent_error']);
}?>
            <input name='email' type="email" class="form-control" placeholder="Adres e-mail" title="Podaj adres email" value="<?php
if (isset($_SESSION['form_email'])) {
    echo $_SESSION['form_email'];
    unset($_SESSION['form_email']);
}?>">
                        <?php
if (isset($_SESSION['email_error'])) {
    echo "<div class='error_info'>" . $_SESSION['email_error'] . "</div>";
    unset($_SESSION['email_error']);
}?>
                            <input name='name' type="text" placeholder="Imię i nazwisko " class="form-control" title="Wpisz imię, nazwisko lub nick" value="<?php
if (isset($_SESSION['form_name'])) {
    echo $_SESSION['form_name'];
    unset($_SESSION['form_name']);
}?>">
                            <?php
if (isset($_SESSION['name_error'])) {
    echo "<div class='error_info'>" . $_SESSION['name_error'] . "</div>";
    unset($_SESSION['name_error']);
}?>
                                <textarea placeholder='Wiadomość' class="form-control" name="message" cols="30" rows="10" title="Wpisz treść wiadomości którą chcesz przesłać"><?php
if (isset($_SESSION['form_message'])) {
    echo $_SESSION['form_message'];
    unset($_SESSION['form_message']);
}?></textarea>
                                <?php
if (isset($_SESSION['message_error'])) {
    echo "<div class='error_info'>" . $_SESSION['message_error'] . "</div>";
    unset($_SESSION['message_error']);
}?>
                                    <div class="text-right">
                                        <input type="submit" class="btn btn-gradient" value="Wyślij">
                                    </div>
                </form>
            </div>
            <div class="col-lg-5 offset-lg-1 text-center">
                <h3 class="mt-5"><strong><span class="logo">code way</span><br>Anna Trzeciak</strong></h3>
                <h5 class="mb-5">NIP: 826-214-96-06</h5>
                <h5><a href="tel:+48798590569">798 590 569</a></h5>
                <p class="mb-5"><a title="Wyślij maila do code way Anna Trzeciak" class="mx-2" href='mailto:a.trzeciak@code-way.com'><i class="fas fa-envelope"></i></a>
                    <a title="Linkedin - Anna Trzeciak" class="mx-2" href='https://www.linkedin.com/in/annatrzeciak3/'>
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a title="Github - Anna Trzeciak" class="mx-2" href='https://github.com/annatrzeciak'>
                      <i class="fab fa-github"></i>
                    </a>
                </p>
                <h5> <a class="font-bold" href="/Anna_Trzeciak_CV.pdf" download title="CV Anna Trzeciak">Pobierz CV <i class="fas fa-download"></i></a></h5>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php';?>
