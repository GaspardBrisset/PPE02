<?php
    include_once("/DAO/CommandeManager.php");
    include_once("/DAO/TacosManager.php");
    include_once("/DAO/TacosViandeManager.php");
    include_once("/DAO/TacosSauceManager.php");
    include_once("/DAO/ViandeManager.php");
    include_once("/DAO/SauceManager.php");
    include_once("/DTO/Tacos.php");
    include_once("/DTO/Commande.php");
    include_once("/DAO/CommandeTacosManager.php");
    include_once("/DAO/TypeTacosManager.php");
    include_once("/DAO/CommandeBoissonManager.php");


    
    $tacosViandeIsSet = false;
    $tacosSauceIsSet = false;
    $boissonAndQuantiteIsSet = false;
    $prixCommande = 0;
    
    //ControllerPanier::newCommande();
    
    if(!isset($_SESSION["idCommande"]))
    {
        ControllerPanier::newCommande();
    }
    else
    {
        //echo $_SESSION["idCommande"];
    }
    
    
    if(isset($_SESSION["idTypeTacos"]) && isset($_SESSION["idViande1"]) && isset($_SESSION["idSauce1"]))
    {
        $tacos = ControllerPanier::insertTacos($_SESSION["idTypeTacos"]); //Table Tacos (idTacos, idTypeTacos)
        $idTacos = $tacos->getIdTacos();
        
        ControllerPanier::insertCommandeTacos($idTacos); //Table CommandeTacos(idCommande, idTacos)
        
        if(ControllerPanier::insertTacosViande($idTacos)==true) //séparer le renvoie true/false et l'insertion ??
        {
            $tacosViandeIsSet=true;
        }
        
        if(ControllerPanier::insertTacosSauce($idTacos)==true) //séparer le renvoie true/false et l'insertion ??
        {
            $tacosSauceIsSet = true;
        } 
    }
    

    
    if(isset($_SESSION["idBoisson"]) && isset($_SESSION["quantiteBoisson"]))
    {
        if(ControllerPanier::boissonIsAlreadySet($_SESSION["idBoisson"])==true)
        {
            ControllerPanier::updateQuantiteBoisson($_SESSION["idBoisson"], $_SESSION["quantiteBoisson"]);
            $boissonAndQuantiteIsSet = true;
        }
        else
        {
            if(ControllerPanier::insertCommandeBoisson($_SESSION["idCommande"])==true)
            {
                $boissonAndQuantiteIsSet = true;
            }
        }
    }
    
    if($boissonAndQuantiteIsSet==true)
    {
        unset($_SESSION["idBoisson"]);
        unset($_SESSION["quantiteBoisson"]);
    }
    
    if(($tacosViandeIsSet && $tacosSauceIsSet)==true) 
    {
        unset($_SESSION["idTypeTacos"]);
        unset($_SESSION["idViande1"]);
        unset($_SESSION["idViande2"]);
        unset($_SESSION["idViande3"]);
        unset($_SESSION["idSauce1"]);
        unset($_SESSION["idSauce2"]);
        unset($_SESSION["idClient"]);
    }
  
?>  

    <div class="panier-titre">Panier</div>
<?php
    $commandePanier = ControllerPanier::getCommande($_SESSION["idCommande"]);
?>
    <div class="panier-commande"> <?php echo "Commande #".$commandePanier->getIdCommande();?> </div>



<table>
    
    <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix</th>
        <th>Total</th>
        <th> </th>
    </tr>
    
