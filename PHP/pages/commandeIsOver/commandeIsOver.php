<?php
    //include_once("/DAO/CommandeManager.php");
    //include_once("/DTO/Commande.php");

    $idClient = $_SESSION["idClient"];
    echo "Client n° ".$idClient."<br>";
    $client = ControllerCommandeIsOver::getClient($idClient);
    echo $client->getPrenom()." ".$client->getNom();
    
    
    $commande = ControllerCommandeIsOver::updateCommande();
    echo "<br> Commande n° ". $commande->getIdCommande();
    echo "<br> Prix : ".$commande->getPrixCommande().",00€";
    echo "<br> Date : ".$commande->getdateCommande();
    echo "<br> Client n° ".$commande->getIdClient()."<br>";
    
    if(!empty($commande) && !empty($client))
    {
        echo "Tacosland a accepté votre commande ! <br>";
        echo "Votre commande arrivera dans 25 minutes. Bon appétit ! <br>";
        echo "Le réglement de la commande sera effectué lors de la livraison.";
        $_SESSION["isOver"] = true;
    }
?>
    <a href="index.php?page=accueil">Retour sur la page d'accueil</a>