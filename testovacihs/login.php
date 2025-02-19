<?php
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

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    if ($action === 'login') {
        // Login process
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['is_admin'] = $user['is_admin'] == 1; // Store admin status in session
                header("location: pridej.php");
                exit();
            } else {
                header("location: loginnuti.php?error=wrongpass");
            }
        } else {
            header("location: loginnuti.php?error=wronguser");
        }
    } elseif ($action === 'register') {
        // Registration process
        // Check if username already exists
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<p class='error'>Username already exists. Please choose another.</p>";
            header("location: registrace.php");
        } else {
            // Hash the password and insert the new user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                echo '<p>Registration successful! <.</p>';
                sleep(5);
                header("location: loginnuti.php");
            } else {
                echo "<p class='error'>Error: " . $conn->error . "</p>";
            }
        }
    }
}

// Close the connection
$conn->close();
?>
