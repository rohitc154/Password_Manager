<?php
session_start();

if (isset($_POST['website'])) {
    $website = $_POST['website'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $conn = mysqli_connect($server, $username, $password, $database);

    $sql1 = "SELECT * FROM `pwddetail` WHERE website='$website';";
    $result = $conn->query($sql1);

    $row = $result->fetch_assoc();

    // Output JSON data
    echo json_encode(array('un' => $row['username'], 'pw' => $row['password']));
}
?>