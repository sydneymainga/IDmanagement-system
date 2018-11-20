<?php
//include('server.php');
$db = mysqli_connect('localhost', 'root', '', 'registration');
//declaring variables
      $RegNo = '';
      $id = 0;
      $StudentName = '';

      
//fetch data to edit form
if (isset($_POST['edit_newID']))
 {
    $id = $_POST['id'];

    $update = true;
    $record = mysqli_query($db, "SELECT * FROM table_managenewid WHERE id = $id");

    if ($record )
    {

      $n = mysqli_fetch_array($record);
      // this needs to be global variables not local
      $RegNo = $n['RegNo'];
      $StudentName = $n['StudentName'];
      $Status  = $n['Status'];
    }
    else{
      echo mysqli_error($db);
    }
  }
  elseif (isset($_POST['update_newID']))
   {

    
      $id = $_POST['id'];
      $StudentName = $_POST['StudentName'];
      $RegNo = $_POST['RegNo'];
      $Status  = $_POST['Status']; 
      if(!empty($StudentName)||!empty($RegNo)||!empty($Status)) {
      $sql = "update table_managenewid set StudentName = '$StudentName', RegNo = '$RegNo',Status = $Status where id = $id";
     // $sql ="UPDATE `table_managenewid` SET `StudentName`='$StudentName',`RegNo`='$RegNo',`Status`= $Status WHERE id = $id";
     }else{
     print("fffff");
       }

      if(mysqli_query($db,$sql)){
        header('Location:index.php');
      }else{
        echo mysqli_error($db);
      }


  }
?>