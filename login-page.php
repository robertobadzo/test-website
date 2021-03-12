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
	
	<div class="loginScheme">
<form action="login-php.php" method="POST" ><label>Login</label>
	<input type="text" name="email" placeholder="E-mail">
	<input type="password" name="pass" placeholder="Password">
	<button type="submit" name="submit">Submit</button>
	</form>
</div>

</body>
</html>