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
            $sql = "SELECT avatar_name, id FROM users WHERE username = '$username'";
            $result = $con->query($sql);
            $row = mysqli_fetch_assoc($result);
            $avatar = $row['avatar_name'];
            $id_user = $row['id'];
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
      <?php
        $sql = "SELECT id_user_sender, id FROM friend_requests WHERE id_user_receiver = $id_user";
        $result = $con->query($sql);
        if (mysqli_num_rows($result) != 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $id_user_sender = $row['id_user_sender'];
            $sql = "SELECT * FROM users WHERE id = '$id_user_sender'";
            $sub_result = $con->query($sql);
            if(mysqli_num_rows($sub_result) != 0) {
              while($row = mysqli_fetch_assoc($sub_result)) {
                echo "<div class='friend-row'>
                  <div class='friend-info'>
                    <div class='friend-info-img'>
                      <img src='/avatar/{$row['avatar_name']}' alt=''>
                    </div>
                    <div class='friend-info-username'>
                      <h2>{$row['username']}</h2>
                    </div>
                  </div>

                  <div class='friend-interest'>
                    <p id='Coding'>coding</p>
                    <p id='Marketing'>Marketing</p>
                    <p id='Math'>Math</p>
                  </div>

                  <div class='friend-status'>

                    <a href = acceptRequest.php?id_request={$row['id']}>
                    <i class='fa-solid fa-check'></i>
                    </a>
                    <a href='discardRequest.php?id_request={$row['id']}'>
                      <i class='fa-solid fa-trash-can request'></i>
                    </a>
                  </div>
                </div>";
              }
            }
            else{
              echo "user doesn't exists";
            }
          }
        }
       ?>

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

      input_username.addEventListener('focus', function(){
        friends_result.style.display = 'block';
        input_username.style.borderBottomLeftRadius = '0';
        input_username.style.borderBottomRightRadius = '0';


        window.addEventListener('click', function(e){
        if (document.getElementById('friends-results').contains(e.target) || document.getElementById('input-username').contains(e.target)){

        }

        else{
          friends_result.style.display = 'none';
          input_username.style.borderBottomLeftRadius = '6px';
          input_username.style.borderBottomRightRadius = '6px';
        }
        });
      });

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
            friends_result.insertAdjacentHTML('beforeend', "<div class = 'friend-single-result' id = " + users[x][0] + "><div class = 'friend-single-result-center'><div class = 'friend-single-result-img'><img src = '/avatar/" + users[x][1] + "' alt = ''></div> <div class = 'friend-single-result-username'><p>" + users[x][0] + "</p></div><div class = 'friend-single-result-link'><div class = 'friend-single-result-link-inner'><a href = '#' onclick = 'sendFriendRequest(this," + users[x][2] +");'>add friend</a></div></div></div></div>");

          }
        }
        for(let x = 1; x < users.length; x++){
          usersArray.push(users[x][0]);
        }
      }

      function removeUserToList(users) {
        let usersList = document.getElementsByClassName('friend-single-result');
        var userListId = [''];
        for (let i = 1; i < usersList.length; i++) {
          if (!userListId.includes(usersList[i]).id) {
            userListId.push(usersList[i].id);
          }
        }

        var check = 0;
        console.log(userListId);
        for(let y = 1; y < userListId.length; y++){
          for(let x = 1; x < users.length; x++){
            console.log(userListId[y]);
            console.log(users[x][0]);
            if(users[x][0] === userListId[y]){
              check = 1;
              console.log(check);
            }
          }
          if (check == 0){
            document.getElementById(userListId[y]).remove();
          }
        }
      }

      function sendFriendRequest(button, user_id) {
        $.ajax({
          type: 'GET',
          url: 'addFriend.php',
          data: {user_id: user_id},
          success: function(content){
            if (content == 'done') {
              button.innerHTML = 'request send';
              button.style.backgroundColor = '#1E8E3E';
            }

            if (content == 'error') {
              button.innerHTML = 'pending';
              button.style.backgroundColor = '#d62828';
            }
          }
        })
      }






    </script>

  </body>
</html>
