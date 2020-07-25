<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false)
{
  header("location: /LOGIN_SYSTEM/login.php");
  exit;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Login system</title>
  </head>
  <body>

<?php
include 'components/_navbar.php';
?>

<!-- ########################################## Jumbotron ######################################## -->
<div class="jumbotron">
  <h1 class="display-4">Welcome <?php print $_SESSION['username'];?> </h1>
  <p class="lead">You can feel secure we are best security provider around the world.</p>
  <hr class="my-4">
  <p>You can your any important information secure with us.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
<!-- ########################################## Jumbotron ######################################## -->

    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>