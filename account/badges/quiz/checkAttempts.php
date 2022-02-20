<?php
  include "../../../config.php";
  session_start();
  $username = $_SESSION['username'];
  $sql = "SELECT id FROM users WHERE username = '$username'";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);
  $id_user = $row['id'];
  $category = $_POST['category'];
  $sql = "SELECT COUNT(id) as count FROM scoring WHERE id_user = '$id_user' AND category = '$category'";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);
  $count = $row['count'];
  echo $count;
 ?>
