//page contact et formulaire 
<?php

include('../component/header.php');
?>
<div  class="contentContact">
    <h2 class="h2Contact">Me contacter:</h2>



    <div id="contactFormulaire" class="articleFormulaire">
        <form  method="post" action= "../component/mail.php">
            <div class="form">
                <input type="text" id="nom" name="nom"placeholder="Votre nom" require>
            </div>
            <div class="form">
                <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" require>
            </div>
            <div class="message">
                <input type="mail" id="mail" name="mail" placeholder="Votre mail" require>
            </div>
            <div class="form">
                <textarea name="projet" id="projet" cols="20" rows="30" placeholder="Messsage" require ></textarea>
            </div>
            <div class="valide">
                <br>
                <input type="submit" id="submit" value="envoyer" name="envoyer">
                <p>
                Les informations saisies ne sont utilisées <br>
                que dans le but d'une conversation par email. <br>
                Aucune information n' est enregistré en base de donnée.
                </p>
            </div>
        </form>
    </div>
    <div id="contactArticle" class="article">
            <p class="pContact">Une simple question, <br> 
            ou un projet. <br>
            N' hésitez pas à m'envoyer un mail <br>
            Je vous répondrai rapidement.
            </p>
    </div>
</div>
<footer>
<?php
require('../component/footer.php');
?>
</footer>