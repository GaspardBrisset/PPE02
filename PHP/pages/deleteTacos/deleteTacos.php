<?php
    $idTacos = $_GET["idTacos"];
    echo $_GET["idTacos"];
    
    if(ControllerDeleteTacos::deleteTacosAndSauce($idTacos)==true)
    {
        if(ControllerDeleteTacos::deleteTacosAndViande($idTacos)==true)
        {
            if(ControllerDeleteTacos::deleteTacosInCommande($idTacos)==true)
            {
                if(ControllerDeleteTacos::deleteTacos($idTacos)==true)
                {
                    ControllerDeleteTacos::redirectPanier();
                }
            }
        }
    }
    else
    {
        echo "Suppression bugué";
    }
?>