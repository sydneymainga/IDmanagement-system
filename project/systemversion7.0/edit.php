
<?php include('server.php'); ?>


<?php 
//check if user currently accessing index.php is loged in if not redirected to the login page
  //session_start(); 
  if (!isset($_SESSION['username']))
   {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
   }
  if (isset($_POST['logout'])) 
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
  <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  
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
  
  
  <div class="row">
  <div class="col-md-4 col-sm-4 col-sx-12 col-md-offset-4" >
  <form action="edit.php" method="post">
   <div class="form-group">
   
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  </div> 
  <div class="form-group">
    <label>Reg no</label>
    
    <input type="text"  name="Reg_no" class="form-control"   value="<?php echo $Reg_no ; ?>">
    
  </div>
  <div class="form-group">
    <label>Student Name</label>

    <input type="text"  name="Student_Name" class="form-control" value="<?php echo $Student_Name ; ?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <div class="form-group">
    <label>course</label>

    <input type="text"  name="course" class="form-control" value="<?php echo $course ; ?>">
  </div>
   <div class="form-group">
    <label>college</label>

    <input type="text" name="college" class="form-control" value="<?php echo $college ; ?>">
  
  </div>
  <div class="form-check">
    
   <input type="radio" name="status" value="1"> issue<br>
  
  </div>
<div class="form-check">
  
  <input type="radio" name="status" value="0"> not issued<br>
</div>
  
  <button type="submit" name="update" class="btn btn-primary">Update</button>

</form>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>