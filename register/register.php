<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "todo";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

	die("failed to connect!");
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // SQL query to check if the email exists
    $query = "SELECT email FROM users WHERE email = ?";

    // Prepare the statement
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Bind the result to a variable
    $stmt->bind_result($existingEmail);

    // Fetch the result
    $stmt->fetch();

    if ($existingEmail) {
        echo "Email already exists in the database";
    } else {
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
		
    }
}



?> 