<?php
  session_start();

  $_SESSION["is_host"] = TRUE;

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Spotify</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="google-site-verification" content="7EK36x-u-M4RtJqwW6a26VD9-dqMHzehtK-bGF55EGc" />

    <link rel="prefetch" href="../img/sunset.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Dorsa|Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="../css/host_id.css">
    <link rel="stylesheet" href="../css/general.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" id="navbar" style="z-index: 100">
      <div class="container-fluid">
        <a class="nav-item nav-link active" href="#"><img id="logo" src="../img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#" onclick="loadOut('art.php', 'right', 2)">Art</a>
            <a class="nav-item nav-link" href="#" onclick="loadOut('about_me.php', 'none', 0)">Contact Me</a>
          </div>
        </div>
      </div>
    </nav>

    
    <div class="fluid-container">
      <div id="mainContainer" class="container">
        <div id="info" class="text-center">
          <h1>Spotify</h1>
          <form action="check_host_id.php">
            <input type="text" placeholder="Host ID" name="host_id" autocomplete="off">
            <br><br>
            <button type="submit" class="btn">Connect</button>
            <button type="button" onclick="location.href='app.php';" class="btn">Create Session</button>
          </form> 
        </div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="../js/load.js"></script>
    <script src="../js/index.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </body>
</html>
