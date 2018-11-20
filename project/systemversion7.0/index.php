<?php 
//check if user currently accessing index.php is loged in if not redirected to the login page
  //session_start(); 
include('server.php'); 
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
  <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
     <!--<a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Log out(user)</a>

			logged in user information-->
          <li><?php  if (isset($_SESSION['username'])) : ?>
          <p> <a href="index.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> Log out(<?php echo $_SESSION['username']; ?>)</button></a></p>
          <?php endif ?></li>

    </ul>
  </div>
</nav>
  
<div class="container">
  
  
<div class="container">
<h1>NEW IDs</h1>

<table class="table table-striped">
  <thead  style="background-color: #0aa7b7;">
    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Date Received</th>
      <th scope="col">Status</th>
      
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
   </thead>
    <tr class="filters">
      <div class="form-group">
      <div class="input-group">
      <span class="input-group-addon">Search</span>
      <input type="text" name="search_text" id="search_text" placeholder="Search by student Details" class="form-control" />
      </div>
      </div>
</tr>
  <tbody>
    <?php
   // include('server.php'); 
    $result = mysqli_query($db, "SELECT * FROM table_managenewid");
    while ($row = mysqli_fetch_array($result)) { ?>
     <tr>
      <td><?php echo $row['StudentName']; ?></td>
      <td><?php echo $row['RegNo']; ?></td>
      <td><?php echo $row['DateReceived']; ?></td>
      <td><?php  if($row['Status']){
        echo 'Issued';
      } else{
        echo "ID available";
      }
      ?></td>

      <td>

       <form action="editnewid.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
          <button type="submit" class="btn btn-success" name="edit_newID">
         <i class="fas fa-user-edit"></i>
        </button>
        </form>
      </td>
      <td>
        
        <form action="server.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
          <button type="submit" class="btn btn-danger" name="delete_newID">
         <i class="fas fa-trash-alt"></i>
        </button>
        </form>
      </td>
  </tr>
  <?php } ?>
   
  </tbody>

</div>


 


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
