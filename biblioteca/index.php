<?php
  include "config.php";
  $sql = "SELECT * FROM utente";
  $result = $con->query($sql);
  while($row = mysqli_fetch_assoc($result)){
    echo $row['nome'];
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <script src="https://kit.fontawesome.com/9d05a115fd.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="index.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <title>Home</title>
   </head>
   <body>
     <div class="container">
         <div class="box">
           <a href="#">
          <div class="text">
            <i class="fa-regular fa-user"></i>
            <p>user</p>
          </div>
        </a>
         </div>

         <div class="box">
           <a href="#">
          <div class="text">
<i class="fa-solid fa-screwdriver-wrench"></i>            <p>admin</p>
          </div>
        </a>
         </div>
       </div>


   </body>
 </html>
