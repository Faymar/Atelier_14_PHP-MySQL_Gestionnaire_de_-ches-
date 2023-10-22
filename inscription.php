<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion et Creation</title>
</head>

<body>
    <div class="navbar">
        <h1>Création de compte et Connexion</h1>
    </div>
    <div class="home">
        <div class="container">
            <div class="form-container">
                <h2>Inscription</h2>
                <form method="post" action="validationInscription.php">
                    <div>
                        <label for="nomUser">Nom :</label> <br>
                        <input class="form-input" type="text" id="nom" name="nomUser" required>
                    </div>
                    <div>
                        <label for="email">Email :</label> <br>
                        <input class="form-input" type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="motdepasse">Mot de passe :</label> <br>
                        <input class="form-input" type="password" id="motdepasse" name="motdepasse" required>
                    </div>
                    <div>
                        <label for="confirmationMotdepasse">Confirmation Mot de passe :</label> <br>
                        <input class="form-input" type="password" id="confirmationMotdepasse" name="confirmationMotdepasse" required>
                    </div>
                    <button type="submit">S'Inscrire</button>
                </form>
            </div>
            <hr>
            <div class="form-container">
                <h2>Connexion</h2>
                <form method="post" action="validationConx.php">
                    <div>
                        <label for="email">Email :</label><br>
                        <input class="form-input" type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="motdepasse">Mot de passe :</label><br>
                        <input class="form-input" type="password" id="motdepasse" name="motdepasse" required>
                    </div>
                    <button type="submit">Se Connecter</button>
                </form>
                <a href="passforget.php">Mot De Passe Oublie ?</a>
            </div>
        </div>
    </div>

</body>

</html>