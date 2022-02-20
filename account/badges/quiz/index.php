<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../index.css">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="/logo/logo2.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Home</title>
  </head>
  <body>
    <?php include '../../../config.php';session_start();?>
    <header>
      <div class="logo">
        <img src="/logo/logo2.png" alt="logo">
      </div>
      <h2>socialyze</h2>
      <nav>
        <div class="navABorder">
          <a href="/index.php">Home</a>
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

    <section class="quiz-container">

      <div class="quiz-material" id="quiz-material">
        <div class="question">
          <div class="question-center">
            <h2 id="question">Come ti chiami?</h2>

          </div>
        </div>
        <div class="answers">
          <ul>
            <li id="a" onclick="test(this)"><input type="radio" id="answer0-radio" class="radio-btn" name="" value="0" onclick="checkRadio(this)">Risposta 1</li>
            <li id="b" onclick="test(this)"><input type="radio" id="answer1-radio" class="radio-btn" name="" value="1" onclick="checkRadio(this)">Risposta 1</li>
            <li id="c" onclick="test(this)"><input type="radio" id="answer2-radio" class="radio-btn" name="" value="2" onclick="checkRadio(this)">Risposta 1</li>
            <li id="d" onclick="test(this)"><input type="radio" id="answer3-radio" class="radio-btn" name="" value="3" onclick="checkRadio(this)">Risposta 1</li>
            <li id="e" onclick="test(this)"><input type="radio" id="answer4-radio" class="radio-btn" name="" value="4" onclick="checkRadio(this)">Risposta 1</li>
          </ul>
        </div>
      </div>


      <div class="intro-text" id="intro-text">
        <h2 id="intro">Benvenuto</h2>
      </div>

      <div class="fixed-next">
        <p id="next" class="next-text">Next</p>
      </div>

      <div class="fixed-timer">
        <p id="timer">2:00</p>
      </div>

      <div class="fixed">
        <p id="skip" class="skip-text">Skip</p>
      </div>
    </section>


    <script type="text/javascript">

    /*
    function checkAttempts() {
      $.ajax({
        type: 'POST',
        url: 'checkAttempts.php',
        data: {user: '<?php echo $username;?>', category: category},
        success: function(data){
        }
      });
    }
    */


      <?php
        $sql = "SELECT id FROM users WHERE username = '$username'";
        $result = $con->query($sql);
        $row = mysqli_fetch_assoc($result);
        $id_user = $row['id'];
        $sql = "SELECT count(id) as count FROM scoring WHERE id_user = '$id_user'";
        $result = $con->query($sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
       ?>

      const query = window.location.search;
      const urlParams = new URLSearchParams(query);
      const category = urlParams.get('category');
      quiz_material = document.getElementById('quiz-material');
      quiz_material.style.display = 'none';
      t1 = document.getElementById('intro');
      var options = document.getElementsByClassName('radio-btn');
      var intro_outro_text_div = document.getElementById('intro-text');
      next_btn = document.getElementById('next');
      timer = document.getElementById('timer');
      skip = document.getElementById('skip');
      const attempts = <?php echo $count; ?>
      //checkAttempts();
      if (attempts <= 1) {
      window.addEventListener('DOMContentLoaded', (event) => {
        t1.style.animation = 'fade-in 1s forwards';
        setTimeout(function() {
          t1.style.animation = 'fade-out 1s forwards';
        }, 1500)
        setTimeout(function() {
          t1.innerHTML = 'Il test iniziera a breve';
          t1.style.animation = 'fade-in 1s forwards';
        }, 3000)

        setTimeout(function() {
          t1.style.animation = 'fade-out 1s forwards';
        }, 4500)

        setTimeout(function() {
          t1.innerHTML = 'Dovrai rispondere a 15 domande';
          t1.style.animation = 'fade-in 1s forwards';
        }, 6000)

        setTimeout(function() {
          t1.style.animation = 'fade-out 1s forwards';
        }, 7500)

        setTimeout(function() {
          t1.innerHTML = 'Se risponderai correttamente al 80% delle domande il badge sará tuo';
          t1.style.animation = 'fade-in 1s forwards';
        }, 9000)

        setTimeout(function() {
          t1.style.animation = 'fade-out 1s forwards';
        }, 11500)

        setTimeout(function() {
          t1.innerHTML = 'Buona fortuna';
          t1.style.animation = 'fade-in 1s forwards';
        }, 13000)

        setTimeout(function() {
          t1.style.animation = 'fade-out 1s forwards';
        }, 14500)

        setTimeout(function() {
          t1.innerHTML = '3';
          t1.style.animation = 'fade-in-zoom 1s forwards';
        }, 16000)

        setTimeout(function() {
          t1.style.animation = 'fade-out-zoom 1s forwards';
        }, 17000)

        setTimeout(function() {
          t1.innerHTML = '2';
          t1.style.animation = 'fade-in-zoom 1s forwards';
        }, 18000)

        setTimeout(function() {
          t1.style.animation = 'fade-out-zoom 1s forwards';
        }, 19000)

        setTimeout(function() {
          t1.innerHTML = '1';
          t1.style.animation = 'fade-in-zoom 1s forwards';
        }, 20000)

        setTimeout(function() {
          t1.style.animation = 'fade-out-zoom 1s forwards';
        }, 21000)

        var start = 0;
        skip.addEventListener('click', function(){
          start = 1;
          quizStart();
        });
      setTimeout(function(){
        if (start == 0){
          quizStart();
        }
      }, 22000);
      });

      function quizStart() {
        var x = 0;
        var y = 0;
        t1.remove();
        skip.remove();
        quiz_material.style.display = 'block';
        next_btn.style.display = 'block';
        timer.style.display = 'block';
        quiz_material.style.animation = 'fade-in 1s';
        var answers = [];
        var solutions = [2, 2, 3, 4];
        var answers_id = ['a', 'b', 'c', 'd', 'e'];
        var question = document.getElementById('question');
        var possibile_solutions = {
          coding: [['Ruby', 'Python', 'Java', 'Javascript', 'PHP'], ['var num = input("Inserisci un numero: ")', 'int num = int(input("Inserisci un numero: "));', 'num = int(input("Inserisci un numero: "))', 'num = input("Inserisci un numero: ")', 'num = int(input("Inserisci un numero: "));'], ['Binary', 'Quickselect', 'DFS', 'Selection', 'KMP'], ['Tuple', 'List', 'Tree', 'Associative Array', 'Float']]
        }
        var questions = {
          coding: ['quale tra questi é un linguaggio compilato?', 'Come si richiede un valore intero in input in Python?', 'Quale di questi é un algoritmo di ordinamento?', 'quali di questi é un tipo di dato?']
        };

        question.innerHTML = questions[category][0]
        for (var i = 0; i < possibile_solutions[category][0].length; i++) {
          //console.log(possibile_solutions[y][i]);
          document.getElementById(answers_id[i]).innerHTML = '<input type="radio" id="answer' + i +'-radio" class="radio-btn" name="" value="' + i +'" onclick="checkRadio(this)">' + possibile_solutions[category][y][i];
        }

        var time = 120;
        var min = timer.innerHTML.slice(0,1);
        var sec = timer.innerHTML.slice(2,4);
        var interval = setInterval(function(){
          if (min == 0 && sec == 0){
            blockQuestion(options);
            timer.innerHTML = '00:00';
            clearInterval(interval);
            return;
          }

          if (sec == 0) {
            sec = 60;
            min = min - 1;
          }
          sec = sec - 1;
          //
          if (sec < 10){
            timer.innerHTML = '0' + min + ':0' + sec;
          }
          else {
            timer.innerHTML = '0' + min + ':' + sec;
          }

        }, 1000);

        next_btn.addEventListener('click', function(){
          clearInterval(interval);
          timer.innerHTML = '2:00';
          var time = 120;
          var min = timer.innerHTML.slice(0,1);
          var sec = timer.innerHTML.slice(2,4);
          x++;
          y++;
          console.log(x);
          //console.log(min);
          //console.log(sec);
          interval = setInterval(function(){

            if (min == 0 && sec == 0){
              blockQuestion(options);
              timer.innerHTML = '00:00';
              clearInterval(interval);
              return;
            }
            if (sec == 0 || sec == 00) {
              sec = 60;
              min = min - 1;
            }
            sec = sec - 1;

            if (sec < 10){
              timer.innerHTML = '0' + min + ':0' + sec;
            }

            else {
              timer.innerHTML = '0' + min + ':' + sec;
            }

          }, 1000);

          if (x == 3){
            next_btn.innerHTML = 'Finish';
          }

          for (var i = 0; i < options.length; i++) {
            if(options[i].disabled == true){
              answers.push(9);
              break;
            }
            if (options[i].checked == 1){
              answers.push(options[i].value);
              console.log(answers);
              //console.log(options[i].value);
              break;
            }
          }

          if (x == 4){
            clearInterval(interval);
            checkTest(answers, solutions);
            return;
          }

          question.innerHTML = questions[category][x];
          for (var i = 0; i < possibile_solutions[category][y].length; i++) {
            //console.log(possibile_solutions[y][i]);
            document.getElementById(answers_id[i]).innerHTML = '<input type="radio" id="answer' + i +'-radio" class="radio-btn" name="" value="' + i +'" onclick="checkRadio(this)">' + possibile_solutions[category][y][i];
          }
        });
      }

      var otherOptions = document.getElementsByClassName('radio-btn');
      function checkRadio(radio){
        for (var i = 0; i < otherOptions.length; i++){
          if (otherOptions[i].id == radio.id) {

          }
          else {
            if (otherOptions[i].checked = 1){
              otherOptions[i].checked = 0;
            }
          }
        }
      }

      function test(li) {
        switch (li.id) {
          case 'a':
            options[0].checked = 1;
            checkRadio(options[0]);
            break;
          case 'b':
            options[1].checked = 1;
            checkRadio(options[1]);
            break;
          case 'c':
            options[2].checked = 1;
            checkRadio(options[2]);
            break;
          case 'd':
            options[3].checked = 1;
            checkRadio(options[3]);
            break;
          case 'e':
            options[4].checked = 1;
            checkRadio(options[4]);
            break;
        }
      }

      function blockQuestion(options) {
        for(var i = 0; i < options.length; i++) {
          options[i].disabled = true;
        }
        return;
      }

      function checkTest(answers, solutions) {
        var score = 0;
        console.log(answers);
        console.log(solutions);
        for (var i = 0; i < answers.length; i++) {
          if (answers[i] == solutions[i]) {
            score++;
          }
        }
        console.log(score);
        const result = score;
        console.log(result);
        $.ajax({
          type: 'POST',
          url: 'send.php',
          data: {score: result, category: category},
          success: function(data){
            if(data == 1){
              close(result);
            }
          }
        })
      }

      function close(result) {
        const outcome = document.createElement('H2');
        const t2 = document.createElement('H2');
        const end_btn = document.createElement('A');
        let ratio = parseInt((result / 4) * 100);
        if (ratio >= 80){
          outcome.innerHTML = "Hai superato il test!";
          t2.innerHTML = "Rispondendo correttamente all'" + ratio + '% delle domande';
          outcome.id = 'outro_text_no_margin';
          end_btn.innerHTML = "Quit";
          end_btn.href = "/account/badges/";
          end_btn.id = "exit_btn";
          quiz_material.remove();
          next_btn.remove();
          timer.remove();
          intro_outro_text_div.appendChild(outcome);
          intro_outro_text_div.appendChild(t2);
          intro_outro_text_div.appendChild(end_btn);
      }
      else {
        outcome.innerHTML = "Non hai superato il test :(";
        t2.innerHTML = "Hai risposto correttamente all'" + ratio + '% delle domande';
        outcome.id = 'outro_text_no_margin';
        end_btn.innerHTML = "Quit";
        end_btn.href = "/account/badges/";
        end_btn.id = "exit_btn";
        quiz_material.remove();
        next_btn.remove();
        timer.remove();
        intro_outro_text_div.appendChild(outcome);
        intro_outro_text_div.appendChild(t2);
        intro_outro_text_div.appendChild(end_btn);
      }
      }
    }
    else {
      t1.innerHTML = "Hai superato il numero massimo di tentativi per questo quiz";
      const end_btn = document.createElement('A');
      end_btn.innerHTML = "Quit";
      end_btn.href = "/account/badges/";
      end_btn.id = "exit_btn";
      skip.remove();
      intro_outro_text_div.appendChild(end_btn);

    }


    </script>

  </body>
</html>
