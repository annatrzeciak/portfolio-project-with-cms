<?php
  session_start();
  unset($_SESSION['user_id']);
  unset($_SESSION['user_login']);
  unset($_SESSION['error']);
  unset($_SESSION['success']);


  header('Location: /admin');
?>
