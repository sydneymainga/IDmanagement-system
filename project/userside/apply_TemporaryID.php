<?php
include"serverr.php";
//session_start();
if (!isset($_SESSION['user']))
   {
   // $_SESSION['msg'] = "You must log in first";
    header('location: login_student.php');
   }
  if (isset($_GET['logout'])) 
  {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login_student.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <!--<p>Welcome &nbsp <strong><?php //echo $_SESSION['username']; ?></strong></p>-->
  <div class="fadeIn first">
      <img src="jkuatlogo.ico" id="icon" alt="User Icon" />
      
    </div>
    <div><h1>JKUAT ID PORTAL</h1></div>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="apply_TemporaryID.php">Apply Temporary ID<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newIDs_available.php">New IDs Available</a>
      </li>
      
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
          
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['user']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!--<a class="dropdown-item" href="#">logout</a>-->
        <p> <a  class="dropdown-item" href="apply_TemporaryID.php?logout='0'"><span class="glyphicon glyphicon-log-out"></span> Log out</button></a></p>
        <a class="dropdown-item" href="change_password.php">Change password</a>
          
        </div>
    </ul>
  </div>
</nav>

  <div class="container">
  
  
  <div class="row">
  <div class="col-md-8 col-sm-4 col-sx-17 col-md-offset-2" >
<!-- Login Form -->
    <!--several changes to be made in this form-->
    <form action="serverr.php" method="POST">
      <input type="text" id="login" class="fadeIn second" name="studentname" placeholder="Student Name" required>
      <input type="text" id="password" class="fadeIn third" name="Registration_num" placeholder="Registration Number" required>
      <input type="text" id="password" class="fadeIn fourth" name="course" placeholder="Course" required>
      <input type="text" id="password" class="fadeIn fourth" name="college" placeholder="College" required>





      <input type="submit" class="fadeIn fourth" value="Submit Details" name="apply_TemporaryID">
    </form>
</div>
</div>
</div>  

</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>