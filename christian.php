<?php

  require 'functions.php';
  require 'db_config.php';

  if(!is_logged()){
    header("Location:login.php");
  }
<<<<<<< Updated upstream
  $host=HOST; // Host name 
  $username=USER; // Mysql username 
  $password=PASSWORD; // Mysql password 
  $db_name=DATABASE; // Database name 
  $tbl_name="books"; // Table name 
  $sqli = mysqli_connect("$host", "$username", "$password", "$db_name") or die('Could not connect: ' . mysqli_connect_error());
=======
>>>>>>> Stashed changes


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>Alexandria Bookstore </title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/homepage.css">

 



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
  function allowDrop(ev)
  {
    ev.preventDefault();
  }

  function drag(ev)
  {
    var data = ev.dataTransfer.setData("Text",ev.target.id);
  }

  function drop(ev)
  {
    ev.preventDefault();
    var data=ev.dataTransfer.getData("Text");
    //ev.target.appendChild(document.getElementById(data));
    var copyimg = document.createElement("img");
    copyimg.height = 150;
    copyimg.width = 100;
    var original = document.getElementById(data);
    copyimg.src = original.src;
    document.getElementById("modal_body").appendChild(copyimg);

  }
  function clearBox(elementID)
{
    document.getElementById(elementID).innerHTML = "";
}
</script>

  </head>

  <body style="background-color: #4F9C80;">

    <!--Navagation Bar Start-->
    <nav class="navbar navbar-inverse navbar-top " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Alexandria</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catagories <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li ><a href="allbooks.php">All Books</a></li>
                <li class="divider"></li>
                <li><a href="autobio.php">Autobiography</a></li>
                <li class="active"><a href="christian.php"><span class="badge">2</span> Christian Living</a></li>
                <li><a href="engineering.php">Engineering</a></li>
                <li><a href="fiction.php">Fiction</a></li>
                <li><a href="finance.php">Personal Finance</a></li>
                <li><a href="military.php">Military</a></li>
              </ul>
            </li>
            <li><a href="#contact">Contact</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><button type="button" class ="btn btn-s navbar-btn" data-toggle="modal" data-target="#myModal" ondrop="drop(event)" ondragover="allowDrop(event)"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart </button></li>
              <li><a href="logout.php"><button type="button" class="btn btn-danger btn-xs">Logout</button></a></li>
            </ul>
        </div>
      </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
          </div>
          <div id="modal_body" class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" onclick="clearBox('modal_body')" class="btn btn-primary">Check Out</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal End -->  

        

          <div class="container-fluid">
            <h2 style="padding-bottom: 20px;">Christian Living Books</h2>
            <div class="row">
              <ol id="allbooksgroup"class="list-group">
                <li><a class="list-group-item" href="book_page_prayers.php">Prayers for a Privileged People</a></li>
                <li><a class="list-group-item" href="book_page_darknight.php">Dark Night of the Soul</a></li>
              </ol>
            </div>
          </div>


 

    <!--footer-->
    <div class = "navbar-inverse navbar-default navbar-fixed-bottom">
      <div class = "container">
        <p class = "navbar-text">Site Built by Mathew Solomon and Landon Gray </p>
        <button type="button" class ="btn btn-s navbar-btn pull-right" data-toggle="modal" data-target="#myModal2" ondrop="wishdrop(event)" ondragover="allowDrop(event)"><span class="glyphicon glyphicon-heart-empty"></span> Wish List</button>     
      </div>
    </div>


  </body>
</html>
