<?php 
    if(empty($_SESSION))
    {
        session_name("commande_tacos");
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Tacosland</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="css/general.css" media="all"/>
        <link rel="stylesheet" href="pages/accueil/accueil.css"/>
        <link rel="stylesheet" href="pages/contact/contact.css"/>
        <link rel="stylesheet" href="pages/panier/panier.css"/>
        <link rel="stylesheet" href="pages/choixTacos/choixTacos.css"/>
        <link rel="stylesheet" href="pages/choixViande/choixViande.css"/>
        <link rel="stylesheet" href="pages/choixSauce/choixSauce.css"/>
        <link rel="stylesheet" href="pages/choixBoisson/choixBoisson.css"/>
        
        <link rel="stylesheet" href="pages/commandeIsOver/commandeIsOver.css"/>
        <link rel="shortcut icon" type="ico" href="images/general/favicon.ico"/>
          		
    </head>
    
    <body>


        <div class="menu">
                
            <div class="menu-left">
                <a class="menu-logo" href="index.php?page=accueil">
                     Tacosland
                </a>
            </div>

            <div class="menu-right">
                <a class="menu-link" href="index.php?page=contact">
                    Contact
                </a>
                <a class="menu-link" href="index.php?page=accueil#carte">
                    Carte
                </a>
                <a class="menu-link" href="index.php?page=accueil">
                    Infos
                </a>
                <a class="menu-link" id="menu-panier-container" href="index.php?page=panier">
                    <?php 
                    if(isset($_SESSION["prixTotal"]))
                    {
                        echo $_SESSION["prixTotal"].",00 €";
                    }
                    ?>
                    <img class="menu-icone" src="images/general/panier.png"/>
                </a>
            </div>
                
            </div>
        
        <div class="page-container">

            
            <div class="page-content">
<?php

                include_once("tools/DatabaseLinker.php");

                if(!empty($_GET['page'])) 
                {
                    $page = $_GET['page'];
                }
                else 
                {
                    $page = "accueil";
                }

                switch($page)
                {
                    case "accueil" : 

                        include_once("pages/accueil/ControllerAccueil.php");
                        
                        if(isset($_SESSION["isOver"]))
                        {
                            if($_SESSION["isOver"]==true)
                            {
                                unset($_SESSION["idCommande"]);
                                session_unset();
                                $_SESSION["isOver"] = false;
                            }
                        }
                        
                        $controlAccueil = new ControllerAccueil();
                        $controlAccueil->includeView();
                        
                        break;
                    
                    case "contact" :
                        
                        include_once("pages/contact/ControllerContact.php");
                        
                        $controlContact = new ControllerContact();
                        $controlContact->includeView();
                        
                        break;
                    
                    case "choixTacos" :
                        
                        include_once("pages/choixTacos/ControllerChoixTacos.php");

                        $controlChoixTacos = new ControllerChoixTacos();
                        $controlChoixTacos->includeView();
                        
                        break;
                    
                    case "choixViande" :
                        
                        include_once("pages/choixViande/ControllerChoixViande.php");
                        
                        $controlChoixViande = new ControllerChoixViande();
                        $controlChoixViande->includeView();
                        
                        break;
                    
                    case "choixSauce" :
                        
                        include_once("pages/choixSauce/ControllerChoixSauce.php");
                        
                        $controlChoixSauce = new ControllerChoixSauce();
                        $controlChoixSauce->includeView();
                        
                        break;
                    
                    case "choixBoisson" :
                        
                        include_once("pages/choixBoisson/ControllerChoixBoisson.php");
                        
                        $controlChoixBoisson = new ControllerChoixBoisson();
                        $controlChoixBoisson->includeView();
                        
                        break;
                    
                    case "panier" :
                        
                        include_once("pages/panier/ControllerPanier.php");
                        
                        $controlPanier = new ControllerPanier();
                        $controlPanier->includeView();
                        
                        break;
                    
                    case "deleteTacos" :
                        
                        include_once("pages/deleteTacos/ControllerDeleteTacos.php");
                        
                        $controlDeleteTacos = new ControllerDeleteTacos();
                        $controlDeleteTacos->includeView();
                        
                        break;
                    
                    case "deleteBoisson" :
                        
                        include_once("pages/deleteBoisson/ControllerDeleteBoisson.php");
                        
                        $controlDeleteBoisson = new ControllerDeleteBoisson();
                        $controlDeleteBoisson->includeView();
                        
                        break;
                    
                    case "infosClient" :
                        
                        include_once("pages/infosClient/ControllerInfosClient.php");
                        
                        $controlInfosClient = new ControllerInfosClient();
                        $controlInfosClient->includeView();
                        
                        break;
                    
                    case "commandeIsOver" :
                        
                        include_once("pages/commandeIsOver/ControllerCommandeIsOver.php");
                        
                        $controlCommandeIsOver = new ControllerCommandeIsOver();
                        $controlCommandeIsOver->includeView();
                        
                        break;
                    
                    default: 
                        break;
                }

?>		
            </div>
            
        </div>
        
        <div class="bandeau-bottom">
            <span>Site de commande de tacos réalisé par Gaspard Brisset et Perrine Delahay - mai 2020</span>
        </div>
        
    </body>
</html>