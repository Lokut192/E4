<?php
    //Ouverture de la session
    include("login.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Toutes les Inscriptions</title>
        <meta charset = "utf-8"/>
        <link rel="stylesheet" href="styleToutesInscriptions.css"/>
    </head>
    <body>
        <?php include("menu.php"); ?>

        <div class="principal">
            <?php
                //On fait quand même une vérfication comme quoi c'est bien l'administrateur qui souhaite accéder à cette page
                if(isset($_SESSION['habilitation'])){
                    if($_SESSION['habilitation'] == 1){
                        //Maintenant on va mettre le lien pour que l'administrateur puisse choisir entre inscrire un parent ou un enfant
                        ?>
                        <h1>Espace administrateur<h1>
                            <p>Pour inscrire un enfant cliquez sur le lien : <a href="inscriptionEnfant.php">inscriptionEnfant.php</a></p>
                        <?php

                    }
                    else{
                        echo '<p id="alertAcces"><i style="font-style : normal;font-size : 24px;">&#9888;</i>&nbsp;&nbsp;ATTENTION ! Vous n\'avez pas l\'habilitation nécessaire pour accéder aux inscriptions !<br>Vous devrez passer par un responsable pour la nouvelle inscription d\'un enfant.<p>';
                    }
                }
                else{
                    header("Location : connexion.php");
                }
            ?>
        </di>
    </body>
</html>