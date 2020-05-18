<?php
    //A TESTER //PAS FINI
    //FORM QUI RENVOIE PLUTOT VERS ACCUEIL ? 
    //RAJOUTER LIEN VERS PAGE CONTACT DEPUIS LE MENU ACCUEIL

    if(ControllerContact::newMessage()==true)
    {
        echo "Message envoyé !";
        
    }
?>

<form method="POST" action="index.php?page=contact">
    <label>Nom : </label>
    <input type="text" name="nom"/>
    <label>Prénom : </label>
    <input type="text" name="prenom"/>
    <label>Adresse mail : </label>
    <input type="text" name="email"/>
    <label>Telephone : </label>
    <input type="text" name="telephone"/>
    <label>Votre Message : </label>
    <input type="text" name="contenuMessage"/>
    <input type="submit" value="Envoyer"/>
</form>

<a href="index.php?page=accueil">Retour page d'accueil</a>