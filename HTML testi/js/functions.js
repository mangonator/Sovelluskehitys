/* JS file for chat */


$(document).ready(function(){
  $('a[href^="#"]').on('click',function (e) {
      e.preventDefault();

      var target = this.hash;
      var $target = $(target);

      $('html, body').stop().animate({
          'scrollTop': $target.offset().top-130
      }, 900, 'swing', function () {
          window.location.hash = target;
      });
  });
});

$("#textinput1").keypress(function(event) {
    if (event.which == 13) {
      event.preventDefault();
      sendtext();
    }
});



function sendtext() {
    var text = $('textarea#textinput1').val();
    console.log(text);
    $("#chatlog").append("<p class='right'>" + text + "</p>");
    $('textarea#textinput1').val('');
    var objDiv = document.getElementById("chatlog");
    objDiv.scrollTop = objDiv.scrollHeight;
    $( "#textinput1" ).focus();
};

