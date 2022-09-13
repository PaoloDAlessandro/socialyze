<?php

    include '../../../config.php';
    session_start();
    if(!isset($_SESSION['username'])) {

      header('Location:/login/');
    
    } 
    
    else {
    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../index.css">
        <link rel="stylesheet" href="../index.css">
        <link rel="stylesheet" href="index.css">
        <link rel="shortcut icon" href="/logo/logo2.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/9d05a115fd.js" crossorigin="anonymous"></script>
        <title>Home</title>
      </head>
      <body>
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
            <?php $username = $_SESSION['username']; $sql = "SELECT `id` , `avatar_name` FROM `users` WHERE `username` = '$username'"; $result = $con->query($sql);if($result->num_rows != 0){$row = mysqli_fetch_assoc($result);$avatar = $row['avatar_name'];} ?>
            <a href="/account/"><img src="/avatar/<?php echo $avatar;?>" class="avatar" alt=""></a>  </div>
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
      
      <div class="page-focus">
        <div class="page-title">
          <h1>Propose a question</h1>
        </div>
        <div class="page-cta">
          <a href="">Getting started</a>
        </div>
        
      </div>
    </body>

<?php
}
?>