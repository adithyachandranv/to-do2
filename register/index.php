<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="main">

		<form action="register.php" method="POST">
			<div id="main-container">
				<h2 id="heading">Create an account</h2>
				<input type="text" class="box" name="name" placeholder="Create username" required>
				<input type="email" class="box" name="email" placeholder="email" required>
				<input type="password" class="box" name="password" placeholder="Enter password" required>
				<input type="submit" name="Submit" id="submit-box" required>
		</form>
	</div>
	<!-- <p id="error">Input cannot be empty!</p> -->
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
		integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="script.js"></script>
</body>

</html>

<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "todo";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$password = $_POST['password'];
		//$Email = $_POST['email'];
	
		if(!empty($name) && !empty($password))
		{

			//save to database
			//add phone number ip adress
			$query = "INSERT INTO users (name,email,password) VALUES ('$name',''$Email','$password')";

			mysqli_query($con, $query);

			//header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>