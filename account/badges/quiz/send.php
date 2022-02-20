<?php
  include "../../../config.php";
  session_start();
  $username = $_SESSION['username'];
  $sql = "SELECT id FROM users WHERE username = '$username'";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);
  $id_user = $row['id'];
  $score = $_POST['score'];
  $category = $_POST['category'];
  $today = date("Y-m-d H:i:s");
  $sql = "INSERT INTO scoring (`id_user`, `category`, `score`, `date`) VALUES ('$id_user', '$category', '$score', '$today')";
  $result = $con->query($sql);
  echo $result;
  if ($score >= 4) {
    $sql = "INSERT INTO badges (`id_user`, `category`, `lvl`) VALUES ('$id_user', '$category', '1')";
    $result = $con->query($sql);
  }
 ?>
