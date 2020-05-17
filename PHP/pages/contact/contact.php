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
    <input type="text" name="nom"/>
    <input type="text" name="prenom"/>
    <input type="text" name="email"/>
    <input type="text" name="telephone"/>
    <input type="text" name="contenuMessage"/>
    <input type="submit" value="Envoyer"/>
</form>