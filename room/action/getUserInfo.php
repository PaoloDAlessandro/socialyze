<?php
  include "../../config.php";
  $user_id = $_POST['user_id'];
  $sql = "SELECT username, avatar_name FROM users WHERE id = '$user_id'";
  $result = $con->query($sql);
  $return[] = array();
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($return, $row['username']);
    array_push($return, $row['avatar_name']);

  }
  $return_json = json_encode($return);
  echo $return_json;
 ?>
