
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
              <li><button type="button" class ="btn btn-s navbar-btn" data-toggle="modal" data-target="#myModal" ondrop="drop(event)" ondragover="allowDrop(event)"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</span></button></li>
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