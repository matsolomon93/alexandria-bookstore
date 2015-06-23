<?php

  require 'functions.php';
  require 'db_config.php';

  if(!is_logged()){
    header("Location:login.php");
  }
  $link = new mysqli(HOST, USER, PASSWORD, DATABASE);

  $host=HOST; // Host name 
  $username=USER; // Mysql username 
  $password=PASSWORD; // Mysql password 
  $db_name=DATABASE; // Database name  
  $tbl_name="books"; // Table name 
  $sqli = mysqli_connect("$host", "$username", "$password", "$db_name") or die('Could not connect: ' . mysqli_connect_error());


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>Alexandria Bookstore Home</title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/homepage.css">

 



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
  var cart = document.getElementById("cartbadge");
  var cartbadge = 0;

  function allowDrop(ev)
  {
    ev.preventDefault();
  }

  function drag(ev)
  {
    var data = ev.dataTransfer.setData("Text",ev.target.id);
  }

  function cartdrop(ev)
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
    var cart = document.getElementById("cartbadge");
    cart.innerHTML = ++cartbadge;
  }
  function wishdrop(ev)
  {
    ev.preventDefault();
    var data=ev.dataTransfer.getData("Text");
    //ev.target.appendChild(document.getElementById(data));
    var copyimg = document.createElement("img");
    copyimg.height = 150;
    copyimg.width = 100;
    var original = document.getElementById(data);
    copyimg.src = original.src;
    document.getElementById("modal_body2").appendChild(copyimg);
    
  }
  function clearBox(elementID)
{
    document.getElementById(elementID).innerHTML = "";
    var cart = document.getElementById("cartbadge");
    cartbadge = 0;
    cart.innerHTML = 0;

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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catagories <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="allbooks.php">All Books</a></li>
                <li class="divider"></li>
                <li><a href="autobio.php">Autobiography</a></li>
                <li><a href="christian.php">Christian Living</a></li>
                <li><a href="engineering.php">Engineering</a></li>
                <li><a href="fiction.php">Fiction</a></li>
                <li><a href="finance.php">Personal Finance</a></li>
                <li><a href="military.php">Military</a></li>
              </ul>
            </li>
            <li><a href="#contact">Contact</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><button type="button" class ="btn btn-s navbar-btn" data-toggle="modal" data-target="#myModal" ondrop="cartdrop(event)" ondragover="allowDrop(event)"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart <span id="cartbadge"class="badge"><script> cart</script></span></button></li>
              <li><a href="logout.php"><button type="button" class="btn btn-danger btn-xs">Logout</button></a></li>
            </ul>
        </div>
      </div>
    </nav>
    <!--Navagation Bar End-->
    <!-- Shopping Cart Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h4>
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
     <!-- Wishlist Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-heart-empty"></span> Wish List</h4>
          </div>
          <div id="modal_body2" class="modal-body">
            <?php 
              $result=mysqli_query($sqli, "SELECT * FROM wishlists");
              $row = mysqli_fetch_array($result);

              if($result === FALSE) 
              {
                echo "Result is False"; // TODO: better error handling
              }
            ?>
            <p><?php Print $row["title"]; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" onclick="clearBox('modal_body2')" class="btn btn-primary">Clear</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal End -->

    <!--Container Start-->
    <div class="container">

      <div class="starter-template">
        <h1>Lastest Books</h1>
        <p class="lead">Recent additons to the Alexandria bookstore!</p>
      </div>

      <!--Carousel Start-->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <a href ="book_page_lotr1.php"><img id ="catch1" class="item_image" src="images/book_covers/fellowship.jpg" alt="..." draggable="true" ondragstart="drag(event)"></a>
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <a href ="book_page_hungergames.php"><img id ="catch2" class="item_image" src="images/book_covers/hungergames.jpeg" alt="..." draggable="true" ondragstart="drag(event)"></a>
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <a href ="book_page_dune.php"><img id ="catch3" class="item_image" src="images/book_covers/dune.gif" alt="..." draggable="true" ondragstart="drag(event)"></a>
            <div class="carousel-caption">
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="icon-next"></span>
        </a>
      </div>
      <!--Carousel End-->
      <hr/>
      <h3><center>Welcome to the Library of Alexandria!</center></h3>
      <p><center>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque suscipit metus a velit placerat consectetur. Vivamus at vulputate nulla, in malesuada est. Vivamus ac laoreet nisi. Nullam molestie, dui vel lacinia sagittis, metus lacus bibendum orci, eu ullamcorper massa neque id ante. In hac habitasse platea dictumst. Aenean scelerisque mi sit amet placerat blandit. Nullam vitae sapien non tellus lobortis malesuada sit amet tempus nibh. Proin vitae enim blandit, lobortis tortor vel, luctus lectus. Vivamus sed quam rutrum, mollis ligula ut, dapibus dui. Cras sagittis ante eu enim gravida gravida. Quisque fringilla adipiscing diam, et faucibus nibh suscipit malesuada. Maecenas congue nunc sed arcu laoreet consequat.</center></p>
    </div>
    <!--Container End-->

    <!--footer-->
    <div class = "navbar-inverse navbar-default navbar-fixed-bottom">
      <div class = "container">
        <p class = "navbar-text">Site Built by Mathew Solomon and Landon Gray </p>
        <button type="button" class ="btn btn-s navbar-btn pull-right" data-toggle="modal" data-target="#myModal2" ondrop="wishdrop(event)" ondragover="allowDrop(event)"><span class="glyphicon glyphicon-heart-empty"></span> Wish List</button>     
      </div>
    </div>


  </body>
</html>
