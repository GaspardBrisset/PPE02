<?php

    $tailleTacos = $_SESSION["idTypeTacos"];
    
?>
    <div class="carte-section">
        
        <div class="carte-section-titre">
            Choisis ta viande
        </div>
        
        <div class="carte-section-choix">
<?php
            $tabViandes = ControllerChoixViande::getViandes();
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
    
<?php
    
    if(!empty($tailleTacos) && !isset($_POST["button-choix-viande1"]))
    {
        $tabViandes=ControllerChoixViande::getViandes();
        
?>
        <div class="tacos-form-container">
            <form method="POST" action="index.php?page=choixViande" class="tacos-form" id="viande-form">
                <div class="tacos-form-block-top" id="choix-viande">
<?php
                    if($tailleTacos>=1)
                    {
                        //idTypeTacos=2 => taille=L => 2 viandes => 2 lignes de boutons radio
?>
                        <div class="ligne-viande">
                    
<?php
                            foreach($tabViandes as $viande)
                            {
?>
                                <div class="radio-ligne">
                                    <input class="radio-button" type="radio" 
                                           name="button-choix-viande1" 
                                           id='<?php echo "viande".$viande->getIdViande(); ?>' 
                                           value='<?php echo $viande->getIdViande(); ?>'
                                           <?php if($viande->getIdViande()==1){echo " checked";}?>/>

                                    <label for='<?php echo "viande".$viande->getIdViande(); ?>'>
                                        <?php echo $viande->getNomViande(); ?></label>
                                </div>
<?php
                            } 
?>
                        </div>
<?php
                    }

                    if($tailleTacos>=2)
                    {
                        //idTypeTacos=2 => taille=L => 2 viandes => 2 lignes de boutons radio
?>
                        <div class="ligne-viande">
<?php
                            foreach($tabViandes as $viande)
                            {
?>
                                <div class="radio-ligne">
                                    <input class="radio-button" type="radio" 
                                           name="button-choix-viande2" 
                                           id='<?php echo "viande".$viande->getIdViande(); ?>' 
                                           value='<?php echo $viande->getIdViande(); ?>'
                                           <?php if($viande->getIdViande()==1){echo " checked";}?>/>

                                    <label class="radio-label" for='<?php echo "viande".$viande->getIdViande(); ?>'>
                                        <?php echo $viande->getNomViande(); ?></label>
                                </div>
<?php
                            } 
?>
                        </div>
<?php
                    }
            
                    if($tailleTacos==3)
                    {
                        //idTypeTacos=3 => taille=XL => 3 viandes => 3 lignes de boutons radio
?>
                        <div class="ligne-viande">
<?php
                            foreach($tabViandes as $viande)
                            {
?>
                                <div class="radio-ligne">
                                    <input class="radio-button" type="radio" 
                                           name="button-choix-viande3" 
                                           id='<?php echo "viande".$viande->getIdViande(); ?>' 
                                           value='<?php echo $viande->getIdViande(); ?>'
                                           <?php if($viande->getIdViande()==1){echo " checked";}?>/>

                                    <label for='<?php echo "viande".$viande->getIdViande(); ?>'>
                                        <?php echo $viande->getNomViande(); ?></label>
                                </div>
<?php
                            } 
?>
                        </div>
<?php
                    }        
?>
                </div>
                
                <input class="button" type="submit" value="Valider"/>
            </form>
            
        </div>
<?php
    }
    
    if(ControllerChoixViande::ViandesSession()==true)
    {
        ControllerChoixViande::redirectSauce();
    }
    
?>