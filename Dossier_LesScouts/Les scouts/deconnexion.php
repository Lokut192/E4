<?php
    session_start();
    //Je créé une variable pour gérer l'affichage
    $affichage = null;
    //On vérifie tout d'abord si les variables superglobales existent
    if(isset($_SESSION['id'])){
        unset($_SESSION['id']);
        if(isset($_SESSION['habilitation'])){
            unset($_SESSION['habilitation']);
            session_destroy();

            //Pour une déconnexion complète on doit vérifier que les cookies sont supprimés
            if(isset($_COOKIE['login'])){
                //on donne une valeur nulle au cookie pour le supprimer
                setcookie('login',NULL, -1);
                if(isset($_COOKIE['habilitation'])){
                    setcookie('habilitation',NULL, -1);
                }
            }
            $affichage = 'Vous avez bien été déconnecté(e) !';
        }
    }
    else{
        $affichage = 'Vous n\'étiez pas connecté !';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href = "styleDeconnexion.css"/>
        <title>Déconnexion | Eclaireurs d'Illkirch</title>
    </head>
    <body>
        <?php
            include("menu.php");
            //Lien pour retourner à l'accueil
        ?>
        <div class="principal">
            <h1>Déconnexion</h1>
            <br><br>
            <h2 id="infoSess"><?php echo $affichage;?></h2></h2>
            <br><br>
            <p>Lien vers la page d'accueil :&nbsp;<a href="accueil.php" id="linkAccueil">Page d'accueil</a></p>
        </div>
    </body>
</html