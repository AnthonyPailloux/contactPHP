<?php
// On démarre la session PHP pour pouvoir utiliser la superglobale $_SESSION
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec session</title>
</head>
<body>

    <!-- Inclusion du fichier d'en-tête avec include -->
    <!-- include permet d'ajouter un fichier externe dans cette page -->
    <!-- S'il y a une erreur (ex: fichier manquant), un *warning* est affiché mais le script continue -->
    <?php include "../includes/h"; ?>

    <main>

        <!-- Formulaire HTML qui envoie des données en POST (dans le corps de la requête HTTP) -->
        <!-- action="" signifie que le formulaire renvoie vers la même page -->
        <form action="" method="POST">
            <ul>
                <li>
                    <label for="pseudo">Pseudo :</label>
                    <!-- Champ texte pour le pseudo -->
                    <!-- L'attribut name="pseudo" est essentiel car c’est lui qui sera utilisé comme clé dans $_POST -->
                    <input type="text" id="pseudo" name="pseudo" placeholder="Entre ton pseudo">
                </li>

                <li>
                    <label for="message">Message :</label>
                    <!-- Champ texte pour le message -->
                    <!-- J'ai ajouté l'attribut name="message" qui manquait -->
                    <input type="text" id="message" name="message" placeholder="Entre ton message">
                </li>

                <div>
                    <!-- Bouton pour envoyer le formulaire -->
                    <input type="submit" value="Valider">
                </div>
            </ul>
        </form>

        <?php
        // Affiche le contenu de la superglobale $_SESSION
        // $_SESSION est un tableau associatif qui permet de stocker des données utilisateur persistantes entre les pages
        var_dump($_SESSION);

        // Vérifie si la requête envoyée est de type POST (formulaire soumis)
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            // $_POST est une superglobale (tableau associatif) contenant toutes les données envoyées via un formulaire en méthode POST
            // L'opérateur "?? ''" est un raccourci pour dire : si $_POST["pseudo"] existe, on l'utilise, sinon on prend une chaîne vide
            $pseudo = $_POST["pseudo"] ?? '';
            $message = $_POST["message"] ?? '';

            // Vérifie que les deux champs ne sont pas vides
            if (!empty($pseudo) && !empty($message)) {

                // On crée un tableau associatif avec le pseudo et le message
                $newContact = [
                    "pseudo" => $pseudo,
                    "message" => $message,
                ];

                // BONUS : on peut stocker ce tableau dans la session pour le garder entre plusieurs pages
                $_SESSION["contact"] = $newContact;

                // Affiche le tableau pour vérification
                echo "<pre>";
                print_r($newContact);
                echo "</pre>";
            } else {
                echo "<p style='color:red;'>Veuillez remplir tous les champs.</p>";
            }
        }
        ?>
    </main>

    <!-- Inclusion du pied de page avec require -->
    <!-- require fonctionne comme include, sauf qu’en cas d’erreur, il stoppe le script -->
    <?php require "../includes/footer.php"; ?>
</body>
</html>
