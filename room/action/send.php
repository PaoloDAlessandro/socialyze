<?php
  include "../../config.php";
  $user_id = $_POST['user'];
  $message = $_POST['message'];
  $room_id = $_POST['room'];
  date_default_timezone_set('Europe/London');
  $time = date("Y-m-d H:i:s");
  $sql = "INSERT INTO messages(`user_id`, `message`, `room_id`, `time`) VALUES('$user_id', '$message', '$room_id', '$time')";
  $result = $con->query($sql);
  echo $con->error;
 ?>
