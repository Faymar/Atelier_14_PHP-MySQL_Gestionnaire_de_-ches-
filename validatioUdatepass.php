<?php
require('bd.php');
session_start();

if (isset($_SESSION['id'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (
            !preg_match("/[A-Z]/", $_POST["motdepasse"]) ||
            !preg_match("/[a-z]/", $_POST["motdepasse"]) ||
            !preg_match("/[0-9]/", $_POST["motdepasse"])
        ) {
            $erros[] = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minusculeet au moins un chiffre.";
        }

        if (empty($_POST["confirmationMotdepasse"])) {
            $erros[] =  "La confirmation du mot passe est obligatoire.";
        }

        if ($_POST["confirmationMotdepasse"] != $_POST["motdepasse"]) {
            $erros[] = "le mot de passe et la confirmation de passe ne match pas";
        }
    }
    if (!empty($erros)) {
        echo "<table>";
        foreach ($erros as $er) {
            echo  "<tr><td>" . $er . "</td></tr>";
        }
        echo  "</table>";
    } else {
        $id = $_SESSION['id'];
        $motdepasse = md5($_POST['motdepasse']);

        $sql = 'UPDATE `utilisateurs` SET mot_de_passe = ? WHERE id = ?';

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $motdepasse);
        $stmt->bindParam(2, $id);

        try {
            $stmt->execute();

            echo '<h1>Votre mot de passe est mise a jours</h1> <br>';
            echo '<h1><a href="inscription.php">retourner a la page de connexion</a> </h1><br>';
        } catch (Exception $e) {
            echo '<h1>Impossible de modifier le mot de passe ressayer</h1> <br>';
            echo '<h1><a href="inscription.php">retourner a la page de connexion</a> </h1><br>';
        }
        $db = null;
    }
} else {
    header("Location: inscription.php");
}
