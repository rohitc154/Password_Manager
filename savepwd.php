<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "project";

// Establishing Connection!
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetching Record From HTML
$website = $_POST['website'];
$userinsert = $_POST['username'];
$pwdinsert = $_POST['password'];

//Inserting Data into database
$sql = "INSERT INTO `pwddetail` (`website`,`username`,`password`) VALUES ('$website','$userinsert','$pwdinsert');";

$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
    // echo $website;
    // echo $userinsert;
    // echo $pwdinsert;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();