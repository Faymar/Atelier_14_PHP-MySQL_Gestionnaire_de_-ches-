<?php
require('bd.php');
session_start();
// nomUser
// email
// motdepasse
// confirmationMotdepasse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_nomuser = "/^[a-zA-Z0-9 ']{2,}$/";
    $regex_email = "/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/";
    $erros = [];

    if (empty($_POST["nomUser"])) {
        $erros[] =  "Le nom d'utilisateur est obligatoire.";
    }

    if (!preg_match($regex_nomuser, $_POST["nomUser"])) {
        $erros[] = "Le nomUser est invalide.";
    }

    if (!preg_match($regex_email, $_POST["email"])) {
        $erros[] = "Le email est invalide.";
    }

    if (strlen($_POST["motdepasse"]) < 8) {
        $erros[] = "Le mot de passe doit avoir au moins 8 caractères.";
    }

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

    if (!empty($erros)) {
        echo "<table>";
        foreach ($erros as $er) {
            echo  "<tr><td>" . $er . "</td></tr>";
        }
        echo  "</table>";
    } else {
        $email = $_POST["email"];
        $motdepasse = md5($_POST["motdepasse"]);
        $nomUser = $_POST["nomUser"];

        // id,	nom_utilisateur, email, mot_de_passe	

        $sql = 'INSERT INTO `utilisateurs` (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $nomUser);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $motdepasse);

        try {

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                
                $_SESSION['nom_utilisateur'] = $nomUser;

                $id = $conn->lastInsertId();

                $_SESSION['id'] = $id;

                header("Location:accueil.php");
            }
        } catch (Exception $e) {
            echo '<h1>Email ou nom d utilisateur deja iscrit</h1> <br>';
            echo '<h1><a href="inscription.php">retourner a la page d inscription</a> </h1><br>';
        }

        $db = null;
    }
}
