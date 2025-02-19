<?php
session_start();

// Database configuration
$host = 'localhost';
$db = 'bartosp_hskolekce';
$user = 'root';
$pass = '';

// Establish connection to the database
$conn = new mysqli($host, $user, $pass, $db);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    header("location: loginnuti.php");
    exit();
}