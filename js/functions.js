/* JS file for chat */

$("#textinput1").keypress(function(event) {
    if (event.which == 13) {
      event.preventDefault();
      sendText();
      getText();
    }
});

function setChatpanelHeight(){
  x = $(window).height();
  console.log(x);
  $("#chatlog").height(x -200);
}

$(document).ready(function() {
  x = $(window).height();
  console.log(x);
  $("#chatlog").height(x -200);
});

$(window).resize(function() {
  x = $(window).height();
  console.log(x);
  $("#chatlog").height(x -200);
});

/* Asetetaan focus */
function setFocus(){
  //focus uuteen riviin
  var objDiv = document.getElementById("chatlog");
    objDiv.scrollTop = objDiv.scrollHeight;
    $( "#textinput1" ).focus();

    $("#chatlog").animate({ scrollTop: $('#chatlog')[0].scrollHeight}, "slow");
}

/* Funktio viestin lähettämiselle */
function sendText(){
  var text = $('textarea#textinput1').val();
  var author = $('#current_user').html();
  console.log(author);

  if (text == null || text == "null" || text == "" || text == " "){
    alert("Empty input");
  }
  else{
    $.post( "sendText.php", { name: author, message: text, type: "text" } );
  }
  //tyhjennetään textarea
  $('textarea#textinput1').val("");

  //focus uuteen riviin
  setFocus();
}

/* Funktio kuvan lisäämiselle */
function sendImage(){
  var text = $('textarea#textinput1').val();
  var author = $('#current_user').html();
  console.log(author);
  console.log(text);
  var parsed = text.replace(/\s/g, '');
  console.log(parsed);

/* Tarkastetaan, onko lisätty url olemassa: */
  $.ajax({
    url: parsed,
    type:'HEAD',
    error: function()
    {
        //file not exists
        alert("Invalid img url");
    },
    success: function()
    {
        //file exists
        if (text == null || text == "null" || text == "" || text == " "){
          alert("Empty input");
        }
        else{
        $.post( "sendText.php", { name: author, message: parsed, type: "img" } );
        }

        //tyhjennetään textarea
        $('textarea#textinput1').val("");

        //focus uuteen riviin
        setFocus();
    }
});  
}

/* Haetaan viestit tietokannasta */
function getText(){
  var author = $('#current_user').html();
  $.get( "getText.php", {name: author}, function( data ) {
    $("#chatlog").html( data );
});
}

/* Haetaan käyttäjien online-tilat */
function getStatus(){
  var author = $('#current_user').html();
  $.get( "getStatus.php", {name: author}, function( data ) {
    $("#statusList").html( data );
}); 
}

/* Asetetaan käyttäjän tila: */
function setStatus(x){

  if (x=="login"){
    console.log("login kutsuttu");
    var author = $('#current_user').html();
    var text = "online";
    $.post( "setStatus.php", { name: author, status: text } );
  }
  else if (x=="logout"){
    console.log("logout kutsuttu");
    var author = $('#current_user').html();
    var text = "offline";
    $.post( "setStatus.php", { name: author, status: text } );
  }
  else{
    console.log("Uh oh, nyt jokin meni päin persettä");
  }
}

//Ajastin uusien viestien hakemiseen
(function refresh(){
    // haetaan viestit ja online-tilat kutsumalla asianmukaisia funktioita
    getText();
    getStatus();
    console.log("tick");
    setTimeout(refresh, 2000);
})();
  
$( window ).unload(function() {
  setStatus("logout");
});

$( "#chatlog" ).ready(function() {
  // Handler for .ready() called.
  setTimeout(function() { setFocus(); }, 1000);
});


/* vanhaa koodia:
function sendtext() {
    var text = $('textarea#textinput1').val();
    console.log(text);
    $("#chatlog").append("<p class='right'>" + text + "</p>");
    $('textarea#textinput1').val('');
    var objDiv = document.getElementById("chatlog");
    objDiv.scrollTop = objDiv.scrollHeight;
    $( "#textinput1" ).focus();
}; 

function sendtext() {
  var text = $('textarea#textinput1').val();
  $.post("classes/Sendmsg.php",
    {
        user_name: "Kayttaja",
        send: text
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });
}

function sendtext(){
  var text = $('textarea#textinput1').val();
  //$.post( "classes/Sendmsg.php", { user_name: "John", send: "2pm" } );
  //$.post( "classes/Sendmsg.php", function( sendmessage ) {'user_name: "John", send: "2pm"'});
  $.post("classes/Sendmsg.php",{'user_name':action,'send':text});
}*/