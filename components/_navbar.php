<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/LOGIN_SYSTEM/home.php">SECURE </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/LOGIN_SYSTEM/home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
      if(isset($_SESSION['loggedin']))
      print '<li class="nav-item">
      <a class="nav-link" href="/LOGIN_SYSTEM/logout.php">logout</a>
      </li>';
      else{
      print '<li class="nav-item">
      <a class="nav-link" href="/LOGIN_SYSTEM/signup.php">signup</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/LOGIN_SYSTEM/login.php">login</a>
      </li>';
      }
      ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>