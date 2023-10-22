<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestion des Taches</title>
</head>

<body>
    <?php
    require('bd.php');
    session_start();
    if (isset($_SESSION['id'])) {
        $id = $_POST['id'];
        $etat = 'suppprime';

        try {


            $stmt = $conn->prepare('UPDATE `taches` SET `etat` = ? WHERE `id` = ?');
            $stmt->bindParam(1, $etat);
            $stmt->bindParam(2, $id);

            $stmt->execute(); ?>
            <div class="home">
                <h2>la tache a ete supprimee</h2>
            </div>
            <div class="home">
                <a href="accueil.php">Retouner a la liste des taches</a>
            </div>
        <?php

        } catch (PDOException $e) { ?>
            <div class="home">
                <h2>Votre Operation a echoue </h2>
            </div>
            <div class="home">
                <a href="accueil.php">Retouner a la liste des taches et retenter</a>
            </div>
    <?php
        }
    } else   header("Location: inscription.php");
