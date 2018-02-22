var curPath = window.location.pathname;
var sideAlign = 'none';
var margin = 'none';

var horizontal = 0;
var vertical = 0;



function getInfo(){
  //figure out where you are to set the alignment of background-image

  if(curPath == '/index.php'){
    sideAlign = "left";
    margin = "margin-left";
  }else if (curPath == '/art.php') {
    sideAlign = 'right';
    margin = "margin-right";
  }

  if(localStorage["h"]){
    horizontal = localStorage.getItem("h");
    localStorage.removeItem("h");
  }
  if(localStorage["v"]){
    vertical = localStorage.getItem("v");
    localStorage.removeItem("v");
  }
}

function loadIn(){
  getInfo();
  //setting css elements
  console.log(sideAlign + " " + horizontal);
  $('#background-image').css(sideAlign, -horizontal);
  $('#background-image').css('height', '100%');
  //animate
  $('#background-image').animate(
      {
          [sideAlign]: 0,
          'opacity':1
      },800, function(){
        $('#mainContainer').animate(
          {
            'opacity':1
          },1000
        )
      }
  );

}

function loadOut(path, dir, speed){
  localStorage.setItem("h", 700);

  getInfo();

  if(dir == 'right'){
    horizontal = speed * (-$(window).width()/10);
  }else if(dir == 'left'){
    horizontal = speed * ($(window).width()/10);
  }else if(dir='center'){
    horizontal = $('#mainContainer').css('margin-left');
  }

  $('#background-image').animate(
        {
            [sideAlign]: -700,
            'opacity':-1
        },1000,
        function(){
          window.location.href = path;
        }
    );
    $('#mainContainer').animate(
        {
          'margin-left': horizontal,
          'opacity':-0.5
        },800,
        function(){
        }
    );
}
