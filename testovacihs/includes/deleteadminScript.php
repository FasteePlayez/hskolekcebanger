<?php
require_once("db.php");

// Check if the user is an admin
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

// Handle admin action to delete all texts
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_all_texts']) && $isAdmin) {
    // Delete all texts from the database
    $sql = "DELETE FROM user_texts";

    if ($conn->query($sql) !== TRUE) {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }
}

// Close the connection
$conn->close();
header("location: ../pridej.php");
exit();
?>