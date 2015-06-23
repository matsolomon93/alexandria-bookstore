<?php
  require 'functions.php';
  require 'db_config.php';

  $link = new mysqli(HOST, USER, PASSWORD, DATABASE);
  $message = "";
  $action = isset($_REQUEST["action"]) ? $_REQUEST['action'] : 'none';

if($action == "signup")
{
  $fname    = isset($_POST["fname"]) ? $_POST["fname"] : '';
  $lname    = isset($_POST["lname"]) ? $_POST["lname"] : '';
  $email    = isset($_POST["email"]) ? $_POST["email"] : '';
  $password = isset($_POST["password"]) ? $_POST["password"] : '';
    
  signup($fname, $lname, $email, $password, $link);
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

    <title>Alexandria Bookstore Signup</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="test2.css">
  <link rel="stylesheet" href="test3.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    a:hover {text-decoration:none;}

  </style>

  </head>

  <body>

    <div class="container">

      <form action="signup.php" method="post" class="form-signin" role="form">
        <input type="hidden" name="action" value="signup" />
        <h2 class="form-signin-heading">Alexandria</h2>
        <input type="text" class="form-control" name="fname" placeholder="First Name" required autofocus>
        <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
        <input type="email" class="form-control" name="email" placeholder="Email address" required>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
      </form>

      <a href="login.php"><h5 class="subheading">Already a Member?</h5></a>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
