<!DOCTYPE html>
<html>
    <head>
        <met charset="utf-8"/>
        <link rel="stylesheet" href="pied.css"/>
    </head>
    <body>
        <footer>
            <section>
                <div style="break-before: avoid;">
                    <h3>Sur les réseaux sociaux</h3>
                    <br>
                    <p>
                        <figure>
                            <a href="https://www.facebook.com/EEUdF"target="_blank"><img src="images/facebook.jpg" alt="Facebook" title="Notre profil Facebook"/></a>
                            <a href="https://twitter.com/EEUdF"target="_blank"><img src="images/twitter.png" alt="Twitter" title="Notre profil Twitter"/></a>
                            <a href="https://www.youtube.com/channel/UC_QPWHQABB4zNuIksc2A_zQ"target="_blank"><img src="images/youtube.png" alt="Youtube" title="Notre chaîne Youtube"/></a>
                            <br>
                            <a href="https://www.instagram.com/eeudf/"target="_blank"><img src="images/instagram.jpg" alt="Instagram" title="Notre profil Instagram"/></a>
                            <a href="https://www.linkedin.com/company/eeudf---eclaireuses-et-eclaireurs-unionistes-de-france" target="_blank"><img src="images/linkedin.jpg" alt="Linkedin" title="Notre profil Linkedin"/></a>
                        </figure>
                    </p>
                </div>
                <div>
                    <h3>Differents liens</h3>
                    <br>
                    <p>
                        <a href="https://eeudf.org/"target="_blank">Site national des scouts de France</a>
                        <br>
                        <a href="https://eeudf.org/alsace-lorraine/"target="_blank">Site des scouts Alsace-Lorraine</a>
                        <br>
                        <a href="http://localhost/Les%20scouts/mentionsLegales.php"target="_blank">Mentions Legales</a>
                    </p>
                </div>
                <div>
                    <h3 id="formulaireContact">Contact</h3>
                    <form method="post">
                        <ul>
                            <li>
                                <label for="mail">E-mail:</label>
                                <input type="email" id="userMail" name="userMail" class="saisies saisieContact" required/>
                            </li>
                            <li>
                                <label for="objet">Objet:</label>
                                <input type="text" id="objet" name="objet" class="saisies saisieContact" required/>
                            </li>
                            <li>
                                <label for="txt">Texte:</label>
                                <textarea id="message" name="message" class="saisies saisieContact" required></textarea>
                            </li>
                            <li>
                                <input type="submit" value="Envoyer" name="envoyer" id="envoyer" class="btnContact"/>
                            </li>
                        </ul>
                        <?php
                            if(isset($_POST['envoyer'])){
                                $envoye = mail('a2l.society@gmail.com', $_POST['objet'], $_POST['message'], 'From : '.$_POST['userMail']);
                            }
                        ?>
                    </form>
                </div>
            </section>
        </footer> 
    </body>
</html>
