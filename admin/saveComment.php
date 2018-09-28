<?php
include '../header.php';
require './adminUtils.php';
unset($_SESSION['error']);
unset($_SESSION['success']);

require './adminHeader.php';

$form_complete = true;
$max_size = 20971520;
if ($_FILES['photo']['name'] != '' || isset($_SESSION['form_photo'])) {
    $file = $_FILES['photo']['name'];
    $file_loc = $_FILES['photo']['tmp_name'];
    $file_size = $_FILES['photo']['size'];

    if ($file_size > $max_size) {
        $_SESSION['photo_error'] = 'Plik jest za duży ';
        $form_complete = false;
    }
    $file_type = $_FILES['photo']['type'];
    $file_path = "/images/" . $file;

    if (move_uploaded_file($file_loc, $_SERVER['DOCUMENT_ROOT'] . $file_path)) {
        if (isset($_SESSION['form_photo'])) {
            unset($_SESSION['form_photo']);
        }
    } else {
        if (isset($_SESSION['form_photo'])) {
            $file_path = $_SESSION['form_photo'];
        } else {
            $_SESSION['photo_error'] = $_SESSION['photo_error'] . 'Nie udalo się załadować pliku';
            $form_complete = false;
        }

    }
} else {
    $file_path = "/images/default-user.png";
}
if (strlen($_POST['name']) <= 3) {
    $_SESSION['name_error'] = 'Wprowadzony tekst jest za krótki';
    $form_complete = false;
}
if (strlen($_POST['company']) <= 3) {
    $_SESSION['company_error'] = 'Wprowadzony tekst jest za krótki';
    $form_complete = false;
}
if (strlen($_POST['comment']) < 10) {
    $_SESSION['comment_error'] = 'Komentarz musi zawierać minimum 10 znaków';
    $form_complete = false;
}

if ($form_complete == true) {
    unset($_SESSION['form_photo']);

    if (!$connection->query("INSERT INTO comments (id ,name, subname, comment, photo) VALUES  (null, '" . $_POST['name'] . "', '" . $_POST['company'] . "', '" . $_POST['comment'] . "', '" . $file_path . "')")) {
        // if(!$solution) {
        throw new Exception($connection->error);
        $_SESSION['add_comment_error'] = 'Wystąpił błąd podczas dodawania komentarza. Spróbuj ponownie';
    } else {
        $_SESSION['add_comment_success'] = 'Komentarz został dodany';
    }

    header("Location: /#comments");
} else {
    $_SESSION['form_name'] = $_POST['name'];
    $_SESSION['form_company'] = $_POST['company'];
    $_SESSION['form_comment'] = $_POST['comment'];
    $_SESSION['add_comment_error'] = 'Wystąpił błąd podczas dodawania komentarza. Spróbuj ponownie';
    header("Location: /#comments");

}
