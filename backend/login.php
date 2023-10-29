<?php
// Database configuration

session_start();

	include("connection.php");
	include("functions.php");
	

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email= $_POST['email'];
		$ipadd=  $_SERVER['REMOTE_ADDR'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			//add phone number ip adress
			$query = "insert into users (user_id,user_name,password,mobile,ip) values ('$user_id','$user_name','$password','$mobile','$ipadd')";

			mysqli_query($con, $query);

			//header("Location: login.html");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>