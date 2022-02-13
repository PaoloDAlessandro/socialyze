<?php
  include "../config.php";
  $room_id = $_POST['room'];
  $user_id = $_POST['user'];
  $sql = "DELETE FROM users_in_room WHERE id_room = '$room_id' AND id_user = '$user_id'";
  $result = $con->query($sql);
  echo $user_id;
?>
