<?php
    /*$idViande1 = ControllerChoixSauce::Viande1Session();
    $idViande2 = ControllerChoixSauce::Viande2Session();
    $idViande3 = ControllerChoixSauce::Viande3Session();
    
    
    print_r($idViande1);
    echo $idViande2;
    echo $idViande3;
    //echo $_POST["button-choix-viande1"];*/
    
    if(!empty($_SESSION["idViande1"])) //PROBLEME ICI REVOIR CONTROLLERCHOIXVIANDE
    {
        echo $_SESSION["idTypeTacos"];
    }
    
    
    if(!empty($idViande1) && !empty($_SESSION["idTypeTacos"]) && isset($idViande2) && isset($idViande3))
    {
        $tabSauces=ControllerChoixSauce::getSauces();
?>
        <form method="POST" action="index.php?page=choixBoisson">
            
<?php
            if($_SESSION["idTypeTacos"]>=1)
            {
                //idTypeTacos=1 => taille=M => 1 sauce => 1 ligne de boutons radio
                echo "Choix sauce n°1: "."<br>";
                foreach($tabSauces as $sauce)
                {
?>
                    <input type="radio" 
                           name="button-choix-sauce1" 
                           id='<?php echo "sauce".$sauce->getIdSauce(); ?>' 
                           value='<?php echo $sauce->getIdSauce(); ?>'/>

                    <label for='<?php echo "sauce".$sauce->getIdSauce(); ?>'>
                        <?php echo $sauce->getNomSauce(); ?></label>
<?php
                } 
                echo "<br>";
            }
            
            if($_SESSION["idTypeTacos"]>=2)
            {
                //idTypeTacos=2 ou 3 => taille=L ou XL => 2 sauces => 2 lignes de boutons radio
                echo "Choix sauce n°2: "."<br>";
                foreach($tabSauces as $sauce)
                {
?>
                    <input type="radio" 
                           name="button-choix-sauce2" 
                           id='<?php echo "sauce".$sauce->getIdSauce(); ?>' 
                           value='<?php echo $sauce->getIdSauce(); ?>'/>

                    <label for='<?php echo "sauce".$sauce->getIdSauce(); ?>'>
                        <?php echo $sauce->getNomSauce(); ?></label>
<?php
                } 
                echo "<br>";
            }
?>
            <input type="submit" value="Valider"/>
        </form>
<?php
    }
?>