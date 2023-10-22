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
                <h2>Mot de passe oublie ?</h2>
                <form method="post" action="updatepass.php">
                    <div>
                        <label for="email">Donnez Votre Email:</label> <br>
                        <input class="form-input" type="email" id="email" name="email" required>
                    </div>
                    <button type="submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>