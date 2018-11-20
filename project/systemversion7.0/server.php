<?php
session_start();
//declare variables
$db = mysqli_connect('localhost', 'root', '', 'registration');
$username = "";
$email = "";
$password_1 = "";
$password_2 = "";
$errors = array();
$id = 0; 

//now register user
if (isset($_POST['reg_user']))
{
  //receive data fro form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //form validtion
  //by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}
    //check database if user with same username or email exist
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) //user exists
    {
      if ($user['username'] === $username) 
      {
          array_push($errors, "Username already exists");
      }
      if ($user['email'] === $email)
      {
          array_push($errors, "email already exists");
      }


    }
    //register user if no errors in form
    if (count($errors) == 0) 
    {
      $password = md5($password_1);//encrypt the password 

      $query = "INSERT INTO users (username, email, password) 
            VALUES('$username', '$email', '$password')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }



  }
  //login user
  if (isset($_POST['login_user'])) 
  {
    //gets data from form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    //validating

     if (empty($username)) {array_push($errors, "Username is required");}
     if (empty($password)) {array_push($errors, "Password is required");}
     //log in user if no errors
     if (count($errors) == 0)
     {
       $password = md5($password);
       $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
       $results = mysqli_query($db, $query);
         if (mysqli_num_rows($results) == 1)
          {
         $_SESSION['username'] = $username;
         $_SESSION['success'] = "You are now logged in";
         header('location: index.php');
          }
          else
           {
           array_push($errors, "password OR username is wrong");
            }

     }
  }
  //fetch data to display on temporary ID table
   $results = mysqli_query($db, "SELECT * FROM table_student");
   /*
   search records
   if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($db,$_POST['search_box']);
    //$results .=" WHERE id ='{$search_term}'";
    $results .= " WHERE course = '{$search_term}' ";    
      } 
      $query=mysqli_query($results) ;*/
  //when a student is deleted

  if(isset($_POST['delete']) && isset($_POST['id'])){
  $id  = html_entity_decode($_POST['id']);

  $query = mysqli_query($db, 'DELETE FROM table_student WHERE id='.$id);
  $_SESSION['message'] = "Address deleted!"; 

  if($query){
      header('location: tempID.php');
  }
  else{
    echo mysqli_error($db);
  }

}
//deleting record of new ID

if(isset($_POST['delete_newID']) && isset($_POST['id'])){
  $id  = html_entity_decode($_POST['id']);

  $query = mysqli_query($db, 'DELETE FROM table_managenewid WHERE id='.$id);
  $_SESSION['message'] = "Address deleted!"; 

  if($query){
      header('location: index.php');
  }
  else{
    echo mysqli_error($db);
  }

}
//editing
//declearing variables
      $Reg_no = '';
      $id = 0;
      $Student_Name = '';
      $course = '';
      $college = '';
      $status  = '';

//fetch data to edit form
if (isset($_POST['edit']))
 {
    $id = $_POST['id'];

    $update = true;
    $record = mysqli_query($db, "SELECT * FROM table_student WHERE id = $id");

    if ($record )
    {

      $n = mysqli_fetch_array($record);
      // this needs to be global variables not local
      $Reg_no = $n['Reg_no'];
      $Student_Name = $n['Student_Name'];
      $course = $n['course'];
      $college = $n['college'];
    }
    else{
      echo mysqli_error($db);
    }
  }elseif (isset($_POST['update'])) {

     $id = $_POST['id'];
      $Reg_no = $_POST['Reg_no'];
      $Student_Name = $_POST['Student_Name'];
      $course = $_POST['course'];
      $college = $_POST['college'];
      $status  = $_POST['status'];

      $sql = "update table_student set Reg_no = '$Reg_no',Student_Name = '$Student_Name',course = '$course' ,college = '$college',status = $status where id = $id";
     

      if(mysqli_query($db,$sql)){
        header('Location:tempid.php');
      }else{
        echo mysqli_error($db);
      }


  }
?>