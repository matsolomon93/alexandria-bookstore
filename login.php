<?php
  require 'functions.php';
  require 'db_config.php';

  $link = new mysqli(HOST, USER, PASSWORD, DATABASE);
  $message = "";
  $action  = isset($_REQUEST["action"]) ? $_REQUEST['action'] : 'none';

if($action == "login")
{
  $email = isset($_POST["email"]) ? $_POST["email"] : '';
  $pass  = isset($_POST["password"]) ? $_POST["password"] : '';
    
  login($email,$pass,$link);
  if(is_logged()){
    header("Location:index.php");
  }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alexandria Bookstore Login</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="test.css">
  <link rel="stylesheet" href="test2.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <style type="text/css">
    a:hover {
      text-decoration:none;
    }

  </style>


  </head>

  <body>

    <div class="container">

      <form action="login.php" method="post" class="form-signin" role="form">
        <input type="hidden" name="action" value="login" />
        <h2 class="form-signin-heading">Alexandria</h2>
        <input type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

      <a href="signup.php"><h5 class="subheading">Not a Member?</h5></a>

    </div> <!-- /container -->

  </body>
</html>
