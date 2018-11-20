<?php include('server.php') ?>
<!DOCTYPE html>
<html>
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

<div class="container">
	<!---->
	<div class="row">
		<div class="col-md-4 col-sm-4 col-sx-12 col-md-offset-4" >
		<!--<div class="col-md-5 col-sm-5 col-sx-13 col-md-offset-5" >-->
			<div class="card ">
				<div class="card-header bg-success">
								 <strong>LOGIN</strong>
				</div>
				<div class="card-block">
				<form action="login.php" method="post">
					<?php include('errors.php'); ?>
					<div class="form-group">
					    <label for="Username">Username</label>
					    <input type="text" class="form-control" name="username" placeholder="Username" value="">
					  </div>
					  
					  
					  <div class="form-group">
					    <label for="InputPassword1">Password</label>
					    <input type="password" class="form-control" name="password" placeholder="Password" value="">
					  </div>

					  
					  
					  <button type="submit" class="btn btn-primary" name="login_user">login!</button>
					  
					  </p>
					  
				</form>
				<p>
					  	Not A member?<br>
					  	<a href="register.php"><button type="submit" class="btn btn-primary">Register!</button></a>
					  </p>
				</div>
			</div>
		</div>
	</div>
	<!---->
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>