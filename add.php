<?php include ("album.php"); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title> Ajouter </title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/70/70310.png">
        <link rel="stylesheet" href="accueil.css" media="screen" type="text/css" />
    </head>

    <body>
        <!-- Menu -->
        <div class="scrollmenu">
            <a href="insert.html">Ajouter</a>
            <a href="update.html">Modifier</a>
            <a href="select.html">Consulter</a>
            <a href="delete.html">Supprimer</a>
        </div>

        <div id="center">
            <h1>Ajouter un album</h1>
        </div>

        <div class="align"> 
            <form action="" method="POST">
                    
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le nom de l'album" name="nom" required>

                <label><b>Artiste</b></label>
                <input type="text" placeholder="Entrer le nom de l'artiste" name="artiste" required>

                <label><b>Genre</b></label>
                <select name="genre" id="genre" name="genre" required>
                    <option value=""> </option>
                    <option value="dog">Rap</option>
                </select>
                <input type="submit" id='add' value='➕' >
            </form>
        </div>

        <?php 
        
        if(isset($_POST['nom']) && isset($_POST['artiste'])  && isset($_POST['genre'])) {
            $db_username = '256339';
            $db_password = 'bordrez0908cesar2207';
            $db_name     = 'bordrezcesar_album';
            $db_host     = 'mysql-bordrezcesar.alwaysdata.net';

            $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
                or die('Impossible de se connecter à la BDD');

            // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
            // pour éliminer toute attaque de type injection SQL et XSS
            $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom'])); 
            $artiste = mysqli_real_escape_string($db,htmlspecialchars($_POST['artiste']));
            $genre = mysqli_real_escape_string($db,htmlspecialchars($_POST['genre']));

            $album = new album ($nom, $artiste, $genre);

            $req = "INSERT INTO `albums` (`nom`, `artiste`, `genre`) VALUES ('".$nom."', '".$artiste."', '".$genre."');";
            $pdo->query($req);
        }
        ?>
    </body>
</html>