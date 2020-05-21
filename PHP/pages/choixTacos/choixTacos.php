<?php
    $tabTypeTacos = ControllerChoixTacos::getTypesTacos();
    
?>
   <div class="carte-container" id="carte">
    
    <div class="carte-section">
        
        <div class="carte-section-titre">
            Choisis ta taille
        </div>
        
        <div class="carte-section-choix">
<?php
        $tabTypesTacos = ControllerChoixTacos::getTypesTacos();
        foreach($tabTypesTacos as $typeTacos)
        {
?>
            <div class="carte-section-element">

                <div class="element-titre"><?php echo $typeTacos->getTaille();?></div>
                <div class="element-ligne"><?php echo $typeTacos->getIdTypeTacos();?> viande(s)</div>
                <div class="element-ligne"><?php if($typeTacos->getIdTypeTacos()==1){ echo "1 sauce(s)";}else if($typeTacos->getIdTypeTacos()>1){ echo "2 sauce(s)";} ?></div>
                <div class="element-ligne"><?php echo $typeTacos->getPrixTaille();?> € </div>

            </div>
<?php
        }
?>
        </div>
        
    </div>
       <?php

    if(!isset($_POST["button-choix-taille"]))
    { 
?>
        <div class="tacos-form-container">
            
            <form method="POST" action="index.php?page=choixTacos" class="tacos-form">
                <div class="tacos-form-block-top">

                    <div class="radio-ligne">
                        <input class="radio-button" type="radio" name="button-choix-taille" id="taille1" value="1" checked/>
                        <label for="taille1">M</label>
                    </div>

                    <div class="radio-ligne">
                        <input class="radio-button"  type="radio" name="button-choix-taille" id="taille2" value="2"/>
                        <label for="taille2">L</label>
                    </div>

                    <div class="radio-ligne">
                        <input class="radio-button" type="radio" name="button-choix-taille" id="taille3" value="3"/>
                        <label for="taille3">XL</label>
                    </div>
                    
                </div>
                
                <input class="button"type="submit" value="Valider"/>
            </form>

        </div>
<?php
    }
    
    if(ControllerChoixTacos::typeTacosSession()==true)
    {
        ControllerChoixTacos::redirectViande();
    }
?>