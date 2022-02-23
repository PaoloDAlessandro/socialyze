<?php
  //DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED


  include '../../../config.php';
  $user = $_POST['id_user'];
  $category = $_POST['category'];
  $sql = "SELECT COUNT(id) AS counter FROM badges WHERE id_user = '$user' AND category = '$category' GROUP BY lvl";
  $result = $con->query($sql);
  while($row = mysqli_fetch_assoc($result)){
    echo $row['counter'];
  };


  //DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED----DEPRECATED


 ?>
