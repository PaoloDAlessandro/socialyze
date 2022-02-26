<?php
  include "../../config.php";
  session_start();
  $id_request = $_GET['id_request'];
  $sql = "UPDATE `friend_requests` SET status = -1 WHERE id = '$id_request'";
  $result = $con->query($sql);
  echo $con->error;
  if ($result) {
    echo "done";
  }

  else {
    echo "error";
  }


?>
