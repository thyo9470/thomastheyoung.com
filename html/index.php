<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
      #navbar {
        width: 100%;
        display: block;
      }
      #info img{
        display: inline-block;
        width: 100%;
        /*
        max-width: 300px;
        margin-top: 120px;*/
      }
      #info div{
        margin: 0px 10px 0px 0px;
        padding: 5px 5px 5px 5px;
        height: auto;
        width: auto;
        background-color: rgba(255, 255, 255, .5);
      }
      #info div p{
        display: inline-block;
        margin: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
      }
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" id="navbar" style="z-index: 100">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TOM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <!--<a class="nav-item nav-link" href="shoes.html">Shoes</a>-->
        </div>
      </div>
    </div>
  </nav>

    <div id="mainContainer" class="container">
      <div id="info" class="text-center">
        <img  src="img/self.jpg" alt="">
        <div>
          <i class="fa fa-instagram fa-2x" aria-hidden="true">  </i>
          <p>  </p>
          <i class="fa fa-linkedin fa-2x" aria-hidden="true">  </i>
          <p>  </p>
          <i class="fa fa-github fa-2x" aria-hidden="true"></i>
        </div>
        <p>I am currently a student at the University of Colorado Boulder studying Computer Science looking to learn more by getting experience in a more professional setting. I love programming, game development, drawing, painting, rock climbing, and having interesting experiences.</p>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <?php
      //header('Location: construction.php');
     ?>
  </body>
</html>
