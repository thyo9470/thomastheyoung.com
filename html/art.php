

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
    <link href="https://fonts.googleapis.com/css?family=Dorsa|Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="css/art.css">
  </head>
  <body>
<!--
    <div  class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 modal-content" id="modalImage" src="" alt="">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 modal-content" src="img/gats_shoes.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 modal-content" src="img/gats_shoes.jpg" alt="Third slide">
        </div>
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      </div>
    </div>-->


  <!-- Modal -->
  <div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" style="max-width:100%;" role="document">
      <!-- carousel -->
      <div class="modal-content" style="background-color:rgba(0, 0, 0, 0); border:none;">
      <div class="modal-body">
        <div  class="carousel slide" id="carousel" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 modal-content" src="" alt="">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 modal-content" src="img/gats_shoes.jpg" alt="">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 modal-content" src="img/gats_shoes.jpg" alt="">
            </div>
            <ol class="carousel-indicators">
              <li class="active">1</li>
              <li>2</li>
              <li>3</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row" style="width:100%;">
          <div id="modal-thumbnail-container">
            <a href="#" data-target="#carousel" data-slide-to="0" class="col"><img class="modalThumbnail" src="img/gats_shoes.jpg"></a>
            <a href="#" data-target="#carousel" data-slide-to="1" class="col"><img class="modalThumbnail" src="img/gats_shoes.jpg"></a>
            <a href="#" data-target="#carousel" data-slide-to="2" class="col"><img class="modalThumbnail" src="img/gats_shoes.jpg"></a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" id="navbar" style="z-index: 100">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" style="max-height:50px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="index.php">Home</a>
          <a class="nav-item nav-link active" href="#">Art <span class="sr-only">(current)</span></a>
        </div>
      </div>
    </div>
  </nav>

<!-- Main Container -->
  <div id="mainContainer" class="container">
    <div class="row text-center text-lg-left container">
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100"  onclick="setImage('img/gats_shoes.jpg')">
          <img class="img-fluid img-thumbnail image" src="img/gats_shoes_thmb.jpg" alt="" data-toggle="modal" data-target="#showImage">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail image" src="img/gats_shoes2_thmb.jpg" alt="" data-toggle="modal" data-target="#showImage">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail image" src="img/gats_bless_thmb.jpg" alt="" data-toggle="modal" data-target="#showImage">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail image" src="img/pink_af1_rock_thmb.jpg" alt="" data-toggle="modal" data-target="#showImage">
        </a>
      </div>
      <!--<div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
          <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
        </a>
      </div>-->
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script >
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

    var carousel = document.getElementById("carousel");
    var modalImage = document.getElementById("");
    $( ".image" ).click(function() {
      //modalImage.src = $(this).attr("src").replace("_thmb", "");
    });

    function setImage(url){
      alert(url);
      modalImage.src = url;
    }

    $('#showImage').on('hidden.bs.modal', function (e) {
      modalImage.src = ""
    })
    </script>
  </body>
</html>
