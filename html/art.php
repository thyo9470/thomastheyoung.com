

<!doctype html>
<html lang="en">
  <head>
    <title>Art</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dorsa|Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="css/art.css">
    <link rel="stylesheet" href="css/general.css">
  </head>
  <body>


  <!-- Modal -->
  <div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" style="max-width:100%;" role="document">
      <!-- carousel -->
      <div class="modal-content" style="background-color:rgba(0, 0, 0, 0); border:none;">
      <div class="modal-body">
        <div  class="carousel slide" id="carousel" data-ride="carousel">
          <div id="carousel-inner" class="carousel-inner">
            <div id="image-container">
            </div>
            <ol class="carousel-indicators">
            </ol>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <!--2<div class="modal-footer">
        <div class="row" style="width:100%;">
          <div id="modal-thumbnail-container">
            <a href="#" data-target="#carousel" data-slide-to="0" class="col"><img class="modalThumbnail" src="img/A-gats-shoes/1-gats-shoes.jpg"></a>
          e  <a href="#" data-target="#carousel" data-slide-to="1" class="col"><img class="modalThumbnail" src="img/A-gats-shoes/1-gats-shoes.jpg"></a>
            <a href="#" data-target="#carousel" data-slide-to="2" class="col"><img class="modalThumbnail" src="img/A-gats-shoes/1-gats-shoes.jpg"></a>
          </div>
        </div>
      </div>-->
    </div>
    </div>
  </div>

<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" id="navbar" style="z-index: 100">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" onclick="loadOut('index.php')"><img src="img/logo.png" style="max-height:50px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="#" onclick="loadOut('index.php')">Home</a>
          <a class="nav-item nav-link active" href="#">Art <span class="sr-only">(current)</span></a>
        </div>
      </div>
    </div>
  </nav>

  <footer id="footer" class="footer">
      <a href="https://www.instagram.com/thomastheyoung/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
      <a href="https://github.com/thyo9470" target="_blank"><i class="fab fa-github fa-2x"></i></a>
      <a href="https://www.linkedin.com/in/thomasy314" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
  </footer>


<!-- Main Container -->
<div class="fluid-container">
  <img id="background-image" src="img/sunset.jpg" alt="">
  <div id="mainContainer" class="container">
    <div id="imagesContainer" class="row text-center text-lg-left fluid-container">
      <?php
        $currentFolder;
        $imgDir = scandir('img/');
        for($i = 2; $i < count($imgDir); $i++){
          if(is_dir("img/" . $imgDir[$i])){
            $path = 'img/' . $imgDir[$i];
            $images = scandir($path);
            $count = count($images) - 3;
            $thumbnailsOut =  "<div class='col-lg-3 col-md-4 col-xs-6.>" .
                    "<a href='#' class='d-block mb-4 h-100'  onclick='setImage(" . $count . ",\"" . $path . '/' . "\",\"" . substr($images[3], 1) . "\")'>" .
                    "<img id='test' class='img-fluid img-thumbnail image' src=" . $path . '/' .$images[2] . " alt='' data-toggle='modal' data-target='#showImage'>" .
                    "</a>".
                    "</div>";
            echo $thumbnailsOut;
          }
        }
      ?>
      <!--<div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>-->
    </div>
  </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="js/load.js"></script>
    <script src="js/art.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </body>
</html>
