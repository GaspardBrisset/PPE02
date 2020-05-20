<?php
    
?>

<div class="infos-container" id="infos">
    
    <div class="infos-left">
        <div class="infos-titre">
            Adresse
        </div>
        <div class="infos-contenu">
            Tacosland
        </div>
        <div class="infos-contenu">
            22 chemin de Traverse
        </div>
        <div class="infos-contenu">
            LONDRES
        </div>
             
    </div>
    
    <div class="infos-right">
        <div class="infos-titre">
            Horaires
        </div>
        <div class="infos-contenu">
            Ouvert de 11h à 23h
        </div>
        <div class="infos-contenu">
            Du mardi au dimanche
        </div>
    </div>
    
</div>

    
<div class="button-container">
    <a class="button" href="index.php?page=choixTacos">
        Commander
    </a>
</div>


<div class="carte-container" id="carte">
    
    <div class="carte-section">
        
        <div class="carte-section-titre">
            Choisis ta taille
        </div>
        
        <div class="carte-section-choix">
<?php
        $tabTypesTacos = ControllerAccueil::getTypesTacos();
        foreach($tabTypesTacos as $typeTacos)
        {
?>
            <div class="carte-section-element">

                <div class="element-titre"><?php echo $typeTacos->getTaille();?></div>
                <div class="element-ligne"><?php echo $typeTacos->getIdTypeTacos();?> viande(s)</div>
                <div class="element-ligne"><?php echo $typeTacos->getPrixTaille();?> € </div>

            </div>
<?php
        }
?>
        </div>
        
    </div>
    
    <div class="carte-section">
        
        <div class="carte-section-titre">
            Choisis ta viande
        </div>
        
        <div class="carte-section-choix">
<?php
        $tabViandes = ControllerAccueil::getViandes();
        foreach($tabViandes as $viande)
        {
?>
            <div class="carte-section-element">

                <img class="element-image" src="images/viandes/<?php echo $viande->getIdViande().".png";?>"/>
                <div class="element-titre"><?php echo $viande->getNomViande();?></div>

            </div>
<?php
        }
?>
        </div>
        
    </div>
    
    
    <div class="carte-section">
    
        <div class="carte-section-titre">
            Choisis ta sauce
        </div>
        
        <div class="carte-section-choix">
<?php
        $tabSauces = ControllerAccueil::getSauces();
        foreach($tabSauces as $sauce)
        {
?>
            <div class="carte-section-element">

                <div class="element-titre"><?php echo $sauce->getNomSauce();?></div>

            </div>
<?php
        }
?>
        </div>
        
    </div>
    
    <div class="carte-section">
        
        <div class="carte-section-titre">
            Une boisson ?
        </div>
        
        <div class="carte-section-choix">
<?php
        $tabBoissons = ControllerAccueil::getBoissons();
        foreach($tabBoissons as $boisson)
        {
?>
            <div class="carte-section-element">
                
                <div class="element-titre"><?php echo $boisson->getNomBoisson();?></div>
                <div class="element-ligne"><?php echo $boisson->getPrixBoisson();?> € </div>

            </div>
<?php
        }
?>
        </div>
        
    </div>
    
</div>
