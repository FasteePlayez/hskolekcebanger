<?php session_start(); ?>

<!DOCTYPE html>
    <html lang ="cs">
        <head>
            <link rel="stylesheet" href="styles1.css">
            <meta charset="UTF - 8">
            <title>The Velka Uzasna Stranka Hearthstone Kolekce</title>


        </head>

        <body class="hspozadi">
            <div class="hedr">
                <?php include 'templates/header.php';?>
            </div>

            <div class="formular">
                <h2>Not logged in yet? Log in here!</h2>
                    <form action="login.php" method="POST">
                        <input type="hidden" name="action" value="login">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Login</button>
                        <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] = "wrongpass"){
                                 echo '<p>Špatné heslo, nebo jméno</p>';
                            }
                            
                        }
                        ?>
                    </form>

                
            </div>
        </body>



    </html>