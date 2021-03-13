<?php



require "header.php";


//We check if the user has clicked the Register button
if (isset($_POST['submit'])){
	//Here we include the database connection
include_once 'dbh.php';
//Here we get the data from the Register form
$userType = mysqli_real_escape_string ($conn, $_POST['userType']);
$email =mysqli_real_escape_string ($conn, $_POST['email']);
$fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$repPass = mysqli_real_escape_string($conn, $_POST['repPass']);

      
//this function checks if any on the input fields are empty
   if (empty($email) || empty($fullName) || empty($pass) || empty($repPass)) {
   	header("Location: register-page.php?error=emptyfields&usertype=".$userType."&email=".$email."&fullname=".$fullName);
   	exit();
   }
   else {
   	//this checks if the name uses valid characters
if (!preg_match("/^[a-zA-Z_ -]*$/", $fullName)){
	header("Location: register-page.php?error=char&usertype=".$userType."&email=".$email);
	exit();
}
else {
	//this checks if the email is valid
	if((!filter_var($email, FILTER_VALIDATE_EMAIL))){
		header("Location: register-page.php?error=invalidemail&usertype=".$userType."&fullname=".$fullName);
		exit();
	}else{
		if($pass !== $repPass){
			header("Location: register-page.php?error=passnotmatch&usertype=".$userType."&email=".$email."&fullname=".$fullName);
		}
	
	
	//success
	else {

		//SQL code to insert the new user data in the database
    $sql= "SELECT email FROM users WHERE email=?";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
    	header("Location: register-page.php?error=sqlerror");
    	exit();
    }
    else {
    	mysqli_stmt_bind_param($stmt, "s", $email);
    	mysqli_stmt_execute($stmt);
    	mysqli_stmt_store_result($stmt);
    	$resultCheck = mysqli_stmt_num_rows($stmt);
    	if ($resultCheck > 0){
    		header("Location: register-page.php?error=usertaken&usertype=".$userType."&email=".$email."&fullname=".$fullName );

    	}
    
   //COMMAND TO INSERT INTO DATABASE
		else {
			$sql = "INSERT INTO users (userType, email, fullName, pwdUsers) VALUES (?,?,?,?);"; 
			$stmt= mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)){
    	header("Location: register-page.php?error=sqlerror ");
    	exit();
    }
     else {
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    	mysqli_stmt_bind_param($stmt, "ssss", $userType, $email, $fullName, $hashedPass);
    	mysqli_stmt_execute($stmt);
        header("Location: header.php?register=success");
		exit();
	}
}
}
}
}
}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}

else {

	header("Location: register-page.php");
	exit();
}
