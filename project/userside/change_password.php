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
     <!--logged in user information-->
          <!--<li><?php  //if (isset($_SESSION['username'])) : ?>
          <p> <a href="index.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> Log out(<?php //echo $_SESSION['username']; ?>)</button></a></p>
          <?php// endif ?></li>-->
          
        <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $_SESSION['user']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!--<a class="dropdown-item" href="#">logout</a>-->
        <p> <a  class="dropdown-item" href="apply_TemporaryID.php?logout='0'"><span class="glyphicon glyphicon-log-out"></span> Log out</button></a></p>
        <a class="dropdown-item" href="change_password.php"><strong>Change password</strong></a>
          
        </div>


    </ul>
  </div>
</nav>

  <div class="container">
  
  
  <div class="row">
  <div class="col-md-8 col-sm-4 col-sx-17 col-md-offset-2" >
<!-- Login Form -->
    <!--several changes to be made in this form-->
    <form action="change_password.php" method="POST">
      
      <input type="text" id="password" class="fadeIn first" name="old_password" placeholder="current password">
      <input type="text" id="password" class="fadeIn second" name="new_password" placeholder="new password">
      <input type="text" id="password" class="fadeIn third" name="con_password" placeholder=" confirm new password">



      <input type="submit" class="fadeIn fourth" value="Change password" name="update">
    </form>
<?php
if (isset($_POST['update']))
{
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $con_password=$_POST['con_password'];
    $chg_pwd=mysqli_query($db,"select * from student_users where student_email='".$_SESSION['user']."'");
    $chg_pwd1=mysqli_fetch_array($chg_pwd);
    $data_pwd=$chg_pwd1['reg_no'];
    if($data_pwd==$old_password)
    {
    if($new_password==$con_password)
    {
    $update_pwd=mysqli_query($db,"update student_users set reg_no='$new_password' where student_email='".$_SESSION['user']."'");
    //echo "Update Sucessfully !!!";
       echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("","password successfully updated","success");';
            echo '}, 1000);</script>';
      
    }
    else
    {
      echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("","Your new and Retype Password do not match !!!","warning");';
            echo '}, 1000);</script>';
    }
    }
    else
    {
     echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("","Your old password is wrong !!!","warning");';
            echo '}, 1000);</script>';
    }}


?>


</div>
</div>
</div>  

</div>
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>