<?php include("login.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styleDate-info.css"/>
        <title>activites | Eclaireurs d'Illkirch</title>
    </head>
    <body>
        <?php include("menu.php"); ?>
        <?php $list_act=array("Activité");?>
    
        <div class="principal">
            <center>
                <h1>Activités du jour : </h1>
                <h2>Pour inscrire votre enfant a une activité veuillez la sélectioner dans le tableau ci-dessous :</h2>
                <h3>Acivités des louvetaux </h3>
                <?php include("tableau.html");?>
                <h4>Activités des éclaireurs </h4>
                <?php include("tableau2.html");?>
                <h5>Activités des ainés </h5>
                <?php include("tableau3.html");?>
            </center>
        </div>
</html>        
        
       
        