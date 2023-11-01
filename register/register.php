<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "todo";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

	die("failed to connect!");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	//save to database
	//add phone number ip adress
	$query = "insert into users (name,password,email) values ('$name','$password','$email')";

	mysqli_query($con, $query);
	echo $name;
	//header("Location: login.php");
	die;
} else {
	echo "Please enter some valid information!";
}

?> 