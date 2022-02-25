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
      function search(input) {
        $.ajax({
          type: 'GET',
          url: 'searchUsers.php',
          data: {username: input.value},
          success: function(content){
            var result = JSON.parse(content);
            for (let i = 1; i < result.length; i++) {
              addUserToList(result[i][1], result[i][0]);
              removeUserToList(result);
            }
          }
        })
      }

      async function addUserToList(avatar, username) {
        let usersList = document.getElementsByClassName('user_research');
        let check = 0;
        for (var i = 0; i < usersList.length; i++){
          if(usersList[i].id == username) {
            check = check + 1;
          }
        }
        if (check == 0) {
          friends_result.insertAdjacentHTML('beforeend', "<p class = 'user_research' id = '" + username +"'>" + username +"</p>");
        }

      }

      async function removeUserToList(users) {
        let usersList = document.getElementsByClassName('user_research');
        let checker = 0;
        let position = 0;
        if (input_username.value == "") {
          let x = 0;
          while(usersList.length >= 0) {
            usersList[x].remove();
            x++;
          }
        }

        else {
          for (let x = 0; x < users.length; x++) {
            for(let y = 0; y < usersList.length; y++) {
              if (users[x][1] == usersList[y]){
                console.log(users[x][1]);
                console.log(usersList[y]);
              }
            }
          }
        }
      }

    </script>

  </body>
</html>
