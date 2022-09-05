<?php

  error_reporting(E_ERROR | E_PARSE);
  include "../config.php";
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location:/login/');
  }
  else {

  $username = $_SESSION['username'];
  $sql = "SELECT id FROM users WHERE username = '$username'";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);
  $user_id = $row['id'];
  $room_id = $_GET['id'];
  $sql = "SELECT * FROM rooms WHERE id = '$room_id'";
  $result = $con->query($sql);
  $sql2 = "SELECT COUNT(id) as active_user FROM users_in_room WHERE id_room = '$room_id'";
  $result2 = $con->query($sql2);
  while($row = mysqli_fetch_assoc($result)){
    $row2 = mysqli_fetch_assoc($result2);
    $sql = "SELECT id FROM users_in_room WHERE id_user = '$user_id' AND id_room = '$room_id'";
    $result5 = $con->query($sql);
    if($result5->num_rows == 0){
      if($row['size'] - $row2['active_user'] > 0){
        $sql = "INSERT INTO users_in_room (`id_user`, `id_room`) VALUES('$user_id', '$room_id')";
        $result3 = $con->query($sql);
        echo $con->error;
        $category = $row['category'];
        $sql = "SELECT lvl FROM `badges` WHERE id_user = '$user_id' AND category = '$category'";
        $result = $con->query($sql);
        $row = mysqli_fetch_assoc($result);
        if ($row['lvl'] != 1){
          header("Location:https://socialyze.sa-projects.it/account/badges/quiz/?category=.$category.");
        
      }
    }
    else {
      //echo "This user has already joined this room";
    }
  }
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../index.css">
     <link rel="stylesheet" href="index.css">
     <link rel="shortcut icon" href="/logo/logo2.ico">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <title>Home</title>
   </head>
   <body>
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

     <?php
        $sql = "SELECT category FROM rooms WHERE id = '$room_id'";
        $result = $con->query($sql);
        $row = mysqli_fetch_assoc($result);
      ?>

     <div class="container">
       <div class="chat" id="chat">
         <div class="chat-header">
           <div class="chat-title">
             <img src="/categories/<?php echo strtolower($row['category']) ?>.jpg" alt="">
             <h2><?php echo $row['category'] ?></h2>
           </div>
         </div>
         <div class="chat-content" id="chat-content">

         </div>
         <div class="chat-footer">
           <div class="center-input">

           <div class="input-box">
             <input type="text" id="message" name="message" value="" placeholder="Scrivi un messaggio...">
             <button type="button" name="button" class="message-button"><i class="fas fa-paper-plane"></i></button>
         </div>
       </div>
         </div>
       </div>
       <div class="online-user">
         <div class="online-user-header">
           <div class="online-user-header-title">
             <h2><i class="fas fa-circle"></i> &nbsp;	&nbsp;	Online user</h2>
           </div>
           <div class="online-user-box">

           </div>
         </div>
       </div>
     </div>

     <script>
     var room_id = "<?php echo $room_id; ?>";
     var user_id = <?php echo $user_id; ?>;


     console.log(room_id);
     $(window).on("beforeunload", function() {
        $.ajax({
           type: "POST",
           url: 'quitroom.php',
           data: {room: room_id, user: user_id},
           success: function(content){
             console.log(content);
           }
        })
      })

      function onlineUser() {
        $.ajax({
          type: 'POST',
          url: 'action/onlineUser.php',
          data: {room: room_id},
          success: function(content){
            var result = JSON.parse(content);
            checkOnlineUser(result);
          }
        })
      }


      function getUserInfo(user_id) {
        $.ajax({
          type: 'POST',
          url: 'action/getUserInfo.php',
          data: {user_id: user_id},
          success: function(content){
            var result = JSON.parse(content);
            return result;
          }
        })
      }


      function send() {
        var message = document.getElementById('message').value;
        $.ajax({
          type: "POST",
          url: 'action/send.php',
          data: {user: user_id, message: message, room: room_id},
          success: function(content){
          }
        })
      }

      var d = new Date().toISOString().slice(0, 19).replace('T', ' ');
      var messages = {'user':[], 'messages': []};
      function receive () {
        $.ajax({
          type: "POST",
          url: 'action/receive.php',
          data: {user: user_id, room: room_id, time: d},
          success: function(response){
  //          try {
              var result = JSON.parse(response);
              var check = 0;
              for(var i = 0; i < messages['messages'].length; i++){
                if(messages['messages'][i] == result['message'] && messages['user'][i] == result['user']){
                  check = 1
                }
              }
              if(result['message'] == undefined) check = 1;
              if(check == 0){
                messages['user'].push(result['user']);
                messages['messages'].push(result['message']);
                displayIncomingMessage(result['message'], result['user']);
            }
//            } catch (e){}

          }
        })
      }

      function checkOnlineUser(onlineUser){
        let usersInfo = [];
        for(var i = 1; i < onlineUser.length; i++){
          console.log(getUserInfo(onlineUser[i]));
        }
      }

      setInterval(receive, 300);
      function displayIncomingMessage(message, type){
        const para = document.createElement("p");
        const node = document.createTextNode(message);
        const br = document.createElement('br');
        const divMessage = document.createElement("div");
        divMessage.setAttribute('class', 'message-box');
        if(type == user_id) {
          para.setAttribute('id', 'MyMessage');
        }
        else {
          para.setAttribute('id', 'OtherMessage');
        }
        para.appendChild(node);
        const element = document.getElementById("chat-content");
        element.appendChild(para);
        element.appendChild(br);

      }

      document.getElementById("message").addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
          send();
          document.getElementById('message').value = '';
          return false;
        }
      });

     </script>

   </body>
 </html>
