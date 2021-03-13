<?php

require "header.php";

//ERROR HANDLERS for the Login
  if (isset($_POST['submit'])) {
    require 'dbh.php';
    $email = $_POST['email'];
    $password = $_POST['pass'];
    //IF ANY OF THE TWO FIELDS IS EMPTY user will be redirected back to the login page to fix his mistake
          if (empty($email) || empty($password)) {
             	header("Location: login-page.php?error=empty");
             	exit();
             }
             //SQL CODE which selects data from the user with email the user provided 
             else{
             	$sql = "SELECT * FROM users WHERE email=?;";
             	$stmt = mysqli_stmt_init($conn);
              //this checks if the SQL code can be executed properly and the database connection is working.
        	if (!mysqli_stmt_prepare($stmt, $sql)){
   		       header("Location: login-page.php?error=sqlerror");
   	}
             	else {
             		mysqli_stmt_bind_param($stmt, "s", $email);
             		mysqli_stmt_execute($stmt);
             		$result = mysqli_stmt_get_result ($stmt);
           	if($row = mysqli_fetch_assoc($result)){
              //This checks if the password and the email the user provided match in the database. If not the user will be redirected to the login page with a proper error message. (error messages are coded in the login-page.php file)
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if($pwdCheck == false){
                  header("Location: login-page.php?error=wrongpwd");
                }

     

//If the email and password match, the user will be logged in, the session will start and the user will be redirected to the home page (index.php)
            else if ($pwdCheck == true){
            session_start();
        
            $_SESSION['fullName'] = $row['fullName'];
            $_SESSION['userId'] = $row['idUsers'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php?login=success&fullname=". $row['fullName']);
          }


          else {
          	header("Location: login-page.php?error=wrongpwd");
          }
   		}
      //if the email the user provided doesn't exist in the database, the user will be redirected to the login page with a proper message
   		    else{
   			  header("Location: login-page.php?error=nouser");
   		}
   	}
   }
}



//if the user somehow came to this page without submitting the form he will be redirected to the home page
  else {
    header("Location: index.php");
    exit();
  }