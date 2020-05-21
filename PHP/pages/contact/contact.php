
    
<div class="button-container-retour">
    <a class="button" id="button-retour" href="index.php?page=accueil">
        Retour
    </a>
</div>

<?php
    if(ControllerContact::newMessage()==true)
    {
        echo "Message envoyé !";

    }
?>
<div class="contact-titre-container">
    <div class="contact-titre">Une question ?</div>
</div>
   
<div class="contact-form-container">
        
    <form class="contact-form "method="POST" action="index.php?page=contact">
        <div class="contact-block-top">
            <div class="contact-line">
                <label class="contact-label">Nom : </label> <input class="contact-input" type="text" name="nom" required/>
            </div>
            <div class="contact-line">
                <label class="contact-label">Prénom : </label> <input class="contact-input" type="text" name="prenom" required/>
            </div>
            <div class="contact-line">
                <label class="contact-label">Adresse mail : </label> <input class="contact-input" type="text" name="email" required/>
            </div>
            <div class="contact-line">
                <label class="contact-label">Téléphone : </label> <input class="contact-input" type="text" name="telephone" required/>
            </div>
            <div class="contact-line" id="message-label">
                <label class="contact-label">Votre message : </label> 
                </div>
                <textarea class="contact-message" name="contenuMessage" required></textarea>
        </div>
        <div class="button-container" id="button-container-submit">
            <input class="button" type="submit" value="Envoyer"/>
        </div>
    </form>

</div>