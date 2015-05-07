<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
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
    <script src="js/functions.js"></script>

    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="ekko/ekko-lightbox.js"></script>
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
      <div class="row center-block">
        <div class="center-block" style="width:400px;">
        
        <br>
        <h2>Register a new account:</h2>
      <!-- register form -->
        <form class="form-horizontal" method="post" action="register.php" name="registerform">
        <!-- the user name input field uses a HTML5 pattern check -->
        <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
        <input id="login_input_username" class="login_input form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

        <!-- the email input field uses a HTML5 email type check -->
        <label for="login_input_email">User's email</label>
        <input id="login_input_email" class="login_input form-control" type="email" name="user_email" required />

        <label for="login_input_password_new">Password (min. 6 characters)</label>
        <input id="login_input_password_new" class="login_input form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

        <label for="login_input_password_repeat">Repeat password</label>
        <input id="login_input_password_repeat" class="login_input form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
        <br>
        <input type="submit"  name="register" class="btn btn-default btn-lg" value="Register" />

        </form>
        <br><br>
        <!-- backlink -->
        <a href="index.php" class="btn btn-primary" role="button">Back to Login Page</a>

        </div>
        </div>
    </div>

      <!-- FOOTER -->
      <footer>
        <p>&copy; Sovelluskehitysprojekti &middot; kevät 2015</p>
      </footer>

    </div><!-- /.container -->

    <!-- SCRIPTIT -->
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
