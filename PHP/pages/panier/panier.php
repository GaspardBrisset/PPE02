<?php
    //insertion des données de session des form dans la bdd
    //obligatoirement : idTypeTacos + idViande1 + idSauce1
    //peut-etre : idViande2 + idViande3 + idSauce2
    //au moment de valider la commande => CommandeManager::insertCommande($commande);
    
 
    echo "connexion réussie";


    $tacos = ControllerPanier::insertTacos($_SESSION["idTypeTacos"]); //Table Tacos (idTacos, idTypeTacos)
    //unset($_SESSION["idTypeTacos"]);
    
    $idTacos = $tacos->getIdTacos();
    echo $idTacos;
    
    if(ControllerPanier::insertTacosViande($idTacos)==true)
    {
        echo "Tacos créé dans la table TacosViande"."<br>";
        $tabViandes = ControllerPanier::GetViandesWithTacos($idTacos);
        
        foreach($tabViandes as $viande)
        {
            echo " Viande: ".$viande->getNomViande();
            $quantite = TacosViandeManager::findQuantiteWithViandeAndTacos($idTacos, $viande->getIdViande());
            echo " Quantité: ".$quantite;
        }
    }
    /*
    if(ControllerPanier::insertTacosSauce($idTacos)==true)
    {
        echo "Tacos créé dans la table TacosSauce"."<br>";
        $tabSauces = ControllerPanier::GetSaucesWithTacos($idTacos);
        
        foreach($tabSauces as $sauce)
        {
            echo " Sauce: ".$sauce->getNomSauce();
            $quantite = TacosSauceManager::findQuantiteWithSauceAndTacos($idTacos, $sauce->getIdSauce());
            echo " Quantité: ".$quantite;
        }
    }*/
    
    
    
?>
