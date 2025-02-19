<?php
require_once("db.php");

// Check if the user is an admin
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

// Fetch texts for the logged-in user
$userId = $_SESSION['id'];
$sql = "SELECT id, text FROM user_texts WHERE user_id = '$userId' ORDER BY id DESC";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>