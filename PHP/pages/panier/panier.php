<?php
    //insertion des données de session des form dans la bdd
    //obligatoirement : idTypeTacos + idViande1 + idSauce1
    //peut-etre : idViande2 + idViande3 + idSauce2
    //au moment de valider la commande => CommandeManager::insertCommande($commande);
    

    if(isset($_SESSION["idTypeTacos"]))
    {
        $tacos = ControllerPanier::insertTacos($_SESSION["idTypeTacos"]); //Table Tacos (idTacos, idTypeTacos)
        $idTacos = $tacos->getIdTacos();
        echo "idTacos du tacos créé ".$idTacos."<br>";
    }
    
    $tacosViandeIsSet = false;
    $tacosSauceIsSet = false;
    
    if(isset($_SESSION["idViande1"]))
    {
        if(ControllerPanier::insertTacosViande($idTacos)==true) //séparer le renvoie true/false et l'insertion
        {
            echo "Tacos créé dans la table TacosViande"."<br>";
            $tabViandes = ControllerPanier::GetViandesWithTacos($idTacos);

            foreach($tabViandes as $viande)
            {
                echo " Viande: ".$viande->getNomViande();
                $quantiteViande = TacosViandeManager::findQuantiteWithViandeAndTacos($idTacos, $viande->getIdViande());
                echo " Quantité: ".$quantiteViande."<br>";
            }
            $tacosViandeIsSet=true;
        }
    }

    
    if(isset($_SESSION["idSauce1"]))
    {
        if(ControllerPanier::insertTacosSauce($idTacos)==true)
        {
            echo "Tacos créé dans la table TacosSauce"."<br>";
            $tabSauces = ControllerPanier::GetSaucesWithTacos($idTacos);

            foreach($tabSauces as $sauce)
            {
                echo " Sauce: ".$sauce->getNomSauce();
                $quantiteSauce = TacosSauceManager::findQuantiteWithSauceAndTacos($idTacos, $sauce->getIdSauce());
                echo " Quantité: ".$quantiteSauce;
            }
            $tacosSauceIsSet = true;
        } 
    }
        
    
    if(($tacosViandeIsSet && $tacosSauceIsSet)==true)
    {
        unset($_SESSION["idTypeTacos"]);
        unset($_SESSION["idViande1"]);
        unset($_SESSION["idViande2"]);
        unset($_SESSION["idViande3"]);
        unset($_SESSION["idSauce1"]);
        unset($_SESSION["idSauce2"]);
        
    }
?>
    <a href="index.php?page=choixBoisson">Ajouter des boissons</a>