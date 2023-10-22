<?php
session_start();
require('bd.php');

$sql = 'SELECT * FROM utilisateurs WHERE email = ?';
$stmt = $conn->prepare($sql);

$stmt->bindParam(1, $_POST['email']);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch();

    $password = $user['mot_de_passe'];
    var_dump($user['id']);

    if (md5($_POST['motdepasse']) === $password) {

        $_SESSION['id'] = $user['id'];
        $_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];

        header('Location: accueil.php');
    } else {
        echo 'email ou mot de passe est incorrect.';
    }
} else {
    echo '<h1>L\'utilisateur n\'existe pas.<h1>';
    echo '<h1><a href="inscription.php">retourner a la page d inscription</a> </h1><br>';

}

$pdo = null;
