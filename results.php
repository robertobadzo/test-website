
<?php 
require "header.php";

	

if (isset($_GET['submit']))
{
	
$searchQuery = mysqli_real_escape_string ($conn, $_GET['search-field']);
	$userType= mysqli_real_escape_string ($conn, $_GET['userType']);
	if (empty($_GET['search-field'])){
		echo "you didnt input anything";
		exit();
	}
	
	
	//if the user is logged in show him the results
	if (isset ($_SESSION['email']))
	{
		

        //SQL code which selects user email from the database whose email of fullname is similar to the query the user provided in the search bar
		$sql = "SELECT * FROM users WHERE email LIKE '%$searchQuery%'  OR fullName LIKE '%$searchQuery%';";
	    $result = mysqli_query($conn, $sql);
	    $queryResult = mysqli_num_rows ($result);
	    
	    //if there is at least one result - show it!
	    if ($queryResult > 0)
	    {
	      while ($row = mysqli_fetch_assoc($result))
	      echo $row['email']. "</br>";
//if there are 0 results:
	    }
	    else if($queryResult = 0)
	    {
	       echo "There are no matching results";
	    }

	}
	//If the user is not logged in no results will be shown to him
	else
	{		
	echo "<div class = 'error'><p class='mustLogin'>Log in to see results!</p></div>";
	}

}

//IF the user tried to submit the form without typing anything in the search field he will get this message:
else {
	echo "you didnt input anything";
}



