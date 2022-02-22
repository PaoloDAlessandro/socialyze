<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="/logo/logo2.ico">
    <script src="https://kit.fontawesome.com/9d05a115fd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Home</title>
  </head>
  <body>
    <?php include '../config.php';session_start();?>
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

    <section class="center">
      <a href="/account/info/">
      <div class="box" id="personal-info">
        <div class="alignVO">
          <div class="col-30">
            <i class="far fa-id-badge"></i>
          </div>
          <div class="col-70">
            <h4>Personal info</h4>
          </div>
        </div>
      </div>
    </a>

    <a href="/account/badges/">
    <div class="box">
      <div class="alignVO">
        <div class="col-30">
          <i class="fa-solid fa-medal"></i>
        </div>
        <div class="col-70">
          <h4>&nbsp;	 Badges</h4>
        </div>
      </div>
    </div>
  </a>

    <a href="/account/friends/">
      <div class="box">
        <div class="alignVO">
          <div class="col-30">
            <i class="fa-solid fa-user-group"></i>
          </div>
          <div class="col-70">
            <h4>&nbsp;	 Friends</h4>
          </div>
        </div>
      </div>
    </a>

      <a href="/account/log-out/">
      <div class="box">
        <div class="alignVO">
          <div class="col-30">
            <i class="fas fa-sign-out-alt"></i>
          </div>
          <div class="col-70">
            <h4>&nbsp;	 Log-out</h4>
          </div>
        </div>
      </div>
    </a>
    </section>
  </body>
</html>
