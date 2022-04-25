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

<nav>
        <h1>
            <!--Le titre de ma page-->
            <FONT color="black">
            <FONT face="arial">
            <FONT size="5px">
                Site Album
            </FONT>
            </FONT>
            </FONT>
        </h1>
    </nav>

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
            <label for="album"> Nom de l'album </label>
            <input type="text" name="album" id="album" required>
            <label for="artiste"> Artiste </label>
            <input type="text" name="artiste" id="artiste" required>
            <label for="genre"> Genre </label>
            <input type="text" name="genre" id="genre" required>
            <input type="submit" value="Envoyer">
            <input type="reset" value="Remise à zéro">
        </form>
    </div>

    <?php
        if (!empty($_POST["album"] && $_POST["artiste"] && $_POST["genre"])) {
            $req = $db->query("INSERT INTO albums (`id`, `nom`, `artiste`, `genre`, `id_nom_utilisateur`) VALUES (NULL, '".$_POST["album"]."', '".$_POST["artiste"]."', '".$_POST["genre"]."', '".$_SESSION["username"]."')");
            echo "Félicitation, l'album est ajoutée !";
        }
    ?>

    </body>
</html>