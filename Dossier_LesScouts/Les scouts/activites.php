<?php include("login.php");?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styleActivites.css"/>
        <title>activites | Eclaireurs d'Illkirch</title>
    </head>
    <body>
        <?php include("menu.php"); ?>
        <div class="principal">
            <h2>Activités</h2>
            <p id = "a"><span>&#128712;</span> Attention pour inscrire votre enfant a une activité vous devez d'abord vous connecter</p>
            <p></p>
            <p id = "b"> Pour visualiser les activités prévues veuillez choisir un jour dans le calendrier ci-dessous : </p>
            
            <?php include("calendrier.php"); ?>
            
            </div>

            <?php include("pied.php");?>
            
    </body>
</html>
   
       
        