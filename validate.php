<?php
// Database connection
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "project";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve values from login form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the user exists
$sql = "SELECT * FROM logindetails WHERE username='$username' AND password='$password';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authenticated successfully
    echo "Login Successful!";
} else {
    // Invalid username or password
    echo "Invalid username or password.";
    echo "<br>";
    echo "Not an Account?";
    echo "<a href='#'>Create One</a>";

}

$conn->close();