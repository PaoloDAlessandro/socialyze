<?php
  error_reporting(E_ERROR | E_PARSE);
  include "../config.php";
  $room = $_GET['roomId'];
  $user = $_GET['userId'];
  $sql = "SELECT category, level FROM rooms WHERE id = '$room'";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);
  $category = strtolower($row['category']);
  $responde = array($row['level']);
  $sql = "SELECT lvl FROM badges WHERE id_user = '$user' AND category = '$category'";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);
  if($row['lvl'] == null){
    $responde[1] = 404;
  }
  else {
    $responde[1] = $row['lvl'];
  }

  $responde[2] = $category;
  echo json_encode($responde);
 ?>
