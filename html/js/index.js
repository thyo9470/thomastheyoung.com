var queryString = new Array();
function getQuery() {
    if (queryString.length == 0) {
        if (window.location.search.split('?').length > 1) {
            var params = window.location.search.split('?')[1].split('&');
            for (var i = 0; i < params.length; i++) {
                var key = params[i].split('=')[0];
                var value = decodeURIComponent(params[i].split('=')[1]);
                queryString[key] = value;
            }
        }
    }
}

  window.onload = loadIn()
  function loadOut(path){
    localStorage.setItem("h", 700);
    $('.fluid-container').animate(
        {
            'margin-left':-$(window).width(),
            'opacity':-1
        },1000,
        function(){
          window.location.href = path;
        }
    );
    $('#background-image').animate(
        {
            'left':-700,
            'opacity':-1
        },1000,
        function(){
          window.location.href = path;
        }
    );
    $('#mainContainer').fadeOut('slow');
  }
