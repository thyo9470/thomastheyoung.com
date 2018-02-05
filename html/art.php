

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

    <link rel="stylesheet" href="css/art.css">
  </head>
  <body>

  <!-- Modal -->
  <div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" style="max-width:100%;" role="document">
        <img class="modal-content" id="modalImage" src="" alt="">
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top" id="navbar" style="z-index: 100">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" style="max-height:50px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php">Home</a>
          <a class="nav-item nav-link active" href="#">Art <span class="sr-only">(current)</span></a>
        </div>
      </div>
    </div>
  </nav>

  <div id="mainContainer" class="container">
    <div class="row text-center text-lg-left container">
      <div class="col-lg-3 col-md-4 col-xs-6">
        <a href="#" class="d-block mb-4 h-100">
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

    var modalImg = document.getElementById("modalImage");
    $( ".image" ).click(function() {
      console.log($(this).attr("src"))
      modalImage.src = $(this).attr("src").replace("_thmb", "");
    });

    $('#showImage').on('hidden.bs.modal', function (e) {
      modalImage.src = ""
    })
    </script>
  </body>
</html>
