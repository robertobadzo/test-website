<!-- This page is a header page. It also contains important files and database connection-->
<?php
session_start();
 
require 'dbh.php';

?>


<!DOCTYPE html>
<html>
<head>
	<!--link to the CSS file-->
	<link rel="stylesheet" type="text/css" href="styles.css">
	<!--Title of the Website-->
	<title>Test Website</title>
</head>
<body>
	<div class="header">
<!--LOGO BOX with a hyperlink which when pressed will always return you to the home page (index.php)-->
	<div class="logo"><h1><a href="index.php">Test Website</a></h1></div>
	   <?php
       if (isset($_GET['register'])){
            if($_GET['register'] == 'success'){

            //MESSAGE: THIS IS a registration confirmation message, it only shows up if the user just registered

            echo '<div class= "message"><p class = "success">You successfully registered. Now log in!</p></div>';}
               
          }
 

      if (isset ($_SESSION['fullName'])){
      
      
          
       //MESSAGE: this is a welcome message, it shows up if the user is logged in   

      	echo '<div class= "message"><p class = "success">Welcome '. $_SESSION['fullName'] .' </p></div>';
     

      //THIS IS A LOGOUT BUTTON WHICH REDIRECTS THE USER TO THE LOGOUT CODE
      	echo '<form method="get" action="logout-php.php">
<div class="logoutButton"><button>Logout</button></div>
</form>';

      }
      else {

      	// MESSAGE: This message only shows up if the user is not logged in
      	echo '<div class= "message"><p>You are logged out </p></div>';
      	echo '<form method="get" action="login-page.php">

		<!-- COMMENT Login button, only shows up if the user is not logged in-->

		<div class = "login"><button type="submit">Login</button></div>
		</form> <form method="get" action="register-page.php">
		<div class = "register"><button>Register</button></div>
		</form>';

      }

       
	?>
	

		

		<div class = "search">	
		<form method="GET" action="header.php">
     <!--SEARCH SCHEME which shows up in the header of every page-->
	<label>Search for a user:</label>

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

<!--Input in this search bar-->
<input type="text" name="search-field" placeholder ="Search" align="top-right">
<!--Submit the search into results page-->
<button type="submit" name="submit">Submit</button></div>
<?php

	 

}
else{
	header("Location: index.php");
}
?>
</form>


</div>

</body>
</html>