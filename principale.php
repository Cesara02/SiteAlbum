<?php 
    include ("album.php"); 
    $MaBase = new PDO('mysql:host=mysql-bordrezcesar.alwaysdata.net;dbname=bordrezcesar_album', '256339', 'bordrez0908cesar2207');
?>

<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">

            <a href='index.php'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "Bonjour $user, vous êtes connecté";
                }
            ?>
        </div>
        <p> </p>
        <div class = "affiche">
            <form action="" method="post" class="form-example">
                <label for="Album">Nom de l'album</label>
                <input type="text" name="Album" id="Album" required>
                <label for="ArtisteName">Artiste</label>
                <input type="text" name="ArtisteName" id="ArtisteName" required>
                <select name="genre" id="genre">
                    <option value=""> </option>
                    <option value="Rap">Rap</option>
                    <option value="Rock">Rock</option>
                    <option value="Variété Française">Variété Française</option>
                    <option value="Jazz">Jazz</option>
                    <option value="Blues">Blues</option>
                    <option value="Rn'B">Rn'B</option>
                </select>

                <input type="submit" name="AlbumSubmit" value="➕">
            </form>
        </div>
        <?php

        if (!empty($_POST["Album"] && $_POST["ArtisteName"] && $_POST["genre"])) {
            try {
                $req = $MaBase->query("INSERT INTO albums (`id`, `nom`, `artiste`, `genre`, `id_nom_utilisateur`) VALUES (NULL, '".$_POST["Album"]."', '".$_POST["ArtisteName"]."', '".$_POST["genre"]."', '".$_SESSION["username"]."')");
                echo "Félicitation, l'album est ajoutée !";

            } catch(exception $e) {
                die('Erreur '.$e->getMessage());
            }
        }
        ?>
        <?php
        try {
            $req = $MaBase->query("SELECT * FROM album");
        ?>
            <!-- On crée un tableau pour rangée les films ainsi que les notes -->
            <table width="50%" border="1" cellpadding="5">
                <tr>
                    <th>Nom</td>
                    <th>Artiste</td>
                    <th>Genre</td>
                    <th>Contributeur</td>
                </tr>
            <?php
            //On affiche le résultat
            while ($tab = $req->fetch()){
                echo "<tr><td> {$tab['Nom']}</td><td>{$tab['Artiste']}</td><td> {$tab['Genre']}</td><td> {$tab['Contributeur']}</td></tr>\n";
            }
        }catch(exception $e){
            die('Erreur '.$e->getMessage());
        }
        ?>
    </body>
</html>
