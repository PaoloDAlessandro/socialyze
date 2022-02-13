<?php
  include '../config.php';
  $username = $_POST['username'];
  $password = $_POST['encryptPsw'];
  $sql = "SELECT id, username FROM users WHERE username = '$username' AND psw = '$password'";
  $result = $con->query($sql);
  if($result->num_rows != 0){
    session_start();
    $row = mysqli_fetch_assoc($result);
    $_SESSION['logged'] = 1;
    $_SESSION['username'] = $row['username'];
    header('Location:/index/');
  }
  else {
    header("Location:/login/");
  }
?>
