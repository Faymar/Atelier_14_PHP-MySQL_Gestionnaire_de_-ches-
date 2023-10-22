<!-- id	nom	description	date_echeance	priorite	etat	id_utilisateur	 -->

<?php
require('bd.php');
session_start();

if (isset($_SESSION['id'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $regex_text = "/^[a-zA-Z0-9 ']{2,}$/";
        $erros = [];

        if (empty($_POST["titre"])) {
            $erros[] =  "Le titre  est obligatoire.";
        }
        if (empty($_POST["priorite"])) {
            $erros[] =  "La priorite est obligatoire.";
        }
        if (empty($_POST["etat"])) {
            $erros[] =  "L' etat est obligatoire.";
        }
        if (empty($_POST["date_echeance"])) {
            $erros[] =  "La date d'echeance est obligatoire.";
        }
        if (empty($_POST["description"])) {
            $erros[] =  "La description est obligatoire.";
        }

        if (!preg_match($regex_text, $_POST["titre"])) {
            $erros[] = "titre est invalide.";
        }

        if (!preg_match($regex_text, $_POST["priorite"])) {
            $erros[] = "priorite est invalide.";
        }

        if (!preg_match($regex_text, $_POST["etat"])) {
            $erros[] = "etat est invalide.";
        }

        if (!preg_match($regex_text, $_POST["description"])) {
            $erros[] = "description est invalide.";
        }

        if (!empty($erros)) {
            echo "<table>";
            foreach ($erros as $er) {
                echo  "<tr><td>" . $er . "</td></tr>";
            }
            echo  "</table>";
        } else {
            $titre = $_POST['titre'];
            $priorite = $_POST['priorite'];
            $etat = $_POST['etat'];

            $date = date_create_from_format('Y-m-d\TH:i', $_POST['date_echeance']);
            $date_echeance = date_format($date, 'Y-m-d H:i:s');
      
            $description = $_POST['description'];
            $id_utilisateur = $_SESSION['id'];
            var_dump($date_echeance);

            $sql = 'INSERT INTO `taches` (nom, `description`, date_echeance, priorite, etat, id_utilisateur	) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(1, $titre);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $date_echeance);
            $stmt->bindParam(4, $priorite);
            $stmt->bindParam(5, $etat);
            $stmt->bindParam(6, $id_utilisateur);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header("Location:accueil.php");
            }
            $db = null;
        }
    }
} else {
    header("Location: inscription.php");
}
