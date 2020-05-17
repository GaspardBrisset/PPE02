<?php 
    //session_destroy();
    //session_unset();
    
    if(empty($_SESSION))
    {
        echo "bonjour session est vide";
        session_name("commande_tacos");
        session_start();
    }
    
    if(!empty($_SESSION))
    {
        echo " // non c'est bon session n'est plus vide";
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/general.css" media="all"/>
        <link rel="icon" type="image/png" href="images/icone.png"/>

        <meta charset="utf-8" />
        <title>Tacosland</title>		
    </head>
    <body>


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
                        
                        if($_SESSION["isOver"]==true)
                        {
                            unset($_SESSION["idCommande"]);
                            session_unset();
                            $_SESSION["isOver"] = false;
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

    </body>
</html>