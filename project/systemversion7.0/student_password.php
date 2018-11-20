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
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <p>Welcome &nbsp <strong><?php echo $_SESSION['username']; ?></strong></p>
  <a class="navbar-brand" href="#">ID management system</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="import.php">ImportIDs<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">ManageNew IDs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tempID.php">Temporary IDs</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="student_password.php">student passwords</a>
      </li>
      
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <!--logged in user information-->
          <li><?php  if (isset($_SESSION['username'])) : ?>
          <p> <a href="index.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> Log out(<?php echo $_SESSION['username']; ?>)</button></a></p>
          <?php endif ?></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  
  <p>Excel sheet should be in the format below.</p>
  <img src="format2.png" class="img-fluid" alt="Responsive image">
  <div class="container">
  <h1>Excel Upload</h1>


  <form method="POST" enctype="multipart/form-data" action="password_Upload.php" >
    <div class="form-group">
      <label>Upload Excel File</label>
      <input type="file" name="file" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" name="Upload" class="btn btn-success">Upload</button>
    </div>

    
  </form>
  <!--<div id="response" class="<?php //if(!empty($type)) { echo $type . " display-block"; } ?>"><?php// if(!empty($message)) { echo $message; } ?></div>-->
</div> 
  

 


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>