<?php

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
    $req = $bdd->prepare('INSERT INTO ROLES(permission,login,password,level)VALUES (:permission, :idPar1, :mdpPar1, :level');
    $req->bindValue(':permission', 'parent', PDO::PARAM_STR);
    $req->bindValue(':idPar1', $idPar1, PDO::PARAM_STR);
    $req->bindValue(':mdpPar1', $mdpPar1, PDO::PARAM_STR);
    $req->bindValue(':level', 3, PDO::PARAM_INT);
    $req->execute();
    //ensuite on récupère l'idRole de ce nouvel utilisateur pour le mettre en lien avec le parent
    $req = $bdd->prepare('SELECT * FROM ROLES WHERE login = :login');
    $req->bindValue(':login', $idPar1, PDO::PARAM_STR);
    $req->execute();
    $donnees = $req->fetch();
    $idRolePar1 = $donnees['id'];
    //Maintenant on peut créer un parent
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
    //On doit alors récupérer l'id du parent pour l'associer avec l'enfant grâce à son idRole
    $req = $bdd->prepare('SELECT * FROM PARENT WHERE idRole = :idRolePar1');
    $req->bindValue(':idRolePar1', $idRolePar1, PDO::PARAM_INT);
    $req->execute();
    $donnees = $req->fetch();
    $idParent1 = $donnees['id'];

    //Et on fait la même chose si il y a un deuxième parent
    if($parent2){
        $req = $bdd->query('INSERT INTO ROLES(permission,login,password,level)VALUES (\'parent\',\''.$idPar2.'\',\''.$mdpPar2.'\',3);');
        $req = $bdd->query('SELECT * FROM ROLES WHERE login=\''.$idPar2.'\'');
        $donnees = $req->fetch();
        $idRolePar2 = $donnees['id'];
        $req = $bdd->query('INSERT INTO PARENT(nom,prenom,sexe,rue,codePostal,ville,telephone,mail,idRole)VALUES (\''.$nomPar2.'\',\''.$prenomPar2.'\',\''.$sexePar2.'\',\''.$ruePar2.'\',\''.$cpPar2.'\',\''.$villePar2.'\',\''.$telPar2.'\',\''.$mailPar2.'\','.$idRolePar2.');');
        $req = $bdd->query('SELECT * FROM PARENT WHERE idRole = '.$idRolePar2);
        $donnees = $req->fetch();
        $idParent2 = $donnees['id'];
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
    $req = $bdd->query('INSERT INTO JEUNE (nom,prenom,dateNaissance,sexe,rue,codePostal,ville,telephone,mail,cotisation,id_PARENT,id_PARENT_Parent2,id_BRANCHE) VALUES (\''.$nomJeune.'\',\''.$prenomJeune.'\',\''.$naissJeune.'\',\''.$sexeJeune.'\',\''.$rueJeune.'\',\''.$cpJeune.'\',\''.$villeJeune.'\',\''.$telJeune.'\',\''.$mailJeune.'\',0,'.$idParent1.','.$idParent2.','.$idBranche.');');

    echo 'login :'.$idPar1.' mdp : '.$mdpPar1;
    if($parent2){
        echo 'login :'.$idPar2.' mdp : '.$mdpPar2;
    }

?>