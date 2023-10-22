<?php
session_start();
require('bd.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_email = "/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/";
    $erros = [];

    if (!preg_match($regex_email, $_POST["email"])) {
        $erros[] = "Le email est invalide.";
    }
    if (!empty($erros)) {
        echo "<table>";
        foreach ($erros as $er) {
            echo  "<tr><td>" . $er . "</td></tr>";
        }
        echo  "</table>";
    } else {
        $sql = 'SELECT * FROM utilisateurs WHERE email = ?';
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $_POST['email']);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            $_SESSION['id'] = $user['id']; ?>

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style.css">
                <title>Connexion et Creation</title>
            </head>

            <body>
                <div class="navbar">
                    <h1>Modifier Mot de Passe</h1>
                </div>
                <div class="home">
                    <div class="container">
                        <div class="form-container">
                            <h2>Recuperaton Mot De Passe</h2>
                            <form method="post" action="validatioUdatepass.php">
                                <div>
                                    <label for="motdepasse">Nouveau Mot de passe :</label> <br>
                                    <input class="form-input" type="password" id="motdepasse" name="motdepasse" required>
                                </div>
                                <div>
                                    <label for="confirmationMotdepasse">Confirmation Nouveau Mot de passe :</label> <br>
                                    <input class="form-input" type="password" id="confirmationMotdepasse" name="confirmationMotdepasse" required>
                                </div>
                                <button type="submit">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>

            </body>

            </html>
<?php
        } else {
            echo '<h1>L\'utilisateur n\'existe pas.<h1>';
            echo '<h1><a href="inscription.php">retourner a la page d inscription</a> </h1><br>';
        }
    }
}

$pdo = null;
?>
<!DOCTYPE html>
<html lang="fr">