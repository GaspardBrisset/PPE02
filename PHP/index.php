<?php 

    if (empty($_SESSION))
    {
        session_name("avis_recherche");
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
                    $page = "presentationTacos";
                }

                switch($page)
                {
                    case "presentationTacos" : 

                        include_once("pages/presentationTacos/ControllerPresentationTacos.php");

                        $controlPresentationTacos = new ControllerPresentationTacos();
                        $controlPresentationTacos->includeView();
                        break;

                    default: 
                        break;
                }

?>		
            </div>
            
        </div>

    </body>
</html>