<?php
$db = mysqli_connect('localhost', 'root', '', 'registration');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["Upload"]))
{
    
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

  // Why are you using in array here?  I followed some online material
  if(in_array($_FILES["file"]["type"],$allowedFileType)){
  // if($_FILES["file"]["type"]==$allowedFileType){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $Studentemail = "";
                if(isset($Row[0])) {
                    $Studentemail = mysqli_real_escape_string($db,$Row[0]);
                }
                
                $Regno = "";
                if(isset($Row[1])) {
                    $Regno = mysqli_real_escape_string($db,$Row[1]);
                }
                
                if (!empty($Studentemail) || !empty($Regno)) {
                    $query = "insert into student_users(student_email,reg_no) values('".$Studentemail."','".$Regno."')";
                    $result = mysqli_query($db, $query);
                   // if (!empty($result)) {
                      if ($result) {
                       
                           echo "Excel Data Imported into the Database successful";
                    } else {
                       
                       echo "Problem in Importing Excel Data successful";
                    }
                }
             }
        
         }
  }
  else
  { 
      
        $message = "Invalid File Type. Upload Excel File.";
        echo $message;
  }
}


?>