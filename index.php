<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="/logo/logo2.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Home</title>
  </head>
  <body>
    <?php include 'config.php';session_start();?>
    <header>
      <div class="logo">
        <img src="/logo/logo2.png" alt="logo">
      </div>
      <h2>socialyze</h2>
      <div class="center-search-box">
        <div class="header-box1">
          <input type="text" id="search-input" name="" value="" placeholder="Search room.." oninput="input()">
        </div>
        <div class="header-box2">
          <i class="fas fa-search"></i>
        </div>
      </div>
      <nav>
        <div class="navABorder">
          <a href="#">Home</a>
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
          <?php $username = $_SESSION['username'];
            $sql = "SELECT avatar_name FROM users WHERE username = '$username'";
            $result = $con->query($sql);
            $row = mysqli_fetch_assoc($result);
            $avatar = $row['avatar_name'];
           ?>
          <a href="/account/"><img src="/avatar/<?php echo $avatar;?>" class="avatar" alt=""></a>
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

    <section class="main">
      <div class="background-loader" id="loader">
        <div class="lds-facebook"><div></div><div></div><div></div></div>
      </div>

      <?php
        $sql = "SELECT * FROM rooms";
        $result = $con->query($sql);
        $c = 0;
        echo "<div class = 'card-row'>";
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $sql2 = "SELECT COUNT(id) as active_users FROM users_in_room WHERE id_room = '$id'";
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $lvl_icon = "";
            switch ($row['level']) {
              case 1:
                $lvl_icon = "bronze.png";
                break;
              case 2:
                $lvl_icon = "silver.png";
                break;
              case 3:
                $lvl_icon = "gold.png";
                break;
            }
            echo "
              <div class = 'card' id = '{$row['category']}'>
                <div class = 'card-img'>

                  <img src = '/categories/{$row['img_name']}'>
                  </div>
                  <div class = 'icon'>
                    <p id = '{$row['category']}'><i class = '{$row['icon_name']}'></i></p>
                  </div>
                  <div class = 'card-text'>
                    <div class = 'card-title'>
                      <h2>{$row['category']}</h2>
                    </div>
                    <div class = 'card-room-size'>
                      <p><i class = 'fas fa-user-friends'></i> 2-{$row['size']}</p>
                      </div>
                    </div>
                    <div class = 'card-bottom'>
                      <div class = 'card-button'>
                        <a href = '#' id= '{$row['id']}' onclick = 'checkBadge(this)'>Join</a>
                      </div>
                      <div class = 'card-room-status'>";
                      if($row['size'] - $row2['active_users'] == $row['size']){
                        echo "<p><i class = 'far fa-clock'></i> avaible</p>";
                      }
                      else if($row['size'] - $row2['active_users'] != 0){
                        $seats_avaible = $row['size'] - $row2['active_users'];
                        echo "<p id = 'almostfull'><i class = 'far fa-clock'></i> {$seats_avaible} seat left</p>";
                      }
                      else {
                        echo "<p id = 'full'><i class = 'far fa-clock'></i> Room full</p>";
                      }
                      echo "
                      </div>
                    </div>
                    </div>";

                    $c++;
                    if ($c == 4){
                      $c = 0;
                      echo "</div>";
                      echo "<div class = 'card-row'>";

                    }
        }
       ?>
    </section>

    <div class="background-blur" id="back_pop" onclick="popupExit(this)">
      <div class="exit">
        <p id="exit_btn">X</p>
      </div>
      <div class="popup">
        <p id="popupWarning">Devi possedere un badge di livello 3 per accedere a questa stanza</p>
        <p id="popupMyLvl">il tuo badge:</p>
        <div class="gotoQuizDiv">
          <a href="#" id="gotoQuiz">Vai al quiz</a>
        </div>
      </div>
    </div>



    <script type="text/javascript">
    const loader = document.getElementById('loader');
    window.addEventListener('load', (event) => {
      loader.style.display = "none";
    });

    <?php
      error_reporting(E_ERROR | E_PARSE);
      $sql = "SELECT id FROM users WHERE username = '$username'";
      $result = $con->query($sql);
      $row = mysqli_fetch_assoc($result);
     ?>

    const exit_btn = document.getElementById('exit_btn');
    const popup = document.getElementById('back_pop');
    const popupWarning = document.getElementById('popupWarning');
    const popupMyLvl = document.getElementById('popupMyLvl');
    const quizLink = document.getElementById('gotoQuiz');
    const user_id = "<?php echo $row['id']; ?>";
    popup.style.display = "none";

    function checkBadge(link){
      var roomId = link.id;
      var category
      $.ajax({
        type: 'GET',
        url: 'checkBadge.php',
        data: {roomId: roomId, userId: user_id},
        success: function(data){
          var array = JSON.parse(data);
          console.log(array);
          console.log(array[1]);
          if (array[0] == array[1]){
            window.location.href = "/room/?id=" + roomId;
          }
          else if (array[1] == 404) {
            window.location.href = "/login/";
            console.log('ciao');

          }

          else {
            popup.style.display = 'block';
            popupWarning.innerHTML = 'Devi possedere un badge di livello 3 per accedere a questa stanza';
            popupMyLvl.innerHTML = "il tuo badge: ";
            quizLink.href = "/account/badges/quiz/?category=" + array[2];
        }
      }
    });
  }



      var boxs = document.getElementsByClassName('card');
      function input(){
        var input = document.getElementById('search-input').value;
        for (var i = 0; i < boxs.length; i++) {
          if (!boxs[i].id.toLowerCase().includes(input.toLowerCase())){
              boxs[i].style.display = 'none';
          }
          else {
            boxs[i].style.display = 'block';
          }
          if (input == ""){
            boxs[i].style.display = 'block';
          }
      }
    }

    exit_btn.addEventListener('click', function(){
      popup.style.display = 'none';
      window.onscroll=function(){};

    });

    function popupExit(popup){
      popup.style.display = "none";
      window.onscroll=function(){};

    }
    </script>
  </body>
</html>
