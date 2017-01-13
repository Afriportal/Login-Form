<?php
// Connect to db here. No time to do much
session_start();
$localhost = "localhost";
$username = "root";
$password = "";
$db = "login";

// Create connection
$conn = new mysqli($localhost, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


/* Create database
$sql = "CREATE DATABASE login";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Create table

$query = "CREATE TABLE users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	password VARCHAR(50) NOT NULL,
	reg_date TIMESTAMP
)";

if ($conn->query($query) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/


?>
