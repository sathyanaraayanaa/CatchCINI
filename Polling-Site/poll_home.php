<?php
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "catchcini";
    $con = mysqli_connect($server, $user, $pass, $db);
    if (!$con) {
        echo '<script> alert("Server Down!!! Try again Later"); </script>';
    }

    $cmd = "SELECT COUNT(*) FROM polls";
    $data = mysqli_query($con, $cmd);
    $total_polls = mysqli_fetch_row($data)[0];
    if($total_polls>4){
      $max_limit = 4;
    } else {
      $max_limit = $total_polls;
    }
    $cmd = "SELECT question,total_count FROM polls ORDER BY total_count DESC";
    $data = mysqli_query($con, $cmd);
    $i = 1;
    if($data) {
      while(($row = mysqli_fetch_assoc($data)) && $i<=$max_limit){
          $question[$i-1] = $row["question"];
          $total_count[$i-1] = "No of votes: ".$row["total_count"];
          $i++;
      }
    }
    $null_msg = "#No Polls";
    $create_msg = "<a href='poll_create.php'>Create</a>"; //Add styling here
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Poll</title>
    <script
            src="https://kit.fontawesome.com/704ddf1c0b.js"
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="main-template.css">
    <link rel="stylesheet" href="box-arrange.css">
    <style>
      body{
          background-image: url('movie\ roll.png');
          background-repeat: no-repeat;
          background-blend-mode:multiply;
          background-color: #ffebcd25;
          background-position: center;
          background-size: 800px;
      }
      @media (min-width : 1040px){
        body{
          background-image: url('tenor.gif');
          background-attachment: fixed;
          background-repeat: no-repeat;
          background-blend-mode:lighten;
          background-color: #ffebcd25;
          background-position: bottom right;
          background-size: 20vw;
        }
      }
    </style>
  </head>
  <body>
    <header class="header">
      <nav class="nav">
          <ul>
              <li class="poll">
                  <a href="poll_home.php"><i class="fas fa-poll fa-2x"></i></a>
              </li>
              <li class="web-tag l-tag">
                Popcorn Meter
              </li>
              <li>
                  <a href="User.php"><i class="fas fa-user fa-2x"></i></a>
              </li>
              <li class="movie">
                  <a href="movie_home.php"><i class="fas fa-film fa-2x"></i></a>
              </li>
              <li class="web-tag r-tag">
                Movie center
              </li>
          </ul>
      </nav>
      <div>
          <h1 class="main-heading">Popcorn Meter</h1>
      </div>
  </header>
  <section class="box">
    <button class="btn new-poll" onclick="location.href='poll_create.php'">Create New Poll</button>
  </section>
  <section>
    <div class="sub-heading">Check Out Popular Polls</div>
    <ul class="universe">
      <li class="box">
        <div onclick="location.href=''" class="item">
          <h3><?php if(isset($question[0])){echo $question[0];} else {echo $null_msg;} ?></h3>
          <p><?php if(isset($total_count[0])){echo $total_count[0];} else {echo $create_msg;} ?></p>
        </div>
      </li>
      <li class="box">
        <div onclick="location.href=''" class="item">
          <h3><?php if(isset($question[1])){echo $question[1];} else {echo $null_msg;} ?></h3>
          <p><?php if(isset($total_count[1])){echo $total_count[1];} else {echo $create_msg;} ?></p>
        </div>
      </li>
      <li class="box">
        <div onclick="location.href=''" class="item">
          <h3><?php if(isset($question[2])){echo $question[2];} else {echo $null_msg;} ?></h3>
          <p><?php if(isset($total_count[2])){echo $total_count[2];} else {echo $create_msg;} ?></p>
        </div>
      </li>
      <li  class="box">
        <div onclick="location.href=''" class="item">
          <h3><?php if(isset($question[3])){echo $question[3];} else {echo $null_msg;} ?></h3>
          <p><?php if(isset($total_count[3])){echo $total_count[3];} else {echo $create_msg;} ?></p>
        </div>
      </li>
    </ul>
  </section>

    <footer class="end-credit">
      <b style="color: white">POPCORNCRUNCHERS</b>
      <div class="white">
          <a href="#"
              ><i style="color: white" class="fab fa-instagram fa-2x"></i
          ></a>
          <a href="#"
              ><i style="color: white" class="fab fa-twitter fa-2x"></i
          ></a>
          <a href="#"
              ><i style="color: white" class="fab fa-pinterest fa-2x"></i
          ></a>
          <a href="#"
              ><i style="color: white" class="fas fa-envelope fa-2x"></i
          ></a>
      </div>
  </footer>
  </body>
</html>