<?php 

session_start();
$_SESSION["section"]=$_POST["sec"];
      $_SESSION['loggedin'] = true;
      $_SESSION['start'] = time();     
    $_SESSION['expire'] = $_SESSION['start']+(10*60);
  header('Location: add_vote.php');

  ?>