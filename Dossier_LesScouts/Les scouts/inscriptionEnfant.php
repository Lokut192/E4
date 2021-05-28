<?php
    include("login.php");
    //On fait une vérification au cas où si l'utilisateur essaierai d'entrer directement l'url de cette page dans la barre de recherche
    if(!isset($_SESSION['id']) OR !isset($_SESSION['habilitation'])){
        header("Location: inscriptions.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styleInscriptionEnfant.css"/>
        <title>Inscription enfant | Eclaireurs d'Illkirch</title>
    </head>
    <body>
        <?php include("menu.php"); ?>
        <div class="principal" id="principal">
            <h1>Inscriptions</h1>
            <div id="boutons"><center><input type="button" class="btListe" id="btEnfants" value="liste enfants" onclick="afficherEnfants()"/><input type="button" onclick="afficherParents()" class="btListe" id="btParents" value="liste parents"/></center></div>
            <br><br>
            <p id="infoOblige">(*) Champ à caractère obligatoire</p>
            <br><br>

            <form name = "formEnfant" method="post" action = "traitementEnfant.php">
                <fieldset name = "enfant">
                    <legend>Jeune</legend>

                    <label>Nom* :</label><input type = "text" name = "nomEnfant" id="nomEnfant" autofocus required/>
                    <label>Prénom* :</label><input type = "text" name = "prenomEnfant" id="prenomEnfant" required/>
                    <label>Sexe* :</label><select name = "sexeEnfant" id="sexeEnfant"><option value="M" selected>Homme</option><option value ="F">Femme</option><option value="N">Autre</option></select>
                    <br><br>
                    <label>Date de naissance* :</label><input type = "date" name = "naissanceEnfant" id="naissanceEnfant" min=<?php echo dateMin();?> max=<?php echo dateMax();?> required/>
                    <br><br>
                    <label>Rue* :</label><input type = "text" name = "rueEnfant" id="rueEnfant" class="saisieRue" required/>
                    <br><br>
                    <label>Code Postal* :</label><input type = "text" name = "cpEnfant" id="cpEnfant" class="codePostal" minlength ="5" maxlength="5" required/>
                    <label>Ville* :</label><input type = "text" name = "villeEnfant" id="villeEnfant" required/>
                    <br><br>
                    <label>Téléphone :</label><input type = "tel" name = "telEnfant" id="telEnfant" class="tel" minlength ="10" maxlength="10"/>
                    <label>Mail :</label><input type = "email" name = "mailEnfant" id="mailEnfant" class="mail"/>

                </fieldset>
                <fieldset name = "parent1">
                    <legend>Parent 1</legend>

                    <label>Nom* :</label><input type = "text" name = "nomPar1" id="nomPar1" required/>
                    <label>Prénom* :</label><input type = "text" name = "prenomPar1" id="prenomPar1" required/>
                    <label>Sexe* :</label><select name = "sexePar1" id="sexePar1"><option value="M" selected>Homme</option><option value ="F">Femme</option><option value="N">Autre</option></select>
                    <br><br>
                    <label>Date de naissance* :</label><input type = "date" name = "naissancePar1" id="naissancePar1" required/>
                    <br><br>
                    <label>Rue* :</label><input type = "text" name = "ruePar1" id="ruePar1" class="saisiePar1" required/>
                    <br><br>
                    <label>Code Postal* :</label><input type = "text" name = "cpPar1" id="cpPar1" class="codePostal" minlength ="5" maxlength="5" required/>
                    <label>Ville* :</label><input type = "text" name = "villePar1" id="villePar1" required/>
                    <br><br>
                    <label>Téléphone* :</label><input type = "tel" name = "telPar1" id="telPar1" class="tel" minlength ="10" maxlength="10" required/>
                    <label>Mail* :</label><input type = "email" name = "mailPar1" id="mailPar1" class="mail" required/>
                </fieldset>
            
                <input type="checkbox" name="ajoutePar2" id="ajoutePar2" onclick="affichage()"/><label id="lblPar2">Ajouter un 2<sup>éme</sup> parent</label>

                <fieldset name = "parent2" id="parent2">
                    <legend>Parent 2</legend>

                    <label>Nom* :</label><input type = "text" name = "nomPar2" id="nomPar2"/>
                    <label>Prénom* :</label><input type = "text" name = "prenomPar2" id="prenomPar2"/>
                    <label>Sexe* :</label><select name = "sexePar2" id="sexePar2"><option value="M" selected>Homme</option><option value ="F">Femme</option><option value="N">Autre</option></select>
                    <br><br>
                    <label>Date de naissance* :</label><input type = "date" name = "naissancePar2" id="naissancePar2"/>
                    <br><br>
                    <label>Rue* :</label><input type = "text" name = "ruePar2" id="ruePar2" class="saisieRue"/>
                    <br><br>
                    <label>Code Postal* :</label><input type = "text" name = "cpPar2" id="cpPar2" class="codePostal" minlength ="5" maxlength="5"/>
                    <label>Ville* :</label><input type = "text" name = "villePar2" id="villePar2"/>
                    <br><br>
                    <label>Téléphone* :</label><input type = "tel" name = "telPar2" id="telPar2" class="tel" minlength ="10" maxlength="10"/>
                    <label>Mail* :</label><input type = "email" name = "mailPar2" id="mailPar2" class="mail" />
                </fieldset>

                <br><br>
                <input type="submit" value="Valider" id="valider" name="validerInscriptionEnfant"/>
            </form>
            
            <script>
                document.getElementById('parent2').style.display = "none";
                document.getElementById('nomPar2').required = false;
                document.getElementById('prenomPar2').required = false;
                document.getElementById('naissancePar2').required = false;
                document.getElementById('ruePar2').required = false;
                document.getElementById('cpPar2').required = false;
                document.getElementById('villePar2').required = false;
                document.getElementById('telPar2').required = false;
                document.getElementById('mailPar2').required = false;

                document.getElementById('listeEnfants').style.display = "none";

                function affichage(){
                    if(document.getElementById('ajoutePar2').checked == true){
                        document.getElementById('parent2').style.display = "block";
                        document.getElementById('nomPar2').required = true;
                        document.getElementById('prenomPar2').required = true;
                        document.getElementById('naissancePar2').required = true;
                        document.getElementById('ruePar2').required = true;
                        document.getElementById('cpPar2').required = true;
                        document.getElementById('villePar2').required = true;
                        document.getElementById('telPar2').required = true;
                        document.getElementById('mailPar2').required = true;
                    }
                    else{
                        document.getElementById('parent2').style.display = "none";
                        document.getElementById('nomPar2').required = false;
                        document.getElementById('prenomPar2').required = false;
                        document.getElementById('naissancePar2').required = false;
                        document.getElementById('ruePar2').required = false;
                        document.getElementById('cpPar2').required = false;
                        document.getElementById('villePar2').required = false;
                        document.getElementById('telPar2').required = false;
                        document.getElementById('mailPar2').required = false;
                    }
                }

                function afficherEnfants(){
                    document.getElementById('listeEnfants').style.display = "block";
                    document.getElementById('principal').style.filter = "blur(3px)";
                }

                function fermer(){
                    document.getElementById('listeEnfants').style.display = "none";
                    document.getElementById('principal').style.filter = "none";
                }
            </script>

            <?php
                //Cette partie est très importante car elle va nous permettre d'éviter les erreurs lors de la rentrée des données dans la base
                //Pour éviter toute erreur de la part de l'utilisateur, on va calculer une date minmale pour la date de naissance minimale du jeune
                //sachant que le jeune ne doit pas être plus vieux que 19 ans, on va calculer à partir de l'année
                function dateMin(){
                    $dateMin = date('Y') - 19 . '-01-01';//Donc à partir du 1er janvier
                    return $dateMin;
                }
                //Et on va aussi créer une date maximum qui peut être saisie car l'âge min d'un jeune est de 8 ans
                function dateMax(){
                    $dateMax = date('Y') - 8 . '-12-31';//Donc jusqu'au 31 décembre
                    return $dateMax;
                }
            ?>

        </div>

        <script>
            document.getElementById('listeEnfants').style.display = "none";
            function afficherEnfants(){
                document.getElementById('listeEnfants').style.display = "block";
                document.getElementById('principal').style.filter = "blur(3px)";
            }
        </script>
        <!--Les listes-->
        <!--liste pour les enfants-->
        <div class="liste" id="listeEnfants">
            <input type="button" value="X" class="fermer" onclick="fermer()"/>
            <h2>Liste des Enfants</h2>
            <?php
                //on va regarder si il ya des enfants dans la BDD tout d'abord
                include("connexionBDD.php");
                $req = $bdd->query('SELECT COUNT(id) as nEnfants FROM JEUNE');
                $donnees = $req->fetch();
                $nbEnfants = $donnees['nEnfants'];

                if($nbEnfants >= 1){
                    ?>
                        <center>
                        <table>
                            <tr class="entete">
                                <th>Nom<th>
                                <th>Prénom<th>
                                <th>Date de naissance<th>
                                <th>Sexe<th>
                                <th>Téléphone<th>
                                <th>Adresse email<th>
                                <th>Branche<th>
                                <th>Action<th>
                            </tr>
                            <?php
                                $req = $bdd->query('SELECT * FROM JEUNE ORDER BY nom,prenom');
                                while($donnees = $req->fetch()){

                                    $tel = $donnees['telephone'];
                                    $mail = $donnees['mail'];

                                    if($donnees['id_BRANCHE']==1){
                                        $branche='Louveteaux';
                                    }
                                    if($donnees['id_BRANCHE']==2){
                                        $branche='Eclaireurs';
                                    }
                                    if($donnees['id_BRANCHE']==3){
                                        $branche='Aînés';
                                    }

                                    //On vérifie qu'il y a quelque chose dans l'adresse mail et le tel sinon on affiche un petit tiret
                                    if(!$donnees['telephone']>=1){
                                        $tel = '-';
                                    }
                                    if(!$donnees['mail'] >=1){
                                        $mail = '-';
                                    }
                                    $affichage = '<tr><td colspan="2" style="text-align : left;">'.$donnees['nom'].'</td><td colspan="2" style="text-align : left;">'.$donnees['prenom'].'</td><td colspan="2">'.$donnees['dateNaissance'].'</td><td colspan="2">'.$donnees['sexe'].'</td><td colspan="2">'.$tel.'</td><td colspan="2">'.$mail.'</td><td colspan="2">'.$branche.'</td><td colspan="2"><input type="button" value="Supprimer" class="suppr" name="supprimerEnfant" id="supprimerEnfant" onclick="supprimerEnfant(\''.$donnees['nom'].'\',\''.$donnees['prenom'].'\','.$donnees['id'].')"/></td></tr>';
                                    echo $affichage;
                                }
                            ?>
                        </table>
                        </center>
                    <?php
                }
                else{
                    ?>
                        <h3>Aucun enfant n'a été entré dans la BDD !</h3>
                    <?php
                }
                ?>

                <script>
                    function supprimerEnfant(nomEnfant,prenomEnfant,idEnfant){
                        if(confirm("Etes-vous sûr(e) de vouloir supprimer " + nomEnfant + " " + prenomEnfant + " de la base de donnée ?")){
                            window.location.href="inscriptionEnfant.php?id=" + idEnfant;
                        }
                    }
                </script>

                <?php

                    if(isset($_GET['id']) AND $_GET['id']!= 0){
                        $idJeune = $_GET['id'];
                        $req = $bdd->query('SELECT * FROM JEUNE WHERE id='.$idJeune);
                        //On vérifie que le jeune existe encore, si oui, on continue
                        if($donnees = $req->fetch()){
                            //Maintenant on veut supprimer les parents car ils ne servent à rien
                            //seulement il faut regarder que le jeune n'a pas de frères ou de soeurs avant
                            //Si il n'a pas de frères ou de soeurs on demande si le responsable veut supprimer les parents
                            //Si il en a on va juste supprimer le jeune car jusque maintenant l'utilisateur veut juste supprimer le jeune
                            //On récupère l'id du ou des parent(s)
                            $nomJeune = $donnees['nom'];
                            $prenomJeune = $donnees['prenom'];
                            $idPar1 = $donnees['id_PARENT'];
                            $idPar2 = $donnees['id_PARENT_Parent2'];

                            //On cherche si le jeune a un frère ou un soeur
                            $req = $bdd->query('SELECT COUNT(id) as nJeunes FROM JEUNE WHERE id_PARENT='.$idPar1);
                            $donnees = $req->fetch();
                            $frereSoeur = $donnees['nJeunes'];

                            //Si il a des frères et soeurs on supprime directement (il faut le compter dedans)
                            if($frereSoeur >= 2){
                                $req = $bdd->query('DELETE FROM JEUNE WHERE id='.$idJeune);
                                //On prévient l'utilisateur que le jeune n'existe plus
                                echo '<script>alert("'.$nomJeune.' '.$prenomJeune.' a bien été supprimé de la base de donnée");</script>';
                                //et on refait charger la page pour actualiser avec une valeur impossible e l'id pour éviter toute suppression malheureuse
                                echo '<script>window.location.href="inscriptionEnfant.php?id=" + 0;</script>';
                            }
                            else{
                                ?>
                                    <script>
                                        if(confirm("<?php echo $nomJeune.' '.$prenomJeune?> n'a pas de frère/soeur. Souhaitez-vous aussi supprimer son/ses parent(s) de la base de donnée ?")){
                                            <?php
                                                //Etape 1: on supprime le jeune
                                                $req = $bdd->query('DELETE FROM JEUNE WHERE id='.$idJeune);
                                                include("suppressionParents.php");
                                            ?>
                                            alert("<?php echo $nomJeune.' '.$prenomJeune?> et son/ses parent(s) ont bien été supprimés.");
                                            window.location.href="inscriptionEnfant.php?id=" + 0;
                                        }
                                        else{
                                            <?php
                                                //On supprime simplement le jeune
                                                $req = $bdd->query('DELETE FROM JEUNE WHERE id='.$idJeune);
                                            ?>
                                            alert("Le jeune a bien été supprimé");
                                            window.location.href="inscriptionEnfant.php?id=" + 0;
                                        }
                                    </script>
                                <?php
                            }
                            
                        }
                        
                    }

                ?>
            
        </div>
    </body>
</html>