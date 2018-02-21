$("#carousel").carousel({interval: false});



function loadOut(path){
  $('#background-image').animate(
        {
            'right': -900,
            'opacity':-1
        },1000,
        function(){
          localStorage.setItem("h", 700);

          window.location.href = path;
        }
    );
    $('#mainContainer').animate(
        {
            'opacity':-1
        },1000,
        function(){
          window.location.href = path;
        }
    );
    //$('#info').fadeOut('slow');
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
