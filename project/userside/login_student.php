<?php 
include_once"header.php";
include_once"serverr.php";
?>




<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="jkuatlogo.ico" id="icon" alt="User Icon" />
      <h1>JKUAT ID PORTAL</h1>
    </div>

    <!-- Login Form -->
    <form action="serverr.php" method="POST">
      <input type="text" id="login" class="fadeIn second" name="student_email" placeholder="Student Email" required>
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Registration Number" required>
      <div>
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
      </div>
    </form>

    <!-- forgot Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password</a>
    </div>

  </div>
</div>


<?php 
include_once"footer.php";
?>