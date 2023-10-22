<?php
require('bd.php');
session_start();
$id = $_SESSION['id'];
$encours = 'en cours';
$afaire = 'a faire';
$terminee = 'terminee';

$sql1 = 'SELECT COUNT(*) AS encours FROM `taches` WHERE `etat` = ? AND `id_utilisateur` = ?';
$stmt1 = $conn->prepare($sql1);

$stmt1->bindParam(1, $encours);
$stmt1->bindParam(2, $id);

$stmt1->execute();

$result = $stmt1->fetch();
$nbencours = $result['encours'];


$sql2 = 'SELECT COUNT(*) AS afaire FROM `taches` WHERE `etat` = ? AND `id_utilisateur` = ?';
$stmt2 = $conn->prepare($sql2);

$stmt2->bindParam(1, $afaire);
$stmt2->bindParam(2, $id);

$stmt2->execute();

$result2 = $stmt2->fetch();
$nbafaire = $result2['afaire'];


$sql3 = 'SELECT COUNT(*) AS terminee FROM `taches` WHERE `etat` = ? AND `id_utilisateur` = ?';
$stmt3 = $conn->prepare($sql3);

$stmt3->bindParam(1, $terminee);
$stmt3->bindParam(2, $id);

$stmt3->execute();

$result3 = $stmt3->fetch();
$nbterminee = $result3['terminee'];




?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="profil.css">
    <title>Document</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card p-3 py-4">
            <div class="text-center">
            <i class="fa fa-user fa-3x"  class="rounded-circle"></i>
                <!-- <img src="https://i.imgur.com/stD0Q19.jpg" width="100" class="rounded-circle"> -->
                <h3 class="mt-2"><?= $_SESSION['nom_utilisateur'] ?></h3>
                <span class="mt-1 clearfix">Android Developer</span><br>
                <span class="mt-1 clearfix">Resume des taches</span>

                <div class="row mt-3 mb-3">

                    <div class="col-md-4">
                        <h6>EN Cours</h6>
                        <span class="num"><?= $nbencours ?></span>
                    </div>
                    <div class="col-md-4">
                        <h6>A Faire</h6>
                        <span class="num"><?= $nbafaire ?></span>
                    </div>
                    <div class="col-md-4">
                        <h6>Terminee</h6>
                        <span class="num"><?= $nbterminee ?></span>
                    </div>

                </div>

                <hr class="line">

                <small class="mt-4">Application de gestion des taches de Simplon Senegal</small>
                <div class="social-buttons mt-5">
                    <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button>
                    <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button>
                    <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button>
                    <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button>
                    <button class="neo-button"><i class="fa fa-twitter fa-1x"></i> </button>
                </div>

                <div class="profile mt-5">

                    <a href="accueil.php" class="profile_button px-5">Liste Des Taches</a>

                </div>

            </div>
        </div>
    </div>

</body>

</html>