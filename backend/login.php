<?php 
	//session_start();
	include("connection.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$password = $_POST['password'];
		$password = $_POST['email'];
		if(!empty($name) && !empty($password) && !is_numeric($name))
		{

			//save to database
			//add phone number ip adress
			$query = "insert into users (name,password,email) values ('$name','$password',$email)";

			mysqli_query($conn, $query);

			//header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>