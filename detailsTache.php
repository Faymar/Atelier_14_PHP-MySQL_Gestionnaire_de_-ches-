<?php
require('bd.php');
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $user = $_SESSION['nom_utilisateur'];
    $id_taches = $_POST["id"];


?>


    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Gestion des Taches</title>
    </head>

    <body>
        <div class="navbar">
            <h1>Gestion des Taches</h1>
        </div>
        <?php

        $sql2 = 'SELECT * FROM taches WHERE id = ?';
        $stmt2 = $conn->prepare($sql2);

        $stmt2->bindParam(1, $id_taches);

        $stmt2->execute();

        while ($tache = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="home">
                <div class="tach-container">
                    <h1 class="lp"><?= $tache['nom'] ?></h1>
                    <div class="base-container">
                        <p class="redColor">Priorité: <?= $tache['priorite'] ?></p>
                        <p class="grenColor">Statut: <?= $tache['etat'] ?></p>
                        <p class="grenColor">Date Echeance: <?= $tache['date_echeance'] ?></p>
                    </div>
                    <p><?= $tache['description'] ?></p>

                    <div class="base-container">
                        <form action="terminer.php" method="post">
                            <input type="hidden" name="id" value="<?= $tache['id'] ?>">
                            <button type="submit">Marquer comme terminee</button>
                        </form>
                        <form action="suppprimer.php" method="post">
                            <input type="hidden" name="id" value="<?= $tache['id'] ?>">
                            <button class="redBG" type="submit">Supprimer La tache </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <br><br>
        <div class="home">
            <a href="accueil.php">Retouner a la liste des taches</a>
        </div>
    </body>

    </html>

<?php
} else   header("Location: inscription.php");
?>