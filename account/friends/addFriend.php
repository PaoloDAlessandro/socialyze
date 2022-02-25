<?php
  include '../../config.php';
  session_start();
  $username = $_SESSION['username'];
  $sql = "SELECT id FROM users WHERE username = '$username' LIMIT 1";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);
  $user_id_sender = $row['id'];
  $user_id_receiver = $_GET['user_id'];
  $sql = "SELECT id FROM friend_requests WHERE (id_user_sender = '$user_id_sender' AND id_user_receiver = '$user_id_receiver') OR (id_user_sender = '$user_id_receiver' AND id_user_receiver = '$user_id_sender')";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO friend_requests VALUES('', '$user_id_sender', '$user_id_receiver', NOW())";
    $result = $con->query($sql);
    if($result){
      echo "done";
    }
    else {
      echo "error";
    }
  }
  else {
    echo "error";
  }

?>
