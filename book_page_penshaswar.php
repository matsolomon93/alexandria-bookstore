<?php
  require 'functions.php';
  require 'db_config.php';

  $link = new mysqli(HOST, USER, PASSWORD, DATABASE);

  $host=HOST; // Host name 
  $username=USER; // Mysql username 
  $password=PASSWORD; // Mysql password 
  $db_name=DATABASE; // Database name  
  $tbl_name="books"; // Table name 
  $sqli = mysqli_connect("$host", "$username", "$password", "$db_name") or die('Could not connect: ' . mysqli_connect_error());

  $isbn = '0451458737';
  $userid = $_SESSION['userid'];


  if (isset($_POST['wishlist'])) {
    addToList($_SESSION['userid'],$isbn,$link);
  }
  if(isset($_POST['review'])) {
    addReview($_SESSION['userid'],$isbn,$_POST['review'],$link);
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

  <title>Alexandria Bookstore </title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/homepage.css">
  <link rel="stylesheet" href="css/star.css">

 



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
      <div id="book_info" class="col-md-4">
      <?php 
          $result=mysqli_query($sqli, "SELECT * FROM books WHERE isbn = 0451458737");
          $row = mysqli_fetch_array($result);

          if($result === FALSE) 
          {
            echo "Result is False"; // TODO: better error handling
          }
        ?>
        <p> <b>Title:</b> <?php Print $row["title"]; ?> </p> 
        <p> <b>ISBN:</b> <?php Print $row["isbn"]; ?></p> 
        <p> <b>Author:</b> <?php Print $row["author"]; ?> </p> 
        <p> <b>Category:</b> <?php Print $row["category"]; ?></p>  
        <p> <b>Summary:</b><br> <?php Print $row["summary"]; ?> </p> 
      </div>
      <div id="book_image" class="col-md-6">
        <img src="images/book_covers/The_Peshawar_Lancers.jpg" id="catch1" draggable="true" ondragstart="drag(event)">
      <form action="book_page_penshaswar.php" method="post">
            <input type="hidden" name="wishlist" >
            <input type="submit" value="Add to wish list">
        </form>
        
        <form id="starrate" action="main_book_page.php" method="post">
          <div class="starRate">
            <div>Currently rated: 3 stars<b></b></div>
              <ul>
                <li><a href="#" onclick="document.getElementById('starrate').submit();" name="five"><span>Give it 5 stars</span></a></li>
                <li><a href="#" onclick="document.getElementById('starrate').submit();" name="four"><span>Give it 4 stars</span></a></li>
                <li><a href="#" onclick="document.getElementById('starrate').submit();" name="three"><span>Give it 3 stars</span><b></b></a></li>
                <li><a href="#" onclick="document.getElementById('starrate').submit();" name="two"><span>Give it 2 stars</span></a></li>
                <li><a href="#" onclick="document.getElementById('starrate').submit();" name="one"><span>Give it 1 star</span></a></li>
              </ul>
          </div>
        </form>

        <form action="book_page_penshaswar.php" method="post">
          <textarea name="review" rows="4" cols="50" placeholder="Write a review"></textarea>
          <input type="submit">
        </form>         
        <?php getReview($isbn,$link); ?>
      </div>
    </div>
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
            <p><?php getWishList($isbn,$link); ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" onclick="clearBox('modal_body2')" class="btn btn-primary">Clear</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal End -->

    <!--footer-->
    <div class = "navbar-inverse navbar-default navbar-fixed-bottom">
      <div class = "container">
        <p class = "navbar-text">Site Built by Mathew Solomon and Landon Gray </p>
        <button type="button" class ="btn btn-s navbar-btn pull-right" data-toggle="modal" data-target="#myModal2" ondrop="wishdrop(event)" ondragover="allowDrop(event)"><span class="glyphicon glyphicon-heart-empty"></span> Wish List</button>     
      </div>
    </div>


  </body>
</html>
