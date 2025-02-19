<?php session_start(); ?>

<!DOCTYPE html>
    <html lang ="cs">
        <head>
            <link rel="stylesheet" href="styles.css">
            <meta charset="UTF - 8">
            <title>The Velka Uzasna Stranka Hearthstone Kolekce</title>


        </head>

        <body class="hspozadi">
            <div class="hedr">
                <?php include 'templates/header.php';?>
            </div>

            <div class="formular">
                

                <h2>Don't have an account yet? register here</h2>

                

                <h2>Register</h2>
                    <form action="login.php" method="POST">
                        <input type="hidden" name="action" value="register">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Register</button>
                    </form>
            </div>
        </body>



    </html>