<?php
    include_once("/DTO/Tacos.php");
    include_once("/DAO/TacosManager.php");

    $tabTacos = TypeTacosManager::findAllTacos();
    
    foreach($tabTacos as $tacos)
    {
        echo $tacos->getTailleTacos();
        echo $tacos->getPrixTacos();
    }
    
?>