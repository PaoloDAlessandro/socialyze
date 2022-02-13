<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="/logo/logo2.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Home</title>
  </head>
  <body>
    <?php include '../../config.php';session_start();?>
    <header>
      <div class="logo">
        <img src="/logo/logo2.png" alt="logo">
      </div>
      <h2>socialyze</h2>
      <nav>
        <div class="navABorder">
          <a href="/index/">Home</a>
          <div class="navHoverEffect">
          </div>
        </div>
        <div class="navABorder">
          <a href="#">Rooms</a>
          <div class="navHoverEffect">
          </div>
        </div>
        <div class="navABorder">
          <a href="#">Contact</a>
          <div class="navHoverEffect">
          </div>
        </div>
        <?php if(isset($_SESSION['logged'])){?>
        <div class="navABorder">
          <div class="avatar-container">

            <a href="/account/info?id=<?php $username = $_SESSION['username']; $sql = "SELECT `id` , `avatar_name` FROM `users` WHERE `username` = '$username'"; $result = $con->query($sql);if($result->num_rows != 0){$row = mysqli_fetch_assoc($result); echo $row['id'];$avatar = $row['avatar_name'];} ?>"><img src="/avatar/<?php echo $avatar;?>" class="avatar" alt=""></a>
        </div>
        </div>
      <?php }else{?>
        <div class="navABorder">
          <a href="/login/">Login</a>
          <div class="navHoverEffect">
          </div>
        </div>
      <?php } ?>
      </nav>
    </header>
    <?php
      $sql = "SELECT username, email FROM users WHERE username = 'paolodalex'";
      $result = $con->query($sql);
      if($result->num_rows != 0){
        $row = mysqli_fetch_assoc($result);
      }
      else{
        echo $con->error;
        echo "Error. This username doesn't exist";
      }


     ?>

     <div class="title">
       <h2>Categories</h2>
     </div>

     <section id="categories">

       <div class="category-box">
         <a href="#">
         <i id="Politics-icon" class="fas fa-user-tie"></i>
         <p class="icon-text" id="Politics-text">Politics</p>
       </a>
       </div>
       <div class="category-box">
         <a href="#">
         <i id="Science-icon" class="fas fa-flask"></i>
         <p class="icon-text" id="Science-text">Science</p>
       </a>

       </div>
       <div class="category-box">
         <a href="#">
         <i id="Math-icon" class="fas fa-calculator"></i>
         <p class="icon-text" id="Math-text">Math</p>
       </a>

       </div>
       <div class="category-box">
         <a href="#">
         <i id="Gaming-icon" class="fas fa-gamepad"></i>
         <p class="icon-text" id="Gaming-text">Gaming</p>
       </a>
       </div>

       <div class="category-box">
         <a href="#">
           <i id="Marketing-icon" class="far fa-chart-bar"></i>
           <p class="icon-text" id="Marketing-text">Marketing</p>
         </a>
       </div>

       <div class="category-box">
         <a href="/account/badges/quiz/?category=coding">
         <i id="Coding-icon" class="fas fa-code"></i>
         <p class="icon-text" id="Coding-text">Coding</p>
       </a>
       </div>

       <div class="category-box">
         <a href="#">
         <i id="Communication-icon" class="fas fa-bullhorn"></i>
         <p class="icon-text" id="Communication-text">Communication</p>
       </a>
       </div>

       <div class="category-box">
         <a href="#">
           <i id="Personal_finance-icon" class="fas fa-piggy-bank"></i>
           <p class="icon-text" id="Personal_finance-text">Finance</p>
         </a>
       </div>

       <div class="category-box">
         <a href="#">
         <i id="Engineering-icon" class="fas fa-cogs"></i>
         <p class="icon-text" id="Engineering-text">Engineering</p>
       </a>
       </div>

       <div class="category-box">
         <a href="#">
         <i id="Chess-icon" class="fas fa-chess"></i>
         <p class="icon-text" id="Chess-text">Chess</p>
       </a>
       </div>
     </section>


  </body>
</html>
