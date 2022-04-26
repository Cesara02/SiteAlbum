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
    
        <?php
            try {
                $req = $db->query("SELECT * FROM albums");
            ?>
                <table border = "1" cellpadding="5">
                    <tr>
                        <th>Nom</th>
                        <th>Artiste</th>
                        <th>Genre</th>
                        <th>Contributeur</th>
                        <th>Note</th>
                    </tr>
                <?php
                //On affiche le résultat
                while ($tab = $req->fetch_assoc()){
                    echo "<tr><td> {$tab['nom']}</td><td>{$tab['artiste']}</td><td> {$tab['genre']}</td><td> {$tab['id_nom_utilisateur']}</td><td> {$tab['note']}</td></tr>\n";
                }
            }catch(exception $e){
                die('Erreur '.$e->getMessage());
            }
    ?>
    <p></p>

    </body>
</html>