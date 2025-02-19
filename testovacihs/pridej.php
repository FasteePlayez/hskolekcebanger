<?php
require_once("includes/loadScript.php");
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

                <form method="POST" action="includes/pridejScript.php">
                    <textarea name="text" placeholder="Enter your deck" required></textarea><br>
                    <button type="submit" name="add_text">Add Deck</button>
                </form>

                
                <?php if ($isAdmin): ?>
                    <form method="POST" action="includes/deleteadminScript.php">
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
                                <form method="POST" action="includes/pridejScript.php" style="display:inline;">
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
