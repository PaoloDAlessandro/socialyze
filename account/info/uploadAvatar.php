<?php
  include "../../config.php";
  session_start();
  $username = $_SESSION['username'];
  $target_dir = "C:/Users/PaoloD'Alessandro/github/socialyze/avatar/";
  $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
      if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
        $file_name = basename( $_FILES["avatar"]["name"]);
        $sql = "UPDATE users SET avatar_name = '$file_name' WHERE username = '$username'";
        $result = $con->query($sql);
        echo $con->error;
        header('Location:/index/');
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    else {
      echo "File is not an image.";
      $uploadOk = 0;
    }



?>
