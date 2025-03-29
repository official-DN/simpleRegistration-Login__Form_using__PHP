<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'user_management';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die(''. $conn->connect_error);
}
// $sql = "CREATE DATABASE user_management"; 

// $sql = "CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(50) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     password VARCHAR(255) NOT NULL
// );";

// $conn->query($sql);
?>