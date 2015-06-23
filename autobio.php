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


  <?php 
  include("header.php"); 
  ?> 
  <!-- begin page content --> 
          <div class="container-fluid">
            <h2 style="padding-bottom: 20px;">Autobiographical Books</h2>
            <div class="row">
              <ol id="allbooksgroup"class="list-group">
                
                <li><a class="list-group-item" href="book_page_benfrank.php">Autobiography of Benjamin Franklin</a></li>
                
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
