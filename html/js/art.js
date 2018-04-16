$("#carousel").carousel({interval: false});

var file_read_done = 0;

window.onload = loadIn();
window.onunload = function(){};

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

function setImage(size, path, name){
  <!--$('#modal-footer').html('<p>test</p>')-->

  var loc = path + name.substring(1, name.length-4)+'.txt'
  var cap_html = getProperties(loc)
  if(cap_html[0].includes('undefined')){
    size++
    for (var i = 0; i < size; i++) cap_html[i] = '';
  }
  var modalOut = "<div class='carousel-item active display-picture-container'>" + cap_html[0] + "<img class='d-block center-block modal-content display-picture' src=" + path + String(1) + name +"></div>"
  var indicator = "<li class='active' data-target='#carousel' data-slide-to='0'>1</li>";
  $('#image-container').append(modalOut);
  $('.carousel-indicators').append(indicator);


  for(i = 2; i <= size; i++){
    modalOut = "<div class='carousel-item display-picture-container'>" + cap_html[i-1] + "<img class='d-block center-block modal-content display-picture' src=" + path + String(i) + name +"></div>"
    indicator = "<li data-target='#carousel' data-slide-to=" + String(i-1) + "></li>";
    $('#image-container').append(modalOut);
    $('.carousel-indicators').append(indicator);
  }
  $('.display-picture').css('max-height', 9*$(window).height()/10);
}

$('#showImage').on('hidden.bs.modal', function (e) {
  $('#image-container').empty();
  $('.carousel-indicators').empty();
})

$(document).click(function(e) {
  if ( ($(e.target).closest('.display-picture').length === 0) && ($(e.target).closest('.carousel-part').length === 0) ) {
    $('#showImage').modal('hide')
  }
});

function readTextFile(file)
{
    var file_info = '';
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
              file_info = rawFile.responseText;
            }
        }
    }
    rawFile.send(null);
    return file_info;
}

function getProperties(filePath){
  var file = readTextFile(filePath);
  var file_info = file.split('\n');
  var file_ret = []
  for (i = 0; i < file_info.length; i+=2){
    var title = file_info[i];
    var desc = file_info[i+1];
    if(title != '' & desc != ''){
      file_ret.push("<div class='carousel-caption carousel-part'><h5>" + title + "</h5><p>" + desc + "</p></div>");
    }else  if(title == ''){
      file_ret.push("<div class='carousel-caption carousel-part'><p>" + desc + "</p></div>");
    }else if(desc == ''){
      file_ret.push("<div class='carousel-caption carousel-part'><h5>" + title + "</h5></div>");
    }
  }
  return file_ret;
}
/*
$(window).resize(function(){
  if($('#showImage').is(':visible')){
    element = $('.active').find('.d-md-block')
    cap_check = false
    if(element.css('display') == 'block'){
        cap_check = true;
    }
    console.log(cap_check)
  }
})*/
