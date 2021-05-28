<!DOCTYPE html>
<html>
    <head>
        <met charset="utf-8"/>
        <link rel="stylesheet" href="styleMenu.css"/>
    </head>
    <body>
        <a href="index.php"><img src="images/logo.png" id="logo"/></a>
        
        <header>
            <div id="hamburger">
                <div id="hamburger-content">
                    <nav>
                        <ul class="menuPrincipal">
                            <li><a href="activites.php">Activités</a></li>
                            <li><a href="inscriptions.php">Inscriptions</a></li>
                            <li><a href="Nousconnaitre.php">Nous connaître</a>
                                <ul class ="submenu">
                                    <li><a href="Nousconnaitre.php#organisation">Organisation</a></li>
                                    <li><a href="Nousconnaitre.php#histoire">Histoire</a></li>
                                    <li><a href="Nousconnaitre.php#fondation">Fondation</a></li>
                                </ul>
                            </li>
                                <?php
                                    //On a besoin de savoir si l'utilisateur est connecté ou non pour savoir quoi affiché
                                    if(!isset($_SESSION['id']) AND !isset($_SESSION['habilitation'])){
                                ?>
                                        <li><a href="connexion.php">Connexion</a></li>
                                <?php
                                    }
                                    else{
                                        if(isset($_SESSION['id']) AND isset($_SESSION['habilitation'])){
                                            //Je vais me connecter à la bdd pour récupérer le nom et le prénom de l'utilisateur
                                            include("connexionBDD.php");
                                            //On regarde le niveau d'habilitation pour savoir dans quelle table de la bdd chercher les infos
                                            //On fait un affichage particulier pour l'administrateur puisqu'il a une habilitation unique
                                            if($_SESSION['habilitation'] == 1){
                                                //On ne ferme pas l'élémment de la liste du menu pour ajouter par la suite un sous-menu
                                                ?>
                                                <li id="sessAdmin">Administrateur
                                                <?php
                                            }
                                            //Habilitation d'un responsable
                                            if($_SESSION['habilitation'] == 2){
                                                $reponse = $bdd->query('SELECT * FROM RESPONSABLE R JOIN ROLES O ON R.idRole=O.id WHERE O.id = (SELECT id FROM ROLES WHERE login=\''.$_SESSION['id'].'\')');
                                                while($donnees = $reponse->fetch()){
                                                    $nom = $donnees['nom'];
                                                    $prenom = $donnees['prenom'];
                                                    $sexe = $donnees['sexe'];
                                                }
                                                ?>
                                                <li><?php if($sexe=='M') echo 'Mr.&nbsp;'; else echo'Mme.&nbsp;'; echo strtoupper($nom).'&nbsp;'.$prenom;?>
                                                <?php
                                            }
                                            //Habilitation d'un parent
                                            if($_SESSION['habilitation'] == 3){
                                                $nom = null;
                                                $prenom = null;
                                                $sexe = null;
                                                $req = $bdd->prepare('SELECT * FROM PARENT P JOIN ROLES R ON P.idRole=R.id WHERE R.login=:login');
                                                $req->bindValue(':login', $_SESSION['id'], PDO::PARAM_STR);
                                                $req->execute();
                                                $donnees = $req->fetch();
                                                $nom = $donnees['nom'];
                                                $prenom = $donnees['prenom'];
                                                $sexe = $donnees['sexe'];
                                                ?>
                                                <li><?php if($donnees){if($sexe=='M') echo 'Mr.&nbsp;';  if($sexe=='F') echo'Mme.&nbsp;'; echo
                                                    strtoupper($nom).'&nbsp;'.$prenom;} else echo 'Mon compte';?>
                                                <?php
                                            }
                                            ?>

                                            <ul class = "submenu">
                                                <li>Mes informations</li>
                                                <?php if($_SESSION['habilitation']==3){?><li>Mon/mes enfant(s)</li><?php }?>
                                                <li><a href="password.php">Changer mon mot de passe</a></li>
                                                <li><a href ="deconnexion.php" id="deconnexion">Deconnexion</a></li>
                                            </ul></li>
                                        <?php
                                        }
                                    }
                                ?>
                        </ul>
                    </nav>
                </div>
                <div id="button-container">
                    <button id="hamburger-button">&#9776;</button>
                </div>
                <div id="hamburger-sidebar">
                    <div id="hamburger-sidebar-header"></div>
                    <div id="hamburger-sidebar-body"></div>
                </div>
                <div id="hamburger-overlay"></div>
            </div>
        </header>

        <script type="text/javascript" src="scriptMenu.js"></script>

    </body>
</html>