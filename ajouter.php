<?php  include ( "album.php" ); ?>
< html >
    < tête >
        < jeu de caractères méta  =" utf-8 " >
        < titre > Ajouter </ titre >
        < lien  rel =" icône " href =" https://cdn-icons-png.flaticon.com/512/70/70310.png " >
        < link  rel =" feuille de style " href =" accueil.css " media =" screen " type =" text/css " />
    </ tête >

    < corps >
        <!-- Menu -->
        < div  class =" scrollmenu " >
            < a  href =" insert.html " > Ajouter </ a >
            < a  href =" update.html " > Modificateur </ a >
            < a  href =" select.html " > Consulter </ a >
            < a  href =" delete.html " > Supprimer </ a >
        </ div >

        < id div  =" centre " >
            < h1 > Ajouter un album </ h1 >
        </ div >

        < classe div  =" aligner " > 
            < action de formulaire  ="" méthode =" POST " >
                    
                < étiquette > < b > Nom </ b > </ étiquette >
                < input  type =" text " placeholder =" Entrer le nom de l'album " name =" nom " obligatoire >

                < label > < b > Artiste </ b > </ label >
                < input  type =" text " placeholder =" Entrer le nom de l'artiste " name =" artiste " obligatoire >

                < étiquette > < b > Genre </ b > </ étiquette >
                < select  name =" genre " id =" genre " name =" genre " requis >
                    < option  value ="" >  </ option >
                    < option  value =" chien " > Rap </ option >
                </ sélectionner >
                < type d'entrée  =" soumettre " id =' ajouter ' valeur =' ➕ ' >
            </ formulaire >
        </ div >

        <?php 
        
        if ( isset ( $ _POST [ 'nom' ]) && isset ( $ _POST [ 'artiste' ]) && isset ( $ _POST [ 'genre' ])) {
            $ db_username = '256339' ;
            $ db_password = 'bordrez0908cesar2207' ;
            $ db_name      = 'bordrezcesar_album' ;
            $ db_host      = 'mysql-bordrezcesar.alwaysdata.net' ;

            $ db = mysqli_connect ( $ db_host , $ db_username , $ db_password , $ db_name )
                ou mourir ( 'Impossible de se connecter à la BDD' );

            // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
            // pour supprimer toute attaque de type injection SQL et XSS
            $ nom = mysqli_real_escape_string ( $ db , htmlspecialchars ( $ _POST [ 'nom' ]));
            $ artiste = mysqli_real_escape_string ( $ db , htmlspecialchars ( $ _POST [ 'artiste' ]));
            $ genre = mysqli_real_escape_string ( $ db , htmlspecialchars ( $ _POST [ 'genre' ]));

            $ album = nouvel album ( $ nom , $ artiste , $ genre );

            $ req = "INSERT INTO `albums` (`nom`, `artiste`, `genre`) VALUES ('" . $ nom . "', '" . $ artiste . "', '" . $ genre . "' );" ;
            $ pdo -> requête ( $ req );

            if (isset($POST["AlbumUpdate"])){
                $Crud="U1";
            }

            if (isset($POST["AlbumUpdate2"])){
               $Crud="U2";
               $AlbumNom = $_POST["AlbumNom"];
               $ArtisteNom = $_POST["ArtisteNom"];
               $UtilisateurId = $_POST["IdUpdate"];
           }
           ?>

            
            if($BasePDO){
                $req = "SELECT * FROM informations ORDER BY identifiant DESC";
                $RequetStatement = $BaqePDO->query($req);
                if($RequetStatement){
                    ?>
                    <form action="" metof="post" class="formSup">
                        <table>
                            <?php
                            while($Tab=$RequetStatement->fetch()){
                                ?>
                                <tr>
                                    <?php
                                    echo "<td>".$Tab[0]."<td>";
                                    if($Crud == 'U1' && $Tab[0]==$_POST["IdUpdate"]){
                                        ?>
                                        <td colspan="4">
                                            <form action="" method="POST">
                                                <input  type ="hidden" name="idUpdate" value="<?php echo $Tab[0]?>">
                                                <input  type ="text" name="AlbumNom" value="<?php echo $Tab[1]?>"autofocus class="inputUpdate">
                                                <input  type ="text" name="ArtisteNom" value="<?php echo $Tab[2]?>"autofocus class="inputUpdate">
                                                <input  type ="submit" name="AlbumSubmit" value="Valider" class="ButtonUpdate">
                                             </form>  
                                        </td>  
                                    }
                }
            }
        
            
            ?>
    </ corps >
</ html >