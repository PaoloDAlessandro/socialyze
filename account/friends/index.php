<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/index.css">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="/logo/logo2.ico">
    <script src="https://kit.fontawesome.com/9d05a115fd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Home</title>
  </head>
  <body>
    <?php include '../../config.php'; include '../checkLogin.php';?>
    <header>
      <div class="logo">
        <img src="/logo/logo2.png" alt="logo">
      </div>
      <h2>socialyze</h2>
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

    <div class="search-box">
      <input type="text" name="" id="input-username" value="" placeholder="Inserisci l'username" oninput="search(this)">
      <div class="friends-result" id="friends-results">

      </div>
    </div>

    <div class="friends-container">
      <div class="friend-row">
        <div class="friend-info">
          <div class="friend-info-img">
            <img src="/avatar/default.png" alt="">
          </div>
          <div class="friend-info-username">
            <h2>Paolo D'Alessandro</h2>
          </div>
        </div>

        <div class="friend-interest">
          <p id="Coding">coding</p>
          <p id="Marketing">Marketing</p>
          <p id="Math">Math</p>
        </div>

        <div class="friend-status">
          <div class="status-circle">
          </div>
          <p>Online</p>
          <a href="#">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </div>
      </div>

      <div class="friend-row">
        <div class="friend-info">
          <div class="friend-info-img">
            <img src="/avatar/default.png" alt="">
          </div>
          <div class="friend-info-username">
            <h2>Paolo D'Alessandro</h2>
          </div>
        </div>

        <div class="friend-interest">
          <p id="Coding">coding</p>
          <p id="Marketing">Marketing</p>
          <p id="Math">Math</p>
        </div>

        <div class="friend-status">
          <div class="status-circle">
          </div>
          <p>Online</p>
          <a href="#">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </div>
      </div>

      <div class="friend-row">
        <div class="friend-info">
          <div class="friend-info-img">
            <img src="/avatar/default.png" alt="">
          </div>
          <div class="friend-info-username">
            <h2>Paolo D'Alessandro</h2>
          </div>
        </div>

        <div class="friend-interest">
          <p id="Coding">coding</p>
          <p id="Marketing">Marketing</p>
          <p id="Math">Math</p>
        </div>

        <div class="friend-status">
          <div class="status-circle">
          </div>
          <p>Online</p>
          <a href="#">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </div>
      </div>

      <div class="friend-row">
        <div class="friend-info">
          <div class="friend-info-img">
            <img src="/avatar/default.png" alt="">
          </div>
          <div class="friend-info-username">
            <h2>Paolo D'Alessandro</h2>
          </div>
        </div>

        <div class="friend-interest">
          <p id="Coding">coding</p>
          <p id="Marketing">Marketing</p>
          <p id="Math">Math</p>
        </div>

        <div class="friend-status">
          <div class="status-circle">
          </div>
          <p>Online</p>
          <a href="#">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </div>
      </div>

      <div class="friend-row">
        <div class="friend-info">
          <div class="friend-info-img">
            <img src="/avatar/default.png" alt="">
          </div>
          <div class="friend-info-username">
            <h2>Paolo D'Alessandro</h2>
          </div>
        </div>

        <div class="friend-interest">
          <p id="Coding">coding</p>
          <p id="Marketing">Marketing</p>
          <p id="Math">Math</p>
        </div>

        <div class="friend-status">
          <div class="status-circle">
          </div>
          <p>Online</p>
          <a href="#">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </div>
      </div>

    </div>

    <script>

      var c = 0;
      const friends_result = document.getElementById('friends-results');
      const input_username = document.getElementById('input-username');
      var usersArray = [];
      function search(input) {
        if (input.value == ""){

        }

        else {

        $.ajax({
          type: 'GET',
          url: 'searchUsers.php',
          data: {username: input.value},
          success: function(content){
            var result = JSON.parse(content);
            console.log(result);
              addUserToList(result);
              removeUserToList(result);
          }
        })
      }
      }

      function addUserToList(users) {
        let usersList = document.getElementsByClassName('user_research');
        let check = 0;


        for(let x = 1; x < users.length; x++){
          if (!usersArray.includes(users[x][0])) {
            friends_result.insertAdjacentHTML('beforeend', "<p class = 'user_research' id = '" + users[x][0] +"'>" + users[x][0] +"</p>");

          }
        }
        console.log(usersArray);
        for(let x = 1; x < users.length; x++){
          usersArray.push(users[x][0]);
        }
      }

      function removeUserToList(users) {
        let usersList = document.getElementsByClassName('user_research');
        let check = 0;

        for (let x = 0; x < usersArray.length; x++) {
          check = 0
          for (let y = 1; y < users.length; y++) {
            if(usersArray[x] == users[y][0]){
              check = 1;
            }
          }
          if (check == 0){
            document.getElementById(usersArray[x]).remove();
            usersArray.indexOf(x);
          }
        }
      }



    </script>

  </body>
</html>
