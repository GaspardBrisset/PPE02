<?php 

    if (empty($_SESSION))
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
                        
                        include_once("pages/accueil/ControllerChoixTacos.php");

                        $controlChoixTacos = new ControllerChoixTacos();
                        $controlChoixTacos->includeView();
                        
                        break;
                    
                    case "choixViande" :
                        
                        break;
                    
                    case "choixSauce" :
                        
                        break;
                    
                    case "choixBoisson" :
                        
                        break;
                    
                    case "panier" :
                        
                        break;
                    
                    default: 
                        break;
                }

?>		
            </div>
            
        </div>

    </body>
</html>