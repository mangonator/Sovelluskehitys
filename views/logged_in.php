<!-- if you need user information, just put them into the $_SESSION variable and output them here 
Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in! ;)-->

<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" 
<a href="index.php?logout">Logout</a>-->

<?php
// show potential errors / feedback (from login object)
if (isset($sendmsg)) {
    if ($sendmsg->errors) {
        foreach ($sendmsg->errors as $error) {
            echo $error;
        }
    }
    if ($sendmsg->messages) {
        foreach ($sendmsg->messages as $message) {
            echo $message;
        }
    }
}
?>

<!Doctype HTML>
<!-- Layout luonnos chat-sovellukselle-->
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">

    <link href="ekko/ekko-lightbox.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Mangochat Alpha - Sovelluskehitysprojekti 2015</title>
  </head>
  <body onload="getText();setStatus('login');">

    <div id="main" class="container-fluid">

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <div style="float:left;">Menu</div>
              <div style="float:right;margin:3px 0 0 7px;">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </div>
            </button>
            <a class="navbar-brand" href="#"><h3 id="logotext">Mango<span>chat</span></h3></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="#" style="margin-top:5px;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></li>             
            </ul>

          <div id="logoutbar" class="navbar-right">
            <p class="navbar-text navbar-right"><a id="logout" class="btn btn-danger" href="index.php?logout" role="button" onclick="setStatus('logout')">Log out</a></p>
            <p class="navbar-text navbar-right" style="margin-top:22px;">Signed in as <a id="current_user" href="#" class="navbar-link"><?php echo $_SESSION['user_name']; ?></a></p>
          </div>
          

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    <div id="content">
      <!-- Content for Chat -->      
      <div>
        <ul class="nav nav-tabs nav-justified">
          <li role="presentation" class="active"><a href="#">Chatroom name <span class="badge">42</span></a></li>
          <li role="presentation"><a href="#">Chatroom #2 <span class="badge">3</span></a></li>
          <li role="presentation"><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
              More <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation" class="active"><a href="#">Chat #1 <span class="badge">30</span></a></li>
              <li role="presentation"><a href="#">Chat #2  <span class="badge">23</span></a></li>
            </ul>
          </li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-10 col-sm-10">
          <div id="chatlog" class="jumbotron">
            <h1>Main chat window</h1>
            <p class="left">Try sending me a message</p>
            <p class="right">asdasdasdasdas</p>
          </div>
        </div>

        <div id="statusBox" class="col-md-2 col-sm-2">
          <strong>Online:</strong>
          <ul id="statusList">
            <li class="text-success">Onlinessä</li>
            <li class="text-muted">Offlinessä</li>
          </ul>
        </div>
      </div>

        <div class="row">
          <div class="col-xs-9 col-sm-10 col-md-10">
            <textarea id="textinput1" name="textinput1" class="form-control" rows="2"></textarea>
            <button id="sendimagebutton" onclick="sendImage()" class="btn btn-default">
              <span class="glyphicon glyphicon-picture" aria-hidden="true"></span></button>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-2">  
            <button id="sendbutton" onclick="sendText()" class="btn btn-default btn-lg">Send</button> 
          </div>
        </div>

      <br><br>
      
    </div>

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; Sovelluskehitysprojekti &middot; kevät 2015</p>
      </footer>

    </div><!-- /.container -->

    <!-- SCRIPTIT -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="ekko/ekko-lightbox.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script> 

    <!-- Call for scripts from functions.js -->
    <script src="js/functions.js"></script>

    <!-- Ekko lightbox -->
    <script>
      $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
      }); 
    </script>

  </body>
</html>
