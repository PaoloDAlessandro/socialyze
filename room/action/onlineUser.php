<?php
  include "../../config.php";
  $room_id = $_POST['room'];
  $sql = "SELECT id_user FROM users_in_room WHERE id_room = '$room_id'";
  $result = $con->query($sql);
  $return[] = array();
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($return, $row['id_user']);
  }
  $return_json = json_encode($return);
  echo $return_json;
 ?>
