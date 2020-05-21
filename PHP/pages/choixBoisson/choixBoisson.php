<?php

    $choixBoissonIsSet = false;
    
    ?>
    
    <div class="carte-section">
        
        <div class="carte-section-titre">
            Une boisson ?
        </div>
        
        <div class="carte-section-choix">
<?php
        $tabBoissons = ControllerChoixBoisson::getBoissons();
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
    
    <?php
    

    
   
    if(!isset($_SESSION["idBoisson"]) && !isset($_SESSION["quantiteBoisson"]) && !isset($_POST["liste-boisson-quantite"]))
    {
        $tabBoissons = ControllerChoixBoisson::getBoissons();
        ?>
<div class="tacos-form-container" id="container-choix-choisson">
    <?php
        foreach($tabBoissons as $boisson)
        {
            echo $boisson->getNomBoisson();
            ?>

                <?php
?>
                <form method="POST" action="index.php?page=choixBoisson" class="tacos-form">
                    <div class="tacos-form-block-top" id="select-button">
                        <div class="radio-ligne">
                            <SELECT name='<?php echo "liste-boisson-quantite";?>' size="1">
<?php
                    for($i=1;$i<=5;$i++)
                    {
?>
                        <option> <?php echo $i; ?> 
<?php
                    }
?>
                </SELECT>
                        </div>
                <input type="hidden" name="idBoisson" value="<?php echo $boisson->getIdBoisson();?>"/>
                </div>
                    <input class="button" type="submit" value="+ Ajouter"/>
            </form>
    
<?php
        }
        ?>
        </div>
<?php
    }
  
/*
if(ControllerChoixBoisson::boissonSession()==true)
{
    ControllerChoixBoisson::redirectPanier();
}
*/

    if(ControllerChoixBoisson::boissonSession()==true)
    {
?>
        <div class="ajout-reussi"> <?php echo "Boisson ajoutée au panier !";?> </div>
        <a class="button" href="index.php?page=panier">Panier</a>
<?php
        $choixBoissonIsSet=true;
    }
    
    
    
        
    
        
    
    






