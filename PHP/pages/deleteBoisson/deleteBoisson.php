<?php
    $idBoisson = $_GET["idBoisson"];
    
    if(ControllerDeleteBoisson::deleteBoisson($idBoisson)==true)
    {
        ControllerDeleteBoisson::redirectPanier();
    }
