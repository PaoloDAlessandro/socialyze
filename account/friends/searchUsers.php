<?php
  include '../../config.php';
  session_start();
  $username = $_GET['username'];
  $sql = "SELECT username, avatar_name, id FROM users WHERE username like '$username%'";
  $result = $con->query($sql);
  $array[] = array();
  while($row = mysqli_fetch_assoc($result)){
      array_push($array,array($row['username'], $row['avatar_name'], $row['id']));
  }
  
  echo json_encode($array);

?>
