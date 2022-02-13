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

          <a href="/account/info?id=<?php $username = $_SESSION['username']; $sql = "SELECT `id` FROM `users` WHERE `username` = '$username'"; $result = $con->query($sql);if($result->num_rows != 0){$row = mysqli_fetch_assoc($result); echo $row['id'];} ?>"><img src="/avatar/paolodalex.jpeg" class="avatar" alt=""></a>
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
      <div class="account-title">
        <h2>My info</h2>
      </div>
      <div class="info-container">
        <div class="info-box" id="username">
          <div class="center-div">
            <p id="usernameP"><?php echo $row['username']; ?></p>
          </div>
        </div>

        <div class="info-box">
          <div class="center-div">
            <p><?php echo $row['email']; ?></p>

          </div>

        </div>
      </div>
      <div class="info-container">
        <div class="info-box" id="username">
        </div>
        <div class="info-box">
          <form class="" action="uploadAvatar.php" method="post" enctype="multipart/form-data">
            <input type="file" id="avatar" name="avatar" onchange="form.submit()">
            <div class="center-div">
              <label for="avatar" id="avatar-label" class="input-label" onclick="changeLabelText()"><i class="fas fa-upload"></i> Upload avatar</label>
            </div>
          </form>
        </div>
        <div class="info-box">
        </div>
      </div>
    </section>
    <script type="text/javascript">
      function changeLabelText() {
        document.getElementById('avatar-label').innerHTML = "<i class='fas fa-upload'></i> Uploading...";
      }
    </script>
  </body>
</html>
