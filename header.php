


<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Test Website</title>
</head>
<body>
	<div class="header">


          <div class= "message"><p class = "success">You successfully registered. Now log in!</p></div>
               
         
 

     <div class= "message"><p class = "success">Welcome '
     

     <form method="get" action="logout-php.php">
<div class="logoutButton"><button>Logout</button></div>
</form>


      	
		<!-- COMMENT Login button, only shows up if the user is not logged in-->

		<div class = "login"><button type="submit">Login</button></div>
		</form> <form method="get" action="register-page.php">
		<div class = "register"><button>Register</button></div>
		</form>
	

		<div class = "search">	
			
		<form method="GET" action="results.php">



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
</form>


</div>

</body>
</html>