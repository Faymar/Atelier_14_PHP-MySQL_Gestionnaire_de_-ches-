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
        <div class="dropdown">
            <button class="btndropdown">Menu</button>
            <div class="dropdown-content">
                <a href="#">Lien 1</a>
                <a href="#">Lien 2</a>
                <a href="#">Lien 3</a>
            </div>
        </div>
    </div>
    <div class="home">
        <div class="tach-container">
            <h1 class="lp">Préparation d'un Rapport de Vente</h1>
            <p>Recueillir les données de ventte, générer des graphiques et redigés un rapport detaillés.</p>
            <div class="base-container">
                <p class="redColor">Priorité: Haute</p>
                <p class="grenColor">Statut: En cours</p>
                <button>Voir les détails</button>
            </div>
        </div>
    </div>
    <div class="home">
        <div class="tach-container">
            <h1 class="lp">Préparation d'un Rapport de Vente</h1>
            <p>Recueillir les données de ventte, générer des graphiques et redigés un rapport detaillés.</p>
            <div class="base-container">
                <p class="redColor">Priorité: Haute</p>
                <p class="grenColor">Statut: En cours</p>
                <button>Voir les détails</button>
            </div>
        </div>
    </div>
    <div class="home">

        <div class="form-container2">
            <form action="" method="post">
                <h1>Ajouter une Nouvelle Tâche</h1>
                <div>
                    <label for="titre">Titre :</label> <br>
                    <input type="text" id="titre" name="titre" required>
                </div>
                <div>
                    <label for="priorite">Priorite :</label> <br>
                    <select name="priorite">
                        <option value="faible">Faible</option>
                        <option value="moyenne">Moyenne</option>
                        <option value="elevee">Élevée</option>
                    </select>
                </div>
                <div>
                    <label for="etat">état :</label> <br>
                    <select name="etat">
                        <option value="a faire">à faire</option>
                        <option value="en cours">Moyenne</option>
                        <option value="erminée">erminée</option>
                    </select>
                </div>
                <div>
                    <label for="description">Description :</label><br>
                    <textarea name="description" id="description" cols="100"></textarea>
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </div>
    </div>
</body>

</html>