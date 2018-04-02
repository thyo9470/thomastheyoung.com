$("#carousel").carousel({interval: false});



window.onload = loadIn();
window.onunload = function(){};

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

function setImage(size, path, name){
  var modalOut = "<div class='carousel-item active'><img class='d-block center-block modal-content display-picture' src=" + path + String(1) + name +"></div>"
  var indicator = "<li class='active' data-target='#carousel' data-slide-to='0'>1</li>";
  $('#image-container').append(modalOut);
  $('.carousel-indicators').append(indicator);
  for(i = 2; i <= size; i++){
    modalOut = "<div class='carousel-item'><img class='d-block center-block modal-content display-picture' role='listbox' src=" + path + String(i) + name +"></div>"
    indicator = "<li data-target='#carousel' data-slide-to=" + String(i-1) + ">" + String(i) + "</li>";
    $('#image-container').append(modalOut);
    $('.carousel-indicators').append(indicator);
  }
  $('.display-picture').css('max-height', 9*$(window).height()/10);
}

$('#showImage').on('hidden.bs.modal', function (e) {
  $('#image-container').empty();
  $('.carousel-indicators').empty();
})
