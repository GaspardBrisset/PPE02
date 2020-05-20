<?php
    
    echo "Session idTypeTacos: ".$_SESSION["idTypeTacos"]."<br>";
    $idTypeTacos = $_SESSION["idTypeTacos"];
    echo "Session idViande1: ".$_SESSION["idViande1"]."<br>"; 
    $idViande1 = $_SESSION["idViande1"];
    
    if(isset($_SESSION["idViande2"]))
    {
        echo "Session idViande2: ".$_SESSION["idViande2"]."<br>";
        $idViande2 = $_SESSION["idViande2"];
    }
    
    if(isset($_SESSION["idViande3"]))
    {
        echo "Session idViande3: ".$_SESSION["idViande3"]."<br>";
        $idViande3 = $_SESSION["idViande3"];
    }
    

    if(!empty($idViande1) && !empty($idTypeTacos) && !isset($_POST["button-choix-sauce1"]))
    {
        $tabSauces=ControllerChoixSauce::getSauces();
?>
        <form method="POST" action="index.php?page=choixSauce">
            
<?php
            if($idTypeTacos>=1)
            {
                //idTypeTacos=1 => taille=M => 1 sauce => 1 ligne de boutons radio
                echo "Choix sauce n°1: "."<br>";
                foreach($tabSauces as $sauce)
                {
?>
                    <input type="radio" 
                           name="button-choix-sauce1" 
                           id='<?php echo "sauce".$sauce->getIdSauce(); ?>' 
                           value='<?php echo $sauce->getIdSauce(); ?>'
                           <?php if($sauce->getIdSauce()==1){echo " checked";}?>/>

                    <label for='<?php echo "sauce".$sauce->getIdSauce(); ?>'>
                        <?php echo $sauce->getNomSauce(); ?></label>
<?php
                } 
                echo "<br>";
            }
            
            if($idTypeTacos>=2)
            {
                //idTypeTacos=2 ou 3 => taille=L ou XL => 2 sauces => 2 lignes de boutons radio
                echo "Choix sauce n°2: "."<br>";
                foreach($tabSauces as $sauce)
                {
?>
                    <input type="radio" 
                           name="button-choix-sauce2" 
                           id='<?php echo "sauce".$sauce->getIdSauce(); ?>' 
                           value='<?php echo $sauce->getIdSauce(); ?>'
                           <?php if($sauce->getIdSauce()==1){echo " checked";}?>/>

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
    
    if(ControllerChoixSauce::SaucesSession()==true)
    {
        ControllerChoixSauce::redirectPanier();
    }
?>
    <a href="index.php?page=panier">Retour vers le panier</a>