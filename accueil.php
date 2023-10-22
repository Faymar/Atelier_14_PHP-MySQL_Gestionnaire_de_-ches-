<?php
require('bd.php');
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $user = $_SESSION['nom_utilisateur'];
?>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbars/">

        <link rel="stylesheet" href="style.css">

        <title>Gestion des Taches</title>
    </head>

    <body>
        <div class="navbar">
            <div class="base-container">
                <h1><?= $user ?></h1><br>
                <div class="dropdown">
                    <button class="btndropdown"><b>Menu</b></button>
                    <div class="dropdown-content">
                        <a class="grenColor" href="profil.php">Voir Profile</a>
                        <hr>
                        <a class="redColor" href="logOut.php">Se Deconnecter</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $etat = 'suppprime';
        $sql2 = "SELECT * FROM taches WHERE id_utilisateur = ? AND etat != ? ORDER BY FIELD(`priorite`, 'elevee', 'moyenne', 'faible')";
        $stmt2 = $conn->prepare($sql2);

        $stmt2->bindParam(1, $id);
        $stmt2->bindParam(2, $etat);

        $stmt2->execute();

        // nom	
        // description	
        // date_echeance	
        // priorite	
        // etat	
        // id_utilisateur	
        while ($tache = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="home">
                <div class="tach-container">
                    <h1 class="lp"><?= $tache['nom'] ?></h1>
                    <p><?= $tache['description'] ?></p>
                    <div class="base-container">
                        <p class="redColor">Priorité: <?= $tache['priorite'] ?></p>
                        <p class="grenColor">Statut: <?= $tache['etat'] ?></p>
                        <p class="grenColor">Date Echeance: <?= $tache['date_echeance'] ?></p>
                        <form action="detailsTache.php" method="post">
                            <input type="hidden" name="id" value="<?= $tache['id'] ?>">
                            <button type="submit">Voir les détails</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="home">
            <div class="form-container2">
                <form action="ajouterTache.php" method="post">
                    <h1>Ajouter une Nouvelle Tâche</h1>
                    <div>
                        <label for="titre">Titre :</label><br>
                        <input class="form-input" type="text" id="titre" name="titre" required>
                    </div>
                    <div>
                        <label for="priorite">Priorite :</label> <br>
                        <select class="form-input" name="priorite">
                            <option value="faible">Faible</option>
                            <option value="moyenne">Moyenne</option>
                            <option value="elevee">Élevée</option>
                        </select>
                    </div>
                    <div>
                        <label for="etat">état :</label> <br>
                        <select class="form-input" name="etat">
                            <option value="a faire">à faire</option>
                            <option value="en cours">en cours</option>
                            <option value="erminee">terminée</option>
                        </select>
                    </div>
                    <div>
                        <label for="date_echeance">Date Echeance :</label> <br>
                        <input class="form-input" type="datetime-local" id="date_echeance" name="date_echeance" required>
                    </div>
                    <div>
                        <label for="description">Description :</label><br>
                        <textarea class="form-input" name="description" id="description" cols="100"></textarea>
                    </div>
                    <button type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </body>

    </html>
<?php
} else   header("Location: inscription.php");
?>