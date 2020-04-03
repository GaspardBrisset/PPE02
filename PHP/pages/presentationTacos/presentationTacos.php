<?php
    $tabTacos = TacosManager::findAllTacos();
    
    foreach($tabTacos as $tacos)
    {
        echo $tacos->getTailleTacos();
        echo $tacos->getPrixTacos();
    }
    
?>