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

                        $controlAccueil = new ControllerAccueil();
                        $controlAccueil->includeView();
                        
                        break;
                    
                    case "contact" :
                        
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
                        
                        break;
                    
                    case "panier" :
                        
                        include_once("pages/panier/ControllerPanier.php");
                        
                        $controlPanier = new ControllerPanier();
                        $controlPanier->includeView();
                        
                        break;
                    
                    default: 
                        break;
                }

?>		
            </div>
            
        </div>

    </body>
</html>