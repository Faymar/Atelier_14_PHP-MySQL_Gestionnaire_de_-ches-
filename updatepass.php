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
        <h1>Modifier Mot de Passe</h1>
    </div>
    <div class="home">
        <div class="container">
            <div class="form-container">
                <h2>Inscription</h2>
                <form>
                    <div>
                        <label for="olderpasse">Ancien Mot de passe :</label> <br>
                        <input type="password" id="motdepasse" name="motdepasse" required>
                    </div>
                    <div>
                        <label for="motdepasse">Nouveau Mot de passe :</label> <br>
                        <input type="password" id="motdepasse" name="motdepasse" required>
                    </div>
                    <div>
                        <label for="confirmationMotdepasse">Confirmation Nouveau Mot de passe :</label> <br>
                        <input type="password" id="confirmationMotdepasse" name="confirmationMotdepasse" required>
                    </div>
                    <button type="submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>