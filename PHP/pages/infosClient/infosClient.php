
    <div class="button-container-retour">
        <a class="button" id="button-retour" href="index.php?page=accueil">
            Retour
        </a>
    </div>

    <div class="contact-titre-container">
        <div class="contact-titre">Informations de livraison</div>
    </div>

    <?php

    if(ControllerInfosClient::newClient()==true)
    {
        ControllerInfosClient::redirectCommandeIsOver();
    }
    

    if(!isset($_SESSION["idClient"]))
    {    
?>
        <div class="contact-form-container">
            
            <form class="contact-form" method="POST" action="index.php?page=infosClient">
                <div class="contact-block-top">
                    <div class="contact-line">
                        <label class="contact-label">Prénom :</label> <input class="contact-input" type="text" name="prenom" required/>
                    </div>
                    <div class="contact-line">
                        <label class="contact-label">Nom :</label> <input class="contact-input" type="text" name="nom" required/>
                    </div>
                    <div class="contact-line">
                        <label class="contact-label">Adresse mail :</label> <input class="contact-input" type="text" name="email" required/>
                    </div>
                    <div class="contact-line">
                        <label class="contact-label">Téléphone :</label> <input class="contact-input" type="text" name="telephone" required/>
                    </div>
                    <div class="contact-line">
                        <label class="contact-label">Adresse :</label> <input class="contact-input" type="text" name="adresse" required/>
                    </div>
                </div>
                
                <div class="button-container" id="button-container-submit">
                    <input class="button" type="submit" value="Valider"/>
                </div>

            </form>
            
        </div>
<?php
    }
    else 
    {
        echo $_SESSION["idClient"];
    }
    
    
    
?>

