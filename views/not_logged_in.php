<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- login form box 
<form method="post" action="index.php" name="loginform">

    <label for="login_input_username">Username</label>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />

    <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

    <input type="submit"  name="login" value="Log in" />

</form>

<a href="register.php">Register new account</a> -->

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
  <body>

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
            </ul>

          <div id="loginbar"  class="navbar-right">
            <form class="form form-inline" method="post" action="index.php" name="loginform">

              <input id="login_input_username" type="text" class="form-control" name="user_name" placeholder="Username">

              <input id="login_input_password" type="password" class="form-control" name="user_password" placeholder="Password">

              <input type="submit" class="btn btn-success"  name="login" value="Log in" />
              <a href="register.php" style="margin-left:10px;"><button type="button" class="btn btn-primary pull-right">Register</button></a>
            </form>
          </div>
          
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    <div id="content">
      <!-- Content for landing page -->
        <br>
        <h1 class="text-center">Welcome to MangoChat</h1>
        <br>
        <h2 class="text-center">MangoChat is a free and simple online chat application for keeping in touch with your friends.</h2>
        <br>
        <h3 class="text-center">At this point, MangoChat is in a closed Alpha stage and strictly private.</h3>
        <br>
        <h3 class="text-center">If you wish to take part in this alpha test, please contact Mikael at <a href="mailto:mikaeljm92@gmail.com?subject=Mail from MangoChat">mikaeljm92@gmail.com</a></h3><br><br><br>

        <a href="register.php"><h4 class="text-center">Register new account</h4></a><br><br><br>
    </div>

      <!-- FOOTER -->
      <footer>
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
