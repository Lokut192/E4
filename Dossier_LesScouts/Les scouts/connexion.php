<?php
    //Ouverture de la session
    session_start();
?>
<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styleConnexion.css"/>
        <title>Connexion | Eclaireurs d'Illkirch</title>
    </head>

    <body>
        <?php include("menu.php");?>

        <div class="principal">
            <?php
                //On considère avant toute saisie que l'id n'a pas été trouvé
                $idTrouve = false;

                $sauvID=null;
                if(!empty($_POST['identifiant'])){
                    $sauvID = $_POST['identifiant'];
                }
            ?>
            <center>
            <form method="post" action="">
                <fieldset>
                    <legend>Connexion</legend>
                        <p class="info"><span>&#128712;</span> Vos identifiants vous sont fournis par l'association lors de l'inscription de votre enfant.</p>
                        <br>
                        <label class="lblCo">Identifiant :</label><br>
                        <input type="text" class="saisies" name="identifiant" id="identifiant" value="<?php echo $sauvID;?>" autofocus/>
                        <div class="alert" id="alertIDManquant">
                            <p><em>&#9668;</em>Veuillez saisir votre identifiant !</p>
                        </div>
                        <div class="alert" id="alertIDFaux">
                            <p><em>&#9668;</em>Votre identifiant n'a pas été trouvé dans la base de donnée ! <br>Veuillez saisir un identifiant valide.</p>
                        </div>
                        <br><br>
                        <label class="lblCo">Mot de passe :</label><br>
                        <input type="password" class="saisies" name="mdp" id="mdp"/>
                        <div class="alert" id="alertMDP">
                            <p><em>&#9668;</em>Veuillez saisir un mot de passe valide !</p>
                        </div>
                        <br><br>
                        <input type="checkbox" name="resteConnecte" id="resteConnecte"/><label>&nbsp;Rester connecté(e)</label>
                        <br><br>
                        <input type="submit" value="Connexion" id="envoyer" name="envoyer"/>
                        

                        <?php
                            if(isset($_POST['envoyer']) and !empty($_POST['identifiant'])){
                                //Je remets à zéro les affichages d'alerte avant de vérifier l'identifiant et le mot de passe
                                //et pour éviter qu'il soit persistant d'une saisie à une autre
                                ?>
                                <style>
                                    #identifiant{
                                        background-color : none;
                                    }
                                    #alertIDFaux{
                                        display : none;
                                    }
                                    #mdp{
                                        background-color : none;
                                    }
                                    #alertMDP{
                                        display : none;
                                    }
                                </style>
                                <?php
                                if(!empty($_POST['mdp'])){
                                    try{
                                        //Je me connecte à la base de donnée
                                        include("connexionBDD.php");
                                        //je récupère les infos nécessaires dans la base de données
                                        $req = $bdd->query('SELECT login, password, level FROM ROLES');
                                        //Je regarde mainttenant dans la base de données si nous avons une correspondance avec les saisies de l'utilisateur:
                                        while($donnees = $req->fetch()){
                                            //On regarde si on a une correspondance avec l'identifiant
                                            if($_POST['identifiant'] == $donnees['login']){
                                                //On signal que l'id a été trouvé dans la base de donnée pour éviter d'afficher le message d'erreur associé
                                                $idTrouve = true;
                                                //on regarde si le mot de passe est correct
                                                if(password_verify($_POST['mdp'], $donnees['password']) || $_POST['mdp'] == $donnees['password']){
                                                    //Si tout est correct on garde certaines infos dans les variables de session mais surtout pas le mot de passe
                                                    $_SESSION['id'] = $donnees['login'];
                                                    $_SESSION['habilitation'] = $donnees['level'];
                                                    //on créer des cookies si l'utilisateur souhaite rester connecté avec une durée de 1 an pour être large
                                                    if(isset($_POST['resteConnecte'])){
                                                        setcookie('login', $donnees['login'], time() + 60 * 60 * 24 * 365, null, null, false, true);
                                                        setcookie('habilitation', $donnees['level'], time() + 60 * 60 * 24 * 365, null, null, false, true);
                                                    }
                                                    ?>
                                                    <script>
                                                        document.location.href="accueil.php";
                                                    </script>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <style>
                                                        #mdp{
                                                            background-color : rgba(255,50,0,0.3);
                                                        }
                                                        #alertMDP{
                                                            display : block;
                                                        }
                                                    </style>
                                                    <?php
                                                }
                                            }
                                            else{
                                                if(!$idTrouve){
                                                    $idTrouve = false;
                                                }
                                            }

                                        }
                                        //Si l'identifiant saisi par l'utilisateur n'a pas été trouvé, on le dit
                                        if($idTrouve == false){
                                            ?>
                                            <style>
                                                #identifiant{
                                                    background-color : rgba(255,50,0,0.3);
                                                }
                                                #alertIDFaux{
                                                    display : block;
                                                }
                                            </style>
                                            <?php
                                        }
                                    }
                                    catch(Exception $e){
                                        if($e->getMessage()=='SQLSTATE[HY000] [1045] Accès refusé pour l\'utilisateur: \''.$_POST['identifiant'].'\'@\'@localhost\' (mot de passe: OUI)'){
                                            echo '<br><br><p style="color : red; font-weight : bold;"><i style="font-style : normal;font-size : 22px;">&#9888;</i> Veuillez sairsir un Identifiant et un Mot de Passe valide !</p>';
                                        }
                                        else{
                                            echo 'Une erreur s\'est produite lors de la connexion à la base de donnée de l\'association !';
                                        }
                                    }
                                }
                                else{
                                    ?>
                                    <style>
                                        #mdp{
                                            background-color : rgba(255,50,0,0.3);
                                        }
                                        #alertMDP{
                                            display : block;
                                        }
                                    </style>
                                    <?php
                                }
                            }
                            else{
                                if(isset($_POST['envoyer'])){
                                    ?>
                                    <style>
                                        #identifiant{
                                            background-color : rgba(255,50,0,0.3);
                                        }
                                        #alertIDManquant{
                                            display : block;
                                        }
                                    </style>
                                    <?php
                                }
                            }
                        ?>

                </fieldset>
            </form>
            </center>
        </div>
    </body>
</html>