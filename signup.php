<?php
require './components/_dbconnect.php';
$insert=false;
$error=false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
$username=$_POST['username'];
$email=$_POST['email'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];

$existsql="SELECT * FROM users2059  WHERE username='$username';";
$checking=mysqli_query($conn,$existsql);
$n=mysqli_num_rows($checking);

if($n == 0){
  if($password == $confirmpassword ){
  //storing hashed password in database
  $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
  $sql="INSERT INTO `users2059` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `timestamp`) VALUES (NULL, '$username', '$email', '$first_name', '$last_name', '$hashedpassword', current_timestamp());";
  $result=mysqli_query($conn,$sql);
  if($result){
      $insert="Your Account is successfully created.";
  }

  }

  else{
      $error="Password don't match";
  }
}

else{
  $error="Username already exists. choose a unique username.";
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

    <title>Join us today!</title>
  </head>
  <body>
  <!-- ######################################## Alert ##################################################### -->
  
  <?php
  include 'components/_navbar.php';
  if($insert){
  print '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>'.$insert.' required
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }

  if($error){
  print '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Errors!</strong>'.$error.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

  <!-- ######################################## Alert ##################################################### -->


<h1 style="text-align:center;">Join us Now</h1>

<!-- ####################################### signup form ############################################### -->
<div class="container">
<form action="/LOGIN_SYSTEM/signup.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" required>
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="form-group">
    <label for="confirmpassword">Confirm Password</label>
    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
  </div>

  <button type="submit" class="btn btn-outline-info " style="display:block;margin:auto;width:350px;margin-top:5px">Signup</button>
</form>
</div>
<!-- ####################################### signup form ############################################### -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>