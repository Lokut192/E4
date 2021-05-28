<?php
    //je mets la page qui me sert à vérifier la connexion de l'utilisateur
    include("login.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styleInscriptions.css"/>
        <title>Inscriptions | Eclaireurs d'Illkirch</title>
    </head>
    <body>
        <?php include("menu.php"); ?>
        <div class="principal">
            <h1>Inscriptions</h1>
            <br><br>
            <?php
                //On vérifie que l'utilisateur est connecté sinon on l'envoie sur la page de connexion
                if(isset($_SESSION['habilitation'])){
                    //On redirige l'utilisateur vers la page selon son habilitation
                    //Sur la page de redirection, une vérification supplémentaire sera faîte
                    if($_SESSION['habilitation']==1){
                        header("Location: toutesInscriptions.php");
                        exit;
                    }
                    if($_SESSION['habilitation']==2){
                        header("Location: inscriptionEnfant.php");
                        exit;
                    }
                    if($_SESSION['habilitation']==3){
                        //Affichage d'un message d'erreur car les parents n'ont pas le niveau d'habilitation nécecsaire pour accéder aux inscriptions
                        echo '<p id="alertAcces"><i style="font-style : normal;font-size : 24px;">&#9888;</i>&nbsp;&nbsp;ATTENTION ! Vous n\'avez pas l\'habilitation nécessaire pour accéder aux inscriptions !<br>Vous devrez passer par un responsable pour la nouvelle inscription d\'un enfant.<p>';
                    }
                }
                else{
                    header("Location: connexion.php");
                    exit;
                }
            ?>
        </div>
    </body>
</html>