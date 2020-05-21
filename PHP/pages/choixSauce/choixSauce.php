<?php
    $idTypeTacos = $_SESSION["idTypeTacos"];
    $idViande1 = $_SESSION["idViande1"];
    if(isset($_SESSION["idViande2"]))
    {
        $idViande2 = $_SESSION["idViande2"];
    }
    
    if(isset($_SESSION["idViande3"]))
    {
        $idViande3 = $_SESSION["idViande3"];
    }
    
      
?>
    <div class="carte-section">
    
        <div class="carte-section-titre">
            Choisis ta sauce
        </div>
        
        <div class="carte-section-choix">
<?php
        $tabSauces = ControllerChoixSauce::getSauces();
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
    
    <?php
    

    if(!empty($idViande1) && !empty($idTypeTacos) && !isset($_POST["button-choix-sauce1"]))
    {
        $tabSauces=ControllerChoixSauce::getSauces();
?>
<div class="tacos-form-container">
    <form method="POST" action="index.php?page=choixSauce" class="tacos-form">
        <div class="tacos-form-block-top">
            
<?php
            if($idTypeTacos>=1)
            {
                //idTypeTacos=1 => taille=M => 1 sauce => 1 ligne de boutons radio
                ?>
                <div class="ligne-sauce">
                    <?php
                foreach($tabSauces as $sauce)
                {
?>
                    <div class="radio-ligne">
                    <input class="radio-button" type="radio" 
                           name="button-choix-sauce1" 
                           id='<?php echo "sauce".$sauce->getIdSauce(); ?>' 
                           value='<?php echo $sauce->getIdSauce(); ?>'
                           <?php if($sauce->getIdSauce()==1){echo " checked";}?>/>

                    <label for='<?php echo "sauce".$sauce->getIdSauce(); ?>'>
                        <?php echo $sauce->getNomSauce(); ?></label>
                    </div>
<?php
                } 
                ?>
                </div>
                    <?php
            }
            
            if($idTypeTacos>=2)
            {
                //idTypeTacos=2 ou 3 => taille=L ou XL => 2 sauces => 2 lignes de boutons radio
                ?>
                <div class="ligne-sauce">
                    <?php
                foreach($tabSauces as $sauce)
                {
?>
                    <div class="radio-ligne">
                        <input class="radio-button" type="radio" 
                           name="button-choix-sauce2" 
                           id='<?php echo "sauce".$sauce->getIdSauce(); ?>' 
                           value='<?php echo $sauce->getIdSauce(); ?>'
                           <?php if($sauce->getIdSauce()==1){echo " checked";}?>/>

                    <label for='<?php echo "sauce".$sauce->getIdSauce(); ?>'>
                        <?php echo $sauce->getNomSauce(); ?></label>
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
    
    if(ControllerChoixSauce::SaucesSession()==true)
    {
        ControllerChoixSauce::redirectPanier();
    }
?>
