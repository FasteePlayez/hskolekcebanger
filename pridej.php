<?php
session_start();

// Database configuration
$host = 'localhost';
$db = 'bartosp_hskolekce';
$user = 'bartosp';
$pass = '"MamRadParky512"-.';

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

// Check if the user is an admin
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

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

// Handle admin action to delete all texts
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_all_texts']) && $isAdmin) {
    // Delete all texts from the database
    $sql = "DELETE FROM user_texts";

    if ($conn->query($sql) !== TRUE) {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }
}

// Fetch texts for the logged-in user
$userId = $_SESSION['id'];
$sql = "SELECT id, text FROM user_texts WHERE user_id = '$userId' ORDER BY id DESC";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>




<!DOCTYPE html>
    <html lang ="cs">
        <head>
            <link rel="stylesheet" href="styles.css">
            <meta charset="UTF - 8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>The Velka Uzasna Stranka Hearthstone Kolekce</title>


        </head>

        <body class="hspozadi">
            <div class="hedr">
                <?php include 'templates/header.php';?>
            </div>

            <div class="formular">

                <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>

                <form method="POST" action="">
                    <textarea name="text" placeholder="Enter your deck" required></textarea><br>
                    <button type="submit" name="add_text">Add Deck</button>
                </form>

                
                <?php if ($isAdmin): ?>
                    <form method="POST" action="">
                        <button type="submit" name="delete_all_texts">Delete All Decks</button>
                    </form>
                <?php endif; ?>

                <h2>Your Decks:</h2>
                <ul>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <li>
                                <div class="scroll">
                                    <?php echo htmlspecialchars($row['text']); ?>
                                </div>
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="text_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_text">Delete</button>
                                </form>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No decks added yet.</p>
                    <?php endif; ?>
                </ul>


                <a href="logout.php">Log out</a>

            </div>


            
        </body>



    </html>
