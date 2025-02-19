<?php
require_once("db.php");

// Handle form submission for adding text
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_text'])) {
    $userId = $_SESSION['id'];
    $text = $conn->real_escape_string($_POST['text']);

    // Insert the text into the database
    $sql = "INSERT INTO user_texts (user_id, text) VALUES ('$userId', '$text')";

    if ($conn->query($sql) !== TRUE) {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }
}

// Handle form submission for deleting text
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_text'])) {
    $textId = intval($_POST['text_id']);
    $userId = $_SESSION['id'];

    // Delete the text from the database
    $sql = "DELETE FROM user_texts WHERE id = '$textId' AND user_id = '$userId'";

    if ($conn->query($sql) !== TRUE) {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }
}

// Close the connection
$conn->close();
header("location: ../pridej.php");
exit();
?>