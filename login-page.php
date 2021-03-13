<!DOCTYPE html>
<?php 

require "header.php";
?>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
  <p class="screenMessage">This is the Login Screen!</p>
	<?php
        if (isset($_GET['error'])){
          if($_GET['error'] == "empty"){
          	echo '<p class="error"> Fill in all the fields!</p>';

          }
          else if($_GET['error'] == "wrongpwd"){
          	echo '<p class="error"> Email and password do not match!</p>';

          }
            else if($_GET['error'] == "nouser"){
          	echo '<p class="error"> This email is not registered!</p>';

          }
          else if(isset($_GET['optionallogin'])){
          
         }

        }   
  ?>
	<div class="loginScheme">
<form action="login-php.php" method="POST" ><label>Login</label>
	<input type="text" name="email" placeholder="E-mail">
	<input type="password" name="pass" placeholder="Password">
	<button type="submit" name="submit">Submit</button>
	</form>
</div>

</body>
</html>