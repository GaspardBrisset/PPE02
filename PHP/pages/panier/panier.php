<?php
    $tacosViandeIsSet = false;
    $tacosSauceIsSet = false;
    $boissonAndQuantiteIsSet = false;
    $prixCommande = 0;
    
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
        $tacos = ControllerPanier::insertTacos($_SESSION["idTypeTacos"]); 
        $idTacos = $tacos->getIdTacos();
        
        ControllerPanier::insertCommandeTacos($idTacos); 
        
        if(ControllerPanier::insertTacosViande($idTacos)==true) 
        {
            $tacosViandeIsSet=true;
        }
        
        if(ControllerPanier::insertTacosSauce($idTacos)==true)
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
        <th>Sous-total</th>
        <th> </th>
    </tr>
    
<?php
        $tabTacosPanier = ControllerPanier::getTacosWithCommande($commandePanier->getIdCommande());
      
        foreach($tabTacosPanier as $tacosPanier)
        {
            $idTacosPanier = $tacosPanier->getIdTacos();
            $idTypeTacosPanier = $tacosPanier->getIdTypeTacos();
            $typeTacosPanier = ControllerPanier::getTypesTacosWithTacos($idTypeTacosPanier);
?>
            <tr>
                <td> <div class="panier-cellule"> <?php echo "Tacos taille ".$typeTacosPanier->getTaille();?> </div> </td>
                <td> </td>
                <td> <div class="panier-cellule"> <?php echo $typeTacosPanier->getPrixTaille().",00 €";?> </div> </td>
                <td> <div class="panier-cellule"> <?php echo $typeTacosPanier->getPrixTaille().",00 €";?> </div> </td>
                <td> 
                    <div class="panier-cellule">
                        <a class="lien-supprimer" href='index.php?page=deleteTacos&idTacos=<?php echo $tacosPanier->getIdTacos(); ?>'>
                            <img class="icone-supprimer" src="images/general/poubelle.png">
                        </a>
                    </div>
                </td>
            </tr>
<?php 
            $prixCommande = $prixCommande + $typeTacosPanier->getPrixTaille();
            $tabViandesPanier = ControllerPanier::GetViandesWithTacos($idTacosPanier);
                
            foreach($tabViandesPanier as $viandePanier)
            {
                $quantiteViandePanier = ControllerPanier::getQuantiteWithViandeAndTacos($idTacosPanier, $viandePanier->getIdViande());
?>  
                <tr>
                    <td> <div class="panier-cellule"> <?php echo "Viande ".$viandePanier->getNomViande(); ?> </div> </td>
                    <td> <div class="panier-cellule"> <?php echo $quantiteViandePanier; ?> </div> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>       
<?php
            }

            $tabSaucesPanier = ControllerPanier::GetSaucesWithTacos($idTacosPanier);
                
            foreach($tabSaucesPanier as $saucePanier)
            {
                $quantiteSaucePanier = ControllerPanier::getQuantiteWithSauceAndTacos($idTacosPanier, $saucePanier->getIdSauce());
?>
                <tr>
                    <td> <div class="panier-cellule"> <?php echo "Sauce ".$saucePanier->getNomSauce();?> </div> </td>
                    <td> <div class="panier-cellule"> <?php echo $quantiteSaucePanier;?> </div> </td>
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
            $quantiteBoissonPanier = ControllerPanier::getQuantiteWithCommandeAndBoisson($commandePanier->getIdCommande(), $boissonPanier->getIdBoisson());
?>
            <tr>
                <td> <div class="panier-cellule"><?php echo $boissonPanier->getNomBoisson();?> </div> </td>
                <td> <div class="panier-cellule"><?php echo $quantiteBoissonPanier;?> </div> </td>
                <td> <div class="panier-cellule"><?php echo $boissonPanier->getPrixBoisson().",00 €";?> </div> </td>
                <td> <div class="panier-cellule"><?php echo $boissonPanier->getPrixBoisson()*$quantiteBoissonPanier.",00 €";?> </div> </td>
                <td> 
                    <div class="panier-cellule">
                        <a class="lien-supprimer" href='index.php?page=deleteBoisson&idBoisson=<?php echo $boissonPanier->getIdBoisson(); ?>'>
                            <img class="icone-supprimer" src="images/general/poubelle.png">
                        </a>
                    </div>
                </td>
            </tr>    
<?php

            $prixCommande = $prixCommande + 1*$quantiteBoissonPanier;
        }
        
        $_SESSION["prixTotal"] = $prixCommande;
?>
                
            <tr>
                <td class="panier-ligne-total"> </td>
                <td class="panier-ligne-total"> </td>
                <td class="panier-ligne-total"> <div class="panier-cellule"> <?php echo "Total :";?></div> </td>
                <td class="panier-ligne-total"> <div class="panier-cellule"> <?php echo $prixCommande.",00 €"; ?> </div> </td>
                <td class="panier-ligne-total"> </td>
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