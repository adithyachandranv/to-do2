<?php
// Database configuration
$dbHost = "";
$dbUsername = "";
$dbPassword = "";
$dbName = "";

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function generateRandomUserID() {

    return uniqid();
}


if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $userID = generateRandomUserID();

    $sql = "INSERT INTO users (user_id, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $userID, $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT user_id, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($userID, $hashedPassword);

    if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
        echo "Login successful! User ID: " . $userID;
    } else {
        echo "Login failed. Please check your email and password.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>