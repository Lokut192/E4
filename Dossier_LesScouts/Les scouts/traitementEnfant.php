<?php

    //On verifie que des informations nous ont bien été envoyées
    if(isset($_POST['validerInscriptionEnfant'])){

        //connexion à la base de donnée
        include("connexionBDD.php");

        //Récupération de toutes les informations du jeune
        $nomJeune = $_POST['nomEnfant'];
        $prenomJeune = $_POST['prenomEnfant'];
        $sexeJeune = $_POST['sexeEnfant'];
        $naissJeune = $_POST['naissanceEnfant'];
        //Calcul de l'âge à partir de la date de naissance afin de savoir dans quel groupe inscrire le jeune
        $age = date('Y') - date('Y', strtotime($naissJeune));
        $rueJeune = $_POST['rueEnfant'];
        $cpJeune = $_POST['cpEnfant'];
        $villeJeune = $_POST['villeEnfant'];
        /*Etant donné que le téléphone n'est pas obligatoire on va déjà vérifier si qqch a été saisi dans ce champ*/
        if(isset($_POST['telEnfant'])){
            $telJeune = $_POST['telEnfant'];
        }
        else{
            $telJeune = 'NULL';
        }
        /*Pareil avec l'adresse mail*/
        if(isset($_POST['mailEnfant'])){
            $mailJeune = $_POST['mailEnfant'];
        }
        else{
            $mailJeune = 'NULL';
        }

        //On passe au parent 1
        $nomPar1 = $_POST['nomPar1'];
        $prenomPar1 = $_POST['prenomPar1'];
        $sexePar1 = $_POST['sexePar1'];
        $naissPar1 = $_POST['naissancePar1'];
        $ruePar1 = $_POST['ruePar1'];
        $cpPar1 = $_POST['cpPar1'];
        $villePar1 = $_POST['villePar1'];
        $telPar1 = $_POST['telPar1'];
        $mailPar1 = $_POST['mailPar1'];
        //Création d'un identifiant pour le site unique avec comme préfixe les deux premières lettres du prénom
        $idPar1 = strtolower($prenomPar1).'.'.strtolower($nomPar1);
        //Création d'un mot de passe de 10 caractères pour le site
        $chaine = '@&#!?abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $mdpPar1='';
        for($i = 0; $i < 10; $i++){
            $mdpPar1.= $chaine[rand(0, (strlen($chaine))-1)];
        }

        //On passe au parent 2 si la case a été cochée
        //On prépare le infos dans l'éventualité d'un problème
        $parent2 = null;
        $nomPar2 = null;
        $prenomPar2 = null;
        $sexePar2 = null;
        $naissPar2 = null;
        $ruePar2 = null;
        $cpPar2 = null;
        $villePar2 = null;
        $telPar2 = null;
        $mailPar2 = null;
        $idPar2 = null;
        $mdpPar2 = null;
        if(isset($_POST['ajoutePar2'])){
            $parent2 = true;
            $nomPar2 = $_POST['nomPar2'];
            $prenomPar2 = $_POST['prenomPar2'];
            $sexePar2 = $_POST['sexePar2'];
            $naissPar2 = $_POST['naissancePar2'];
            $ruePar2 = $_POST['ruePar2'];
            $cpPar2 = $_POST['cpPar2'];
            $villePar2 = $_POST['villePar2'];
            $telPar2 = $_POST['telPar2'];
            $mailPar2 = $_POST['mailPar2'];
            //Création de l'id
            $idPar2 = strtolower($prenomPar2).'.'.strtolower($nomPar2);
            //Création du mdp
            $mdpPar2='';
            for($i = 0; $i < 10; $i++){
                $mdpPar2.= $chaine[rand(0, (strlen($chaine))-1)];
            }
        }
        else{
            $parent2 = false;
        }

        //Etant donné que le navigateur gère toutes les erreurs de syntaxe des données,
        //on a juste à rentré les données dans la base
        //Tout d'abord les parents parce qu'il faut ensuite lier l'enfant au(x) parent(s)
        //Etape 1 : le role
        //On protège la séquence
        try{
            $req = $bdd->prepare('INSERT INTO ROLES(permission,login,password,level)VALUES (:permission, :idPar1, :mdpPar1, :level');
            $req->bindValue(':permission', 'parent', PDO::PARAM_STR);
            $req->bindValue(':idPar1', $idPar1, PDO::PARAM_STR);
            $req->bindValue(':mdpPar1', $mdpPar1, PDO::PARAM_STR);
            $req->bindValue(':level', 3, PDO::PARAM_INT);
            $req->execute();
        }
        catch(PDOException $e){
            echo 'Une erreur est survenue lors de la création du rôle du parent 1 : '.$e;
        }


        //ensuite on récupère l'idRole de ce nouvel utilisateur pour le mettre en lien avec le parent
        //On protège la séquence
        try{
            $req = $bdd->prepare('SELECT * FROM ROLES WHERE login = :login');
            $req->bindValue(':login', $idPar1, PDO::PARAM_STR);
            $req->execute();
            $donnees = $req->fetch();
            $idRolePar1 = $donnees['id'];
        }
        catch(PDOException $e){
            echo 'Une erreur est survenue lors de la récupération de l\'idRole du parent 1 : '.$e;
        }

        //Maintenant on peut créer un parent
        //On protège la séquence
        try{
            $req = $bdd->prepare('INSERT INTO PARENT(nom,prenom,sexe,rue,codePostal,ville,telephone,mail,idRole)VALUES (:nomPar1, :prenomPar1, :sexePar1, :ruePar1, :cpPar1, :villePar1, :telPar1, :mailPar1, :idRolePar1)');
            $req->bindValue(':nomPar1', $nomPar1, PDO::PARAM_STR);
            $req->bindValue(':prenomPar1', $prenomPar1, PDO::PARAM_STR);
            $req->bindValue(':sexePar1', $sexePar1, PDO::PARAM_STR);
            $req->bindValue(':ruePar1', $ruePar1, PDO::PARAM_STR);
            $req->bindValue(':cpPar1', $cpPar1, PDO::PARAM_STR);
            $req->bindValue(':villePar1', $villePar1, PDO::PARAM_STR);
            $req->bindValue(':telPar1', $telPar1, PDO::PARAM_STR);
            $req->bindValue(':mailPar1', $mailPar1, PDO::PARAM_STR);
            $req->bindValue(':idRolePar1', $idRolePar1, PDO::PARAM_INT);
            $req->execute();
        }
        catch(PDOException $e){
            echo 'Une erreur est survenue lors de la création du parent 1 : '.$e;
        }

        //On doit alors récupérer l'id du parent pour l'associer avec l'enfant grâce à son idRole
        //On protège la séquence
        try{
            $req = $bdd->prepare('SELECT * FROM PARENT WHERE idRole = :idRolePar1');
            $req->bindValue(':idRolePar1', $idRolePar1, PDO::PARAM_INT);
            $req->execute();
            $donnees = $req->fetch();
            $idParent1 = $donnees['id'];
        }
        catch(PDOException $e){
            echo 'Une erreur est survenue lors de la récupération de l\'id du parent 1 : '.$e;
        }

        //Et on fait la même chose si il y a un deuxième parent
        if($parent2){
            //Etape 1 : le role
            //On protège la séquence
            try{
                $req = $bdd->prepare('INSERT INTO ROLES(permission,login,password,level)VALUES (:permission, :idPar2, :mdpPar2, :level');
                $req->bindValue(':permission', 'parent', PDO::PARAM_STR);
                $req->bindValue(':idPar1', $idPar2, PDO::PARAM_STR);
                $req->bindValue(':mdpPar1', $mdpPar2, PDO::PARAM_STR);
                $req->bindValue(':level', 3, PDO::PARAM_INT);
                $req->execute();
            }
            catch(PDOException $e){
                echo 'Une erreur est survenue lors de la création du rôle du parent 2 : '.$e;
            }

            //ensuite on récupère l'idRole de ce nouvel utilisateur pour le mettre en lien avec le parent
            //On protège la séquence
            try{
                $req = $bdd->prepare('SELECT * FROM ROLES WHERE login = :login');
                $req->bindValue(':login', $idPar2, PDO::PARAM_STR);
                $req->execute();
                $donnees = $req->fetch();
                $idRolePar2 = $donnees['id'];
            }
            catch(PDOException $e){
                echo 'Une erreur est survenue lors de la récupération de l\'idRole du parent 2 : '.$e;
            }

            //Maintenant on peut créer un parent
            //On protège la séquence
            try{
                $req = $bdd->prepare('INSERT INTO PARENT(nom,prenom,sexe,rue,codePostal,ville,telephone,mail,idRole)VALUES (:nomPar2, :prenomPar2, :sexePar2, :ruePar2, :cpPar2, :villePar2, :telPar2, :mailPar2, :idRolePar2)');
                $req->bindValue(':nomPar2', $nomPar2, PDO::PARAM_STR);
                $req->bindValue(':prenomPar2', $prenomPar2, PDO::PARAM_STR);
                $req->bindValue(':sexePar2', $sexePar2, PDO::PARAM_STR);
                $req->bindValue(':ruePar2', $ruePar2, PDO::PARAM_STR);
                $req->bindValue(':cpPar2', $cpPar2, PDO::PARAM_STR);
                $req->bindValue(':villePar2', $villePar2, PDO::PARAM_STR);
                $req->bindValue(':telPar2', $telPar2, PDO::PARAM_STR);
                $req->bindValue(':mailPar2', $mailPar2, PDO::PARAM_STR);
                $req->bindValue(':idRolePar2', $idRolePar2, PDO::PARAM_INT);
                $req->execute();
            }
            catch(PDOException $e){
                echo 'Une erreur est survenue lors de la création du parent 2 : '.$e;
            }

            //On doit alors récupérer l'id du parent pour l'associer avec l'enfant grâce à son idRole
            //On protège la séquence
            try{
                $req = $bdd->prepare('SELECT * FROM PARENT WHERE idRole = :idRolePar2');
                $req->bindValue(':idRolePar2', $idRolePar2, PDO::PARAM_INT);
                $req->execute();
                $donnees = $req->fetch();
                $idParent2 = $donnees['id'];
            }
            catch(PDOException $e){
                echo 'Une erreur est survenue lors de la récupération de l\'id du parent 2 : '.$e;
            }

        }
        else{
            $idParent2 = 'NULL';
        }

        //Maintenant c'est au tour de l'enfant
        //pour tout simplifier on va d'abord donner une branche à l'enfant :
        if($age >= 8 AND $age <=11){
            $idBranche = 1; //ce qui correspond aux louveteaux
        }
        if($age >= 12 AND $age <=15){
            $idBranche = 2; //ce qui correspond aux éclaireurs
        }
        if($age >= 16){
            $idBranche = 3; //ce qui correspond aux aînés
        }

        //Pour l'enfant une seule entrée suffira car toute information manquante a la valeur de 'null'
        //On protège la séquence
        try{
            $req = $bdd->prepare('INSERT INTO JEUNE (nom,prenom,dateNaissance,sexe,rue,codePostal,ville,telephone,mail,cotisation,id_PARENT,id_PARENT_Parent2,id_BRANCHE) VALUES (:nomJeune, :prenomJeune, :naissJeune, :sexeJeune, :rueJeune, :cpJeune, :villeJeune, :telJeune, :mailJeune, :cotisation, :idParent1, :idParent2, :idBranche);');
            $req->bindValue(':nomJeune', $nomJeune, PDO::PARAM_STR);
            $req->bindValue(':prenomJeune', $prenomJeune, PDO::PARAM_STR);
            $req->bindValue(':naissJeune', $naissJeune, PDO::PARAM_STR);
            $req->bindValue(':naissJeune', $naissJeune, PDO::PARAM_STR);
            $req->bindValue(':sexeJeune', $sexeJeune, PDO::PARAM_STR);
            $req->bindValue(':rueJeune', $rueJeune, PDO::PARAM_STR);
            $req->bindValue(':cpJeune', $cpJeune, PDO::PARAM_STR);
            $req->bindValue(':villeJeune', $villeJeune, PDO::PARAM_STR);
            $req->bindValue(':telJeune', $telJeune, PDO::PARAM_STR);
            $req->bindValue(':mailJeune', $mailJeune, PDO::PARAM_STR);
            $req->bindValue(':cotisation', 0, PDO::PARAM_INT);
            $req->bindValue(':idParent1', $idParent1, PDO::PARAM_STR);
            $req->bindValue(':idParent2', $idParent2, PDO::PARAM_STR);
            $req->bindValue(':idBranche', $idBranche, PDO::PARAM_STR);
            $req->execute();
            echo $naissJeune;
        }
        catch(PDOException $e){
            echo 'Une erreur est survenue lors de l\'entrée de l\'enfant dans la base : '.$e;
        }
    }
    else{
        ?>
        <script>
            document.location.href="accueil.php";
        </script>
        <?php
    }

    /**
     * On va maintenant afficher les identifiants du ou des parent(s)
     */
    //On change juste la valeur de certaines variables pour rendre un code html + php propre
    switch($sexeJeune){
        case 'M':
            $sexeJeune = 'Homme';
            break;
        case 'F' :
            $sexeJeune = 'Femme';
            break;
        default :
            $sexeJeune = 'N';
            break;
    }
    switch($sexePar1){
        case 'M':
            $sexePar1 = 'Homme';
            break;
        case 'F' :
            $sexePar1 = 'Femme';
            break;
        default :
            $sexePar1 = 'N';
            break;
    }
    switch($sexePar2){
        case 'M':
            $sexePar2 = 'Homme';
            break;
        case 'F' :
            $sexePar2 = 'Femme';
            break;
        default :
            $sexePar2 = 'N';
            break;
    }

    if($telJeune == 'NULL'){
        $telJeune = '-';
    }

    if($mailJeune == 'NULL'){
        $mailJeune = '-';
    }

