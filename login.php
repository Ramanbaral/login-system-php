<?php
$failed=false;
$login=false;

if($_SERVER['REQUEST_METHOD']=="POST")
{
  require 'components/_dbconnect.php';

  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);

 
  // $sql="SELECT * FROM users2059 WHERE username='$username'AND password='$password';";
  $sql="SELECT * FROM users2059 WHERE username='$username';";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);

  if($num == 1){

    $row=mysqli_fetch_assoc($result);
    $password_check=password_verify($password,$row['password']);

    if($password_check){
      //password matches with hash password then we start session
      $login="You are successfully logged in";
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$username;

      header("location: home.php");
    }
    else{
      //password doesn't matches with hash password then we show alert with below message
      $failed="Invalid password. Enter correct password!";
    }
  }
  else{
    $failed="Invalid username. User with username <strong>".$username."</strong> doesn't exists!";
  }

}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Login | Security system</title>
  </head>
  <body>
  <?php
  include 'components/_navbar.php';
  ?>
<!-- ########################################### ALERT ################################################## -->
<?php
if($failed){
print '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>'.$failed.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}


if($login){
print '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>'.$login.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
<!-- ########################################### ALERT ################################################## -->

<h1 style="text-align: center;" class="mb-3">Login</h1>

  <!-- ########################################### login form ########################################### -->
  <div class="container">
  <form action="/LOGIN_SYSTEM/login.php" method="POST" style="display: grid; place-items: center;">
  <div class="form-group col-md-6">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username"  required>
  </div>

  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>

  <button type="submit" class="btn btn-outline-info" style="width:230px;">login</button>
</form>
</div>
  <!-- ########################################### login form ########################################### -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>