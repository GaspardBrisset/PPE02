<?php
    include_once("/DAO/CommandeManager.php");
    include_once("/DTO/Commande.php");

    echo "idClient".$_SESSION["idClient"];
    ControllerCommandeIsOver::getClient($_SESSION["idClient"]);
    
    $commande = ControllerInfosClient::updateCommande();
    echo $commande->getIdCommande();
    echo $commande->getPrixCommande();
    echo $commande->getdateCommande();
    echo $commande->getIdClient();
?>