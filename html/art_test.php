

<!doctype html>
<html lang="en">
  <head>
    <title>Art</title>
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
            <a href="#" data-target="#carousel" data-slide-to="1" class="col"><img class="modalThumbnail" src="img/A-gats-shoes/1-gats-shoes.jpg"></a>
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
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" style="max-height:50px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="#" onclick="loadOut()">Home</a>
          <a class="nav-item nav-link active" href="#">Art <span class="sr-only">(current)</span></a>
        </div>
      </div>
    </div>
  </nav>

<!-- Main Container -->
<div class="fluid-container">
  <img id="background-image" src="img/sunset.png" alt="">
  <div class="container">
  <div id="mainContainer" class="container">
    <div class="row text-center text-lg-left fluid-container">
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
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script >
    $("#carousel").carousel({interval: false});

    function loadIn(){
      $('#background-image').css('height', '100%');
      $('#background-image').css('right', '-700px');
      $('#background-image').animate(
          {
              'right': 0,
              'opacity':1
          },1000, function(){
            $('#mainContainer').animate(
              {
                'opacity':1
              },1000
            );
          }
      );
    }

    function loadOut(){
      $('#mainContainer').animate(
        {
          'opacity':-1
        },5
      )
      $('#background-image').animate(
            {
                'right': -900,
                'opacity':-1
            },1000,
            function(){
              window.location.href = 'index.php';
            }
        );
        $('#info').fadeOut('slow');
    }

    window.onload = loadIn();

    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

    function setImage(size, path, name){
      var modalOut = "<div class='carousel-item active'><img class='d-block w-100 modal-content' src=" + path + String(1) + name +"></div>"
      var indicator = "<li class='active' data-target='#carousel' data-slide-to='0'>1</li>";
      $('#image-container').append(modalOut);
      $('.carousel-indicators').append(indicator);
      for(i = 2; i <= size; i++){
        modalOut = "<div class='carousel-item'><img class='d-block w-100 modal-content' role='listbox' src=" + path + String(i) + name +"></div>"
        indicator = "<li data-target='#carousel' data-slide-to=" + String(i-1) + ">" + String(i) + "</li>";
        $('#image-container').append(modalOut);
        $('.carousel-indicators').append(indicator);
      }
    }

    $("h2").on("click", "p.test", function(){
        alert($(this).text());
    });

    $('#showImage').on('hidden.bs.modal', function (e) {
      $('#image-container').empty();
      $('.carousel-indicators').empty();
    })
    </script>
  </body>
</html>