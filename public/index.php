<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- premiere methode -->
    <?php include "../includes/header.php" ;?>
    <main>

        <form action="" method="POST"></form>
        <ul>
            <li>
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" placeholder="entrte ton pseudo">
            </li>

            <li>
                <label for="message">Message :</label>
                <input type="text" id="message" placeholder="entre ton message">
            </li>

            <div>
                <input type="submit" value="Valider">
            </div>
        </ul>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        ?>

    </main>
    <!-- deuxieme methode -->
    <?php require "../includes/footer.php" ;?>
</body>
</html>