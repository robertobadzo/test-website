<!DOCTYPE html>

<?php 
require "header.php";
?>

<html>
<head>
	<title></title>
</head>
<body>
<p class="screenMessage">This is the register screen!</p>
  
  <?php
  //THESE ARE THE ERROR MESSAGES FOR THE REGISTER SCHEME
     if (isset($_GET['error'])){
          if($_GET['error'] == "emptyfields"){
          	echo '<p class="error"> Fill in all the fields!</p>';

          }
          else if($_GET['error'] == 'invalidemail'){
            echo '<p class="error">The e-mail is invalid</p>';
          }
            else if($_GET['error'] == 'char'){
            echo '<p class="error">Your name should only contain letters!</p>';
          }
          else if($_GET['error'] == 'passnotmatch'){
            echo '<p class="error">Passwords do not match!</p>';
          }
           else if($_GET['error'] == 'usertaken'){
            echo '<p class="error">This email has already been registered!</p>';
          }
           else if($_GET['error'] == 'sqlerror'){
            echo '<p class="error">There is an access error with the database!</p>';
          }
     }
  ?>
  <!--REGISTER SCHEME BELOW:-->
  <div class="registerScheme">
<form method="POST" action="register-php.php">

  <label>Register:</label>

<select value="userType" name="userType">
  <optgroup label="Front End Developer">
  <option value="Angular" name="Angular">Angular</option>
  <option value="AngularJs" name="AngularJs">AngularJs</option>
  <option value="Angular2" name="Angular2">Angular2</option>
  <option value="React" name="React">React</option>
  <option value="React native" name="React native">React native</option>
  <option value="Vue" name="Vue">Vue</option>
  </optgroup>
    <optgroup label="Back End Developer">
  <option value="PHP" name="PHP">PHP</option>
  <option value="Symfony" name="Symfony">Symfony</option>
  <option value="Silex" name="Silex">Silex</option>
  <option value="Laravel" name="Laravel">Laravel</option>
  <option value="Lumen" name="Lumen">Lumen</option>
  <option value="NodeJs" name="NodeJs">NodeJs</option>
  <option value="Express" name="Express">Express</option>
  <option value="NestJS" name="NestJS">NestJS</option>
  </optgroup>

</select>

	<input type="text" name="email" placeholder="E-mail">
	<input type="text" name="fullName" placeholder="Full name">
	<input type="password" name="pass" placeholder="Password">
	<input type="password" name="repPass" placeholder="Repeat password">
	<button type="submit" name="submit">Submit</button>
	</form>
</div>
</body>
</html>