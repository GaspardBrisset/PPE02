<?php
    $idClient = $_SESSION["idClient"];
    $client = ControllerCommandeIsOver::getClient($idClient);
    $commande = ControllerCommandeIsOver::updateCommande();

    
    if(!empty($commande) && !empty($client))
    {
    ?>
        <div class="recap-container">
            <div class="recap-titre">Récapitulatif de votre commande</div>
            
            <div class="recap-commande">
                <div class="recap-ligne"> <?php echo $client->getPrenom()." ".$client->getNom();?> </div>
                <div class="recap-ligne"> <?php echo "Commande #". $commande->getIdCommande();?> </div>
                <div class="recap-ligne"> <?php echo "Prix : ".$commande->getPrixCommande().",00€";?> </div>
                <div class="recap-ligne"> <?php echo "Date : ".$commande->getdateCommande();?> </div>
            </div>
            
            <div class="recap-phrase">
                <div class="recap-ligne"> <?php echo "Tacosland a accepté votre commande !";?> </div>
                <div class="recap-ligne"> <?php echo "Votre commande arrivera dans 25 minutes. Bon appétit !";?> </div>
                <div class="recap-ligne"> <?php echo "Le réglement de la commande sera effectué lors de la livraison.";?> </div>
            </div>
        </div>
<?php
        $_SESSION["isOver"] = true;
        unset($_SESSION["idCommande"]);
        unset($_SESSION["idClient"]);
        unset($_SESSION["prixTotal"]);
    }
    
?>
    <a class="button" href="index.php?page=accueil">Retour sur la page d'accueil</a>