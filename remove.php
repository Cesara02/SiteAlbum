<?php
session_start();

    // connexion à la base de données
    $db_username = '256339';
    $db_password = 'bordrez0908cesar2207';
    $db_name     = 'bordrezcesar_album';
    $db_host     = 'mysql-bordrezcesar.alwaysdata.net';

    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
        or die('Impossible de se connecter à la BDD !');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='add.css'>
    <title>Ajouter</title>
</head>

<body>

        <?php
        if($_SESSION['username'] !== ""){
            $user = $_SESSION['username'];
            // afficher un message
            echo "Bonjour $user, vous êtes connecté";
        }
        ?>

        <a href='index.php'><span>Déconnexion</span></a>

        <ul>
            <li><a href="principale.php">Accueil</a></li>
            <li><a href="add.php">Ajouter un album</a></li>
            <li><a href="liste.php">Consulter la liste</a></li>
            <li><a href="change.php">Modifier un album</a></li>
            <li><a href="remove.php">Supprimer un album</a></li>
        </ul>
    
    <div class = "formulaire">
        <form action = "" method = "POST">
            <label for="nom"> Nom de l'album </label>
            <input type="text" name="nom" id="nom" required>
            <label for="artiste"> Artiste </label>
            <input type="text" name="artiste" id="artiste" required>
            <label for="genre"> Genre </label>
            <input type="text" name="genre" id="genre" required>
            <input type="submit" value="Envoyer">
            <input type="reset" value="Remise à zéro">
        </form>
    </div>

    <?php
        if (!empty($_POST["nom"] && $_POST["artiste"] && $_POST["genre"])) {
            $req = $db->query("DELETE FROM albums WHERE nom = '".$_POST["nom"]."' && artiste = '".$_POST["artiste"]."' && genre = '".$_POST["genre"]."' && id_nom_utilisateur = '".$_SESSION["username"]."'");
            echo "Félicitation, l'album est supprimé !";
        }
    ?>

    </body>
</html>