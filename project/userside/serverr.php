

<?php
session_start();
//declare variables
$db = mysqli_connect('localhost', 'root', '', 'registration');
$user_name = "";
$password = "";

//login user
  if (isset($_POST['login'])) 
  {
    //gets data from form
    $user_name = mysqli_real_escape_string($db, $_POST['student_email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    //validating

     if (!empty($password) && !empty($password) )
     {
       //$password = md5($password);
       $query = "SELECT * FROM student_users WHERE student_email='$user_name' AND reg_no='$password'";
       $results = mysqli_query($db, $query);
         if (mysqli_num_rows($results) == 1)
          {
         $_SESSION['user'] = $user_name;
         //$_SESSION['success'] = "You are now logged in";
         header('location: apply_TemporaryID.php');
          }
          else
           {
           //array_push($errors, "password OR username is wrong");
           	echo '<script language="javascript">';
			      echo 'alert("password OR username is wrong")';
			      echo '</script>';
			 //header("location:login_student.php");
           	//echo "password and username is requred";
            }

     }
 }
//inserting details of temporary ID application
 if (isset($_POST['apply_TemporaryID']))
{
  //receive data from form
  $studentname = mysqli_real_escape_string($db, $_POST['studentname']);
  $reg_num = mysqli_real_escape_string($db, $_POST['Registration_num']);
  $course = mysqli_real_escape_string($db, $_POST['course']);
  $college = mysqli_real_escape_string($db, $_POST['college']);

  
  if (!empty($studentname) && !empty($reg_num) && !empty($course) && !empty($college)) 
    
    
    {
      

      $query = "INSERT INTO table_student (Reg_no,Student_Name,course,college ) 
            VALUES('$studentname', '$reg_num', '$course','$college')";
      mysqli_query($db, $query);
      header("location: apply_TemporaryID.php");
  }
}
//checking for available new IDS
/*if (isset($_POST['Check']))
{
  //receive data from form
  
  $reg_number = mysqli_real_escape_string($db, $_POST['Registration_num']);
  
  
  if (!empty($reg_number)) 
    
    
    {
    	//$query = "SELECT * FROM table_managenewid WHERE RegNo ='$reg_number'AND StudentName='collo' ";
      $query = "SELECT * FROM table_managenewid WHERE RegNo ='$reg_number'AND Status='0' ";
      $result=mysqli_query($db, $query);
       if (mysqli_num_rows($result) >= 1)
          {
          	echo "found";
           }
           else  
           {
          	echo "not found";
          }

      //header("location: newIDs_available.php");
  	}
}*/
//changing password
/*if (isset($_POST['update']))
{
	 	$old_password=$_POST['old_password'];
		$new_password=$_POST['new_password'];
		$con_password=$_POST['con_password'];
		$chg_pwd=mysqli_query($db,"select * from student_users where student_email='".$_SESSION['username']."'");
		$chg_pwd1=mysqli_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['reg_no'];
		if($data_pwd==$old_password)
		{
		if($new_password==$con_password)
		{
		$update_pwd=mysqli_query($db,"update student_users set reg_no='$new_password' where student_email='".$_SESSION['username']."'");
		//echo "Update Sucessfully !!!";
		 //echo file_get_contents("alert.php");
		  //header("location:change_password.php");
		}
		else{
		echo "Your new and Retype Password is not match !!!";
		}
		}
		else
		{
		echo "Your old password is wrong !!!";
		}//}*/


//}

?>