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

    //insertion des données de session des form dans la bdd
    //obligatoirement : idTypeTacos + idViande1 + idSauce1
    //peut-etre : idViande2 + idViande3 + idSauce2
    //au moment de valider la commande => CommandeManager::insertCommande($commande);
    
    $tacosViandeIsSet = false;
    $tacosSauceIsSet = false;
    
    if(!isset($_SESSION["idCommande"]))
    {
        ControllerPanier::newCommande();
    }
    

    
    if(isset($_SESSION["idTypeTacos"]))
    {
        $tacos = ControllerPanier::insertTacos($_SESSION["idTypeTacos"]); //Table Tacos (idTacos, idTypeTacos)
        $idTacos = $tacos->getIdTacos();
        //echo "Tacos n°".$idTacos."<br>";
        
        ControllerPanier::insertCommandeTacos($idTacos); //Table CommandeTacos(idCommande, idTacos)
    }
    
    //inutile sert juste à vérifier l'insertion en affichant les infos
    if(isset($_SESSION["idViande1"]))
    {
        if(ControllerPanier::insertTacosViande($idTacos)==true) //séparer le renvoie true/false et l'insertion ??
        {
            //echo "Tacos créé dans la table TacosViande"."<br>";
            $tabViandes = ControllerPanier::GetViandesWithTacos($idTacos);

            foreach($tabViandes as $viande)
            {
                //echo " Viande: ".$viande->getNomViande();
                $quantiteViande = TacosViandeManager::findQuantiteWithViandeAndTacos($idTacos, $viande->getIdViande());
                //echo " Quantité: ".$quantiteViande."<br>";
            }
            $tacosViandeIsSet=true;
        }
    }

    //inutile sert juste à vérifier l'insertion en affichant les infos
    if(isset($_SESSION["idSauce1"]))
    {
        if(ControllerPanier::insertTacosSauce($idTacos)==true) //séparer le renvoie true/false et l'insertion ??
        {
            //echo "Tacos créé dans la table TacosSauce"."<br>";
            $tabSauces = ControllerPanier::GetSaucesWithTacos($idTacos);

            foreach($tabSauces as $sauce)
            {
                //echo " Sauce: ".$sauce->getNomSauce();
                $quantiteSauce = TacosSauceManager::findQuantiteWithSauceAndTacos($idTacos, $sauce->getIdSauce());
                //echo " Quantité: ".$quantiteSauce;
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
<?php
    
    echo "<br>"."PANIER : "."<br>";
    $commande = ControllerPanier::getCommande($_SESSION["idCommande"]);
    echo "<br> Commande n° ".$commande->getIdCommande()."<br>";
    $tabTacosPanier = ControllerPanier::getTacosWithCommande($_SESSION["idCommande"]);
    
    foreach($tabTacosPanier as $tacosPanier)
    {
        $idTacosPanier = $tacosPanier->getIdTacos();
        echo "<br> Tacos n° ".$idTacosPanier."<br>";
        
        $idTypeTacosPanier = $tacosPanier->getIdTypeTacos();
        echo "Tacos de type n° ".$idTypeTacosPanier."<br>";
        $typeTacosPanier = TypeTacosManager::findTypeTacos($idTypeTacosPanier);
        echo "Taille : ".$typeTacosPanier->getTaille()."<br>";
        echo "Prix : ".$typeTacosPanier->getPrixTaille()."€ <br>";
        
        $tabViandesPanier = TacosViandeManager::findViandesWithTacos($idTacosPanier);
        foreach($tabViandesPanier as $viandePanier)
        {
            echo "Viande : ".$viandePanier->getNomViande();
            $quantiteViandePanier = TacosViandeManager::findQuantiteWithViandeAndTacos($idTacosPanier, $viandePanier->getIdViande());
            echo " Quantité : ".$quantiteViandePanier."<br>";
        }
        
        $tabSaucesPanier = TacosSauceManager::findSaucesWithTacos($idTacosPanier);
        foreach($tabSaucesPanier as $saucePanier)
        {
            echo "Sauce : ".$saucePanier->getNomSauce();
            $quantiteSaucePanier = TacosSauceManager::findQuantiteWithSauceAndTacos($idTacosPanier, $saucePanier->getIdSauce());
            echo " Quantité : ".$quantiteSaucePanier."<br>";
        }
    }
?>
    <a href="index.php?page=choixTacos">Ajouter un tacos</a>

