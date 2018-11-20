
<?php 
//check if user currently accessing index.php is loged in if not redirected to the login page
  session_start(); 

  if (!isset($_SESSION['username']))
   {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
   }
  if (isset($_GET['logout'])) 
  {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="container">
  <!---->
  <div class="row">
    <div class="col-md-5 col-sm-5 col-sx-13 col-md-offset-5" >
      <div class="card ">
        <div class="card-header bg-success">
                 <strong>HOME PAGE</strong>
        </div>
        <div class="card-block">
          <!--notification mmsg-->
          <?php if (isset($_SESSION['success'])) : ?>
                <!--<div class="error success" >-->
                  <h3>
                    <?php 
                     echo $_SESSION['success']; 
                      //unset($_SESSION['success']);
                    ?>
                  </h3>
                </div>
          <?php endif ?>
          <!-- logged in user information -->
          <?php  if (isset($_SESSION['username'])) : ?>
          <p>Welcome &nbsp <strong><?php echo $_SESSION['username']; ?></strong></p>
          <p> <a href="index.php?logout='1'"><button type="submit" class="btn btn-primary">logout!</button></a></p>
          <?php endif ?>

        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>