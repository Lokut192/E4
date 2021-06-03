<?php
include 'login.php';
/**
 * Cette page va nous permettre d'afficher en détails une activité sélectionnée
 */
//On récupère d'abord dans les paramètres de l'url l'id de l'activité sélectionnée
if(isset($_GET['activite'])){
    $idActivite = intval($_GET['activite']);
}
else{
    //Sinon on renvoit l'utilisateur sur la page du calendrier
    ?>
    <script>
        document.location.href="activites.php";
    </script>
    <?php
}

//On va commencer par récupérer toutes les informations de la base de données sur l'activité
include 'connexionBDD.php';
try{
    $req = $bdd->prepare('SELECT * FROM activite WHERE id = :id');
    $req->bindValue(':id', $idActivite, PDO::PARAM_INT);
    $req->execute();
    $donnees = $req->fetch();
}
catch(PDOException $e){
    echo 'Une erreur est survenue : '.$e;
}


//On garde toutes les données dans des variables
if($donnees){
    $libelle = $donnees['libelle'];
    $dateDebut = DateTime::createFromFormat('Y-m-d', $donnees['dateDebut'])->format('d/m/Y');
    $heureDebut = $donnees['heureDebut'];
    $dateFin = DateTime::createFromFormat('Y-m-d', $donnees['dateFin'])->format('d/m/Y');
    $heureFin = $donnees['heureFin'];
    $lieu = $donnees['lieu'];
    $lieuRDV = $donnees['lieuRDV'];
    $prix = $donnees['prix'];
    $description = $donnees['description'];
    $idBranche = intval($donnees['id_BRANCHE']);
    $idTransport = intval($donnees['id_TRANSPORT']);
}

//On récupère le libelle de la branche et du moyen de transport
if($idBranche){
    try{
        $req = $bdd->prepare('SELECT libelle FROM branche WHERE id = :idBranche');
        $req->bindValue(':idBranche', $idBranche, PDO::PARAM_INT);
        $req->execute();
        $resultat = $req->fetch();
        $libelleBranche = $resultat['libelle'];
    }
    catch(PDOException $m){
        echo 'Une erreur est survenue : '.$m;
    }
}
if($idTransport){
    try{
    $req = $bdd->prepare('SELECT libelle FROM transport WHERE id = :idTransport');
    $req->bindValue(':idTransport', $idTransport, PDO::PARAM_INT);
    $req->execute();
    $resultat = $req->fetch();
    $libelleTransport = $resultat['libelle'];
    }
    catch(PDOException $m){
        echo 'Une erreur est survenue : '.$m;
    }
}

/**
 * Maintnant qu'on a tout on passe à l'affichage:
 */
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $libelle ?></title>
        <link rel="stylesheet" href="activite.css">
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            include 'menu.php';
        ?>
    <div class="principal">
        <h1><?= $libelle ?></h1>
        <p class="description"><?= $description ?></p>
        <br><br>
        <label class="label">Date de début : </label><p class="info"><?= $dateDebut ?></p>
        <label class="label">Heure de début : </label><p class="info"><?= $heureDebut ?></p>
        <label class="label">Date de fin : </label><p class="info"><?= $dateFin ?></p>
        <label class="label">Heure de fin : </label><p class="info"><?= $heureFin ?></p>
        <label class="label">Lieu : </label><p class="info"><?= $lieu ?></p>
        <label class="label">Lieu de rendez-vous : </label><p class="info"><?= $lieuRDV ?></p>
        <label class="label">Prix par enfant : </label><p class="info"><?= $prix.'€' ?></p>
        <label class="label">Branche concernée : </label><p class="info"><?= $libelleBranche ?></p>
        <label class="label">Moyen de transport : </label><p class="info"><?= $libelleTransport ?></p>
    </div>

        <?php
        /**
         * On va regarder maintenant si un des enfants de l'utilisateur peut participer à cette activité
         */
        try{
            $req = $bdd->prepare('SELECT id FROM roles WHERE login = :login');
            $req->bindValue(':login', $_SESSION['id'], PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch();
            $idRole = intval($resultat['id']);

            $req = $bdd->prepare('SELECT id FROM parent WHERE idRole = :idRole');
            $req->bindValue(':idRole', $idRole, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch();
            $idParent = intval($resultat['id']);

            $req = $bdd->prepare('SELECT prenom FROM jeune WHERE id_PARENT = :idParent OR id_PARENT_parent2 = :idParent2');
            $req->bindValue(':idParent', $idParent, PDO::PARAM_INT);
            $req->bindValue(':idParent2', $idParent, PDO::PARAM_INT);
            $req->execute();
            $lstEnfants = array();
            $lstEnfants = $req->fetchAll();
        }
        catch(PDOException $m){
            echo 'Une erreur est survenue : '.$m;
        }

        for($i = 0; $i < count($lstEnfants); $i++){
            echo '<input type="button" value="'. $lstEnfants[$i]['prenom']. '">';
        }

        ?>
    </body>
</html>
