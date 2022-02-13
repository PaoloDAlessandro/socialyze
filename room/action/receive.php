<?php
  include "../../config.php";
  $user_id = $_POST['user'];
  $room_id = $_POST['room'];
  $time = $_POST['time'];
  //echo $time;
  $sql = "SELECT user_id, message FROM messages WHERE room_id = '$room_id' AND `time` > '$time'";
  $result = $con->query($sql);
  $array[] = array();
  while($row = mysqli_fetch_assoc($result)){
        $array["user"] = $row['user_id'];
        $array["message"] = $row['message'];
  }
    echo json_encode($array);
 ?>
