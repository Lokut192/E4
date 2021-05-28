<?php include("login.php");?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Changer mot de passe</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="stylePassword.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <div class="principal">
            <h1>Changer le mot de passe</h1>
            <form name="changerMDP" class="frmMDP" method="post">
                <center>
                    <table>
                        <tr>
                            <td class="label">
                                Ancien mot de passe :
                            </td>
                            <td>
                                <input type="password" class="saisieMDP" name="ancienMDP">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">
                                Nouveau mot de passe :
                            </td>
                            <td>
                                <input type="password" class="saisieMDP" name="newMDP">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">
                                Confirmer mot de passe :
                            </td>
                            <td>
                                <input type="password" class="saisieMDP" name="confirmMDP">
                            </td>
                        </tr>
                    </table>
                </center>

                <br><br>

                <center><input type="submit" value="Valider" class="validerMDP"></center>
            </form>
            <?php
            //Gestion du changement de mot de passe en back end
            if(isset($_POST['ancienMDP']) && isset($_POST['newMDP']) && isset($_POST['confirmMDP'])){
                $ancien = $_POST['ancienMDP'];
                $new = $_POST['newMDP'];
                $confirm = $_POST['confirmMDP'];
                //On vérifie que les saisies ne sont pas vides et pas remplis d'espaces
                if(!empty(trim($ancien)) && !empty(trim($new)) && !empty(trim($confirm))){
                    //On vérifie que le nouveau MDP et celui de confirmation correspondent
                    if($new == $confirm){
                        //On verifie au moins que le mot de passe fait 8 caractères ou plus sans compter les espaces
                        if(strlen(trim($new)) >= 8){
                            //On verifie maintenant que l'ancien mot de passe est correct
                            include_once 'connexionBDD.php';
                            $req = $bdd->prepare('SELECT password FROM ROLES WHERE login = :login');
                            $req->bindValue(':login', $_SESSION['id'], PDO::PARAM_STR);
                            $req->execute();
                            $donnees = $req->fetch();
                            $mdp = $donnees['password'];
                            //On regarde si la requête ne renvoit pas false donc qu'il y a des données
                            if($donnees){
                                //On verifie que les deux mots de passe correspondent
                                if(password_verify($ancien, $mdp) || $ancien = $mdp){
                                    //On remplace maintenant l'ancien mot de passe par le nouveau
                                    $req = $bdd->prepare('UPDATE ROLES SET password = :new WHERE login = :login');
                                    $req->bindValue(':new', password_hash($new, PASSWORD_ARGON2I), PDO::PARAM_STR);
                                    $req->bindValue(':login', $_SESSION['id'], PDO::PARAM_STR);
                                    try{
                                        $req->execute();
                                        echo '<p class="confirmation">Votre mot de passe a bien été changé.</p>';
                                    }
                                    catch(PDOException $e){
                                        echo '<p class="avertissement">Une erreur s\est produite.</p>';
                                    }
                                }
                                else{
                                    //Sinon on affiche un message d'erreur
                                    echo '<p class="avertissement">ATTENTION ! L\'ancien mot de passe ne correspond pas !</p>';
                                }
                            }
                            else{
                                //Sinon on affiche un message d'erreur
                                echo '<p class="avertissement">Nous n\'avons pas réussi à vous retrouver dans la base de données.</p>';
                            }
                        }
                        else{
                            echo '<p class="avertissement">ATTENTION ! Le nouveau mot de passe doit être au moins de 8 caractères !</p>';
                        }
                    }
                    else{
                        echo '<p class="avertissement">ATTENTION ! Le nouveau mot de passe et celui de confirmation ne sont pas les mêmes</p>';
                    }
                }
                else{
                    //Sinon on affiche un message d'erreur clair
                    echo '<p class="avertissement">ATTENTION ! Tous les champs doivent être remplis !</p>';
                }
            }
            ?>
        </div>
        <?php include("pied.php"); ?>
    </body>
</html>
