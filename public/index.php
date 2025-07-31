<?php
session_start
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

        <form action="" method="POST">
        <ul>
            <li>
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="entrte ton pseudo">
            </li>

            <li>
                <label for="message">Message :</label>
                <input type="text" id="message" placeholder="entre ton message">
            </li>

            <div>
                <input type="submit" value="Valider">
            </div>
        </ul>
        </form>
        <?php
        var_dump($_SESSION);
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $pseudo = $_POST["pseudo"] ?? '';
            $message = $_POST["message"] ?? '';
            
            

            if (!empty($pseudo) && !empty($message)) {
                $newContact = [
                    "pseudo" => $pseudo,
                    "message" => $message,
                ];
            }
        }

        ?>

    </main>
    <!-- deuxieme methode -->
    <?php require "../includes/footer.php" ;?>
</body>
</html>