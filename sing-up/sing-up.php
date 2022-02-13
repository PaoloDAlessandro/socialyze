<?php
  include '../config.php';
  $username = $_POST['username'];
  $email = $_POST['email'];
  $psw = $_POST['encryptPsw'];
  if(empty($psw)){
    header('Location:/sing-up/');
  }
  $sql = "SELECT id FROM users WHERE username = '$username'";
  $result = $con->query($sql);
  if($result->num_rows != 0){
    header('Location:/sing-up/');
  }
  else {
    $sql = "INSERT INTO `users`(`username`, `psw`, `email`, `avatar_name`) VALUES('$username', '$psw', '$email', 'default.png')";
    $result = $con->query($sql);
    if($result == 1){
      header('Location:/login/');
    }
    else {
      echo "error";
      echo $con -> error;

    }
  }
 ?>