<?php
        $tabTacosPanier = ControllerPanier::getTacosWithCommande($commandePanier->getIdCommande());
      
        foreach($tabTacosPanier as $tacosPanier)
        {
            $idTacosPanier = $tacosPanier->getIdTacos();
            $idTypeTacosPanier = $tacosPanier->getIdTypeTacos();
            $typeTacosPanier = TypeTacosManager::findTypeTacos($idTypeTacosPanier);
?>
            <tr>
                <td> <?php echo "Tacos taille ".$typeTacosPanier->getTaille();?> </td>
                <td> </td>
                <td> <?php echo $typeTacosPanier->getPrixTaille().",00 €";?> </td>
                <td> <?php echo $typeTacosPanier->getPrixTaille().",00 €";?> </td>
                <td> 
                    <a class="lien-supprimer" href='index.php?page=deleteTacos&idTacos=<?php echo $tacosPanier->getIdTacos(); ?>'>
                        <img class="icone-supprimer" src="images/general/poubelle.png">
                    </a>
                </td>
            </tr>
<?php 
            $prixCommande = $prixCommande + $typeTacosPanier->getPrixTaille();
            $tabViandesPanier = TacosViandeManager::findViandesWithTacos($idTacosPanier);
                
            foreach($tabViandesPanier as $viandePanier)
            {
                $quantiteViandePanier = TacosViandeManager::findQuantiteWithViandeAndTacos($idTacosPanier, $viandePanier->getIdViande());
?>  
                <tr>
                    <td> <?php echo "Viande ".$viandePanier->getNomViande(); ?> </td>
                    <td> <?php echo $quantiteViandePanier; ?> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>       
<?php
            }

            $tabSaucesPanier = TacosSauceManager::findSaucesWithTacos($idTacosPanier);
                
            foreach($tabSaucesPanier as $saucePanier)
            {
                $quantiteSaucePanier = TacosSauceManager::findQuantiteWithSauceAndTacos($idTacosPanier, $saucePanier->getIdSauce());
?>
                <tr>
                    <td> <?php echo "Sauce ".$saucePanier->getNomSauce();?> </td>
                    <td> <?php echo $quantiteSaucePanier;?> </td>
                    <td> </td>   
                    <td> </td>
                    <td> </td>
                </tr>
<?php
            }  
        }//fin foreach tacos viande sauce
        
        $tabBoissonsPanier = ControllerPanier::getBoissonWithCommande($commandePanier->getIdCommande());
    
        foreach($tabBoissonsPanier as $boissonPanier)
        {
            $quantiteBoissonPanier = CommandeBoissonManager::findQuantiteWithCommandeAndBoisson($commandePanier->getIdCommande(), $boissonPanier->getIdBoisson());
?>
            <tr>
                <td> <?php echo $boissonPanier->getNomBoisson();?> </td>
                <td> <?php echo $quantiteBoissonPanier;?> </td>
                <td> <?php echo $boissonPanier->getPrixBoisson().",00 €";?> </td>
                <td> <?php echo $boissonPanier->getPrixBoisson()*$quantiteBoissonPanier.",00 €";?> </td>
                <td> 
                    <a class="lien-supprimer" href='index.php?page=deleteBoisson&idBoisson=<?php echo $boissonPanier->getIdBoisson(); ?>'>
                        <img class="icone-supprimer" src="images/general/poubelle.png">
                    </a>
                </td>
            </tr>    
<?php

            $prixCommande = $prixCommande + 1*$quantiteBoissonPanier;
        }
        
        $_SESSION["prixTotal"] = $prixCommande;
?>
                
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> <?php echo $prixCommande.",00 €"; ?></td>
                <td> </td>
            </tr>       
                
</table>
    
<?php
        
    
    
?>
    <div class="button-container-ajout">
        <a class="button" href="index.php?page=choixTacos">+ Tacos</a>

        <a class="button" href="index.php?page=choixBoisson">+ Boisson</a>
    </div>
<?php
    if($_SESSION["prixTotal"]>0)
    {
?>
        <div class="button-container">
            <a class="button" href="index.php?page=infosClient">Valider la commande</a>
        </div>
<?php
    }
?>
    
    <div class="button-container">
        <a class="button" href="index.php?page=accueil#carte">Voir la carte</a>
    </div>