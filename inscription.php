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
                <form>
                    <div>
                        <label for="nom">Nom :</label> <br>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div>
                        <label for="email">Email :</label> <br>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="motdepasse">Mot de passe :</label> <br>
                        <input type="password" id="motdepasse" name="motdepasse" required>
                    </div>
                    <div>
                        <label for="confirmationMotdepasse">Confirmation Mot de passe :</label> <br>
                        <input type="password" id="confirmationMotdepasse" name="confirmationMotdepasse" required>
                    </div>
                    <button type="submit">S'Inscrire</button>
                </form>
            </div>
            <hr>
            <div class="form-container">
                <h2>Connexion</h2>
                <form>
                    <div>
                        <label for="login-nom">Nom :</label><br>
                        <input type="text" id="login-nom" name="login-nom" required>
                    </div>
                    <div>
                        <label for="login-motdepasse">Mot de passe :</label><br>
                        <input type="password" id="login-motdepasse" name="login-motdepasse" required>
                    </div>
                    <button type="submit">Se Connecter</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>