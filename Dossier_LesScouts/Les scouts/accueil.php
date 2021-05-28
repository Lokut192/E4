<?php include("login.php");?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styleAccueil.css"/>
        <title>Accueil | Eclaireurs d'Illkirch</title>
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="principal">
            <h1>Accueil</h1>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
            <span id="sl_i1" class="sl_command sl_i"></span>
            <span id="sl_i2" class="sl_command sl_i"></span>
            <span id="sl_i3" class="sl_command sl_i"></span>
            <span id="sl_i4" class="sl_command sl_i"></span>
            
            <section id="slideshow">
            
                <div class="container">
                    <div class="c_slider"></div>
                    <div class="slider">
                        <figure>
                            <a onclick="demandeInscription()" style="cursor : pointer;">
                                <img src="images\Inscrire.png" alt="" id="img1" width="640" height="310"/>
                            </a>
                        </figure><!--
                        --><figure>
                            <a href="activites.php">
                                <img src="images\activites.png" alt="" id="img2" width="640" height="310" />
                            </a>
                        </figure><!--
                        --><figure>
                            <a href="Nousconnaitre.php">
                                <img src="images\notreHistoire.png" alt="" id="img3" width="640" height="310" />
                            </a>
                        </figure><!--
                        --><figure>
                            <a href="connexion.php">
                                <img src="images\connexion.png" alt="" id="img4" width="640" height="310" />
                            </a>
                        </figure>
                    </div>
                </div>

                <span id="timeline"></span>
                <ul class="dots_commands"><!--
                    --><li><a title="Afficher la slide 1" href="#sl_i1">Slide 1</a></li><!--
                    --><li><a title="Afficher la slide 2" href="#sl_i2">Slide 2</a></li><!--
                    --><li><a title="Afficher la slide 3" href="#sl_i3">Slide 3</a></li><!--
                    --><li><a title="Afficher la slide 4" href="#sl_i4">Slide 4</a></li>
                </ul>
            </section>

            <?php include("pied.php"); ?>

            <script>
                //ici on va faire un petit quelque chose pour que quand l'utilisateur clique sur "inscrire mon enfant",
                //il est redirigé vers le bas de la page dans le formulaire de contact avec l'objet du message déjà rempli
                
                //Etape 1 : on crée la fonction au click
                function demandeInscription(){
                    //On emmène l'utilisateur jusqu'au formulaire de contact
                    location.href="#formulaireContact";
                    //On l'invite à remplir son mail
                    document.getElementById("userMail").focus();
                    //on prérempli l'objet du mail
                    document.getElementById("objet").value = "Demande d'inscription enfant";
                }
            </script>


        
    </body>
</html>