?>

<div class="principal">
    <?= date('dd/mm/YYYY', strtotime($naissJeune)) ?>
    <h1>Création d'un enfant</h1>
    <div class="resumeEnfant infos">
        <h1><?= strtoupper($nomJeune).' '.$prenomJeune ?></h1>
        <div class="details">
            <label class="lbl">Sexe :</label><p class="detail"><?= $sexeJeune ?></p>
            <label class="lbl">Date de naissance :</label><p class="detail"><?= date_format(strtotime($naissJeune), 'dd/mm/YYYY') ?></p>
            <label class="lbl">Adresse :</label><p class="detail"><?= $rueJeune ?></p>
            <label class="lbl">Code postal :</label><p class="detail"><?= $cpJeune ?></p>
            <label class="lbl">Ville :</label><p class="detail"><?= $villeJeune ?></p>
            <label class="lbl">Téléphone :</label><p class="detail"><?= $telJeune ?></p>
            <label class="lbl">Mail :</label><p class="detail"><?= $mailJeune ?></p>
        </div>
    </div>

    <div class="infos">
        <h1><?= strtoupper($nomPar1).' '.$prenomPar1 ?></h1>
        <div class="details">
            <label class="lbl">Sexe :</label><p class="detail"><?= $sexePar1 ?></p>
            <label class="lbl">Date de naissance :</label><p class="detail"><?= date_format(strtotime($naissPar1), 'dd/mm/YYYY') ?></p>
            <label class="lbl">Adresse :</label><p class="detail"><?= $ruePar1 ?></p>
            <label class="lbl">Code postal :</label><p class="detail"><?= $cpPar1 ?></p>
            <label class="lbl">Ville :</label><p class="detail"><?= $villePar1 ?></p>
            <label class="lbl">Téléphone :</label><p class="detail"><?= $telPar1 ?></p>
            <label class="lbl">Mail :</label><p class="detail"><?= $mailPar1 ?></p>
            <label class="lbl">Login :</label><p class="detail infosConnexion"><?= $idPar1 ?></p>
            <label class="lbl">Mot de passe :</label><p class="detail infosConnexion"><?= $mdpPar1 ?></p>
        </div>
    </div>
    <?php
    /**
     * Affichage du parent 2 seulement si il existe
     */
    if($parent2){
        ?>
        <div class="infos">
            <h1><?= strtoupper($nomPar2).' '.$prenomPar2 ?></h1>
            <div class="details">
                <label class="lbl">Sexe :</label><p class="detail"><?= $sexePar2 ?></p>
                <label class="lbl">Date de naissance :</label><p class="detail"><?= date_format(strtotime($naissPar2), 'dd/mm/YYYY') ?></p>
                <label class="lbl">Adresse :</label><p class="detail"><?= $ruePar2 ?></p>
                <label class="lbl">Code postal :</label><p class="detail"><?= $cpPar2 ?></p>
                <label class="lbl">Ville :</label><p class="detail"><?= $villePar2 ?></p>
                <label class="lbl">Téléphone :</label><p class="detail"><?= $telPar2 ?></p>
                <label class="lbl">Mail :</label><p class="detail"><?= $mailPar2 ?></p>
                <label class="lbl">Login :</label><p class="detail infosConnexion"><?= $idPar2 ?></p>
                <label class="lbl">Mot de passe :</label><p class="detail infosConnexion"><?= $mdpPar2 ?></p>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<style>
    <?php include 'traitementEnfant.css'; ?>
</style>